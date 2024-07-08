<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use Config\Services;

/*
 * Admin Controller for managing administrators within the Auth module
 */
class AdminController extends BaseController
{
	protected $adminModel;
	protected $email;

	public function __construct()
	{
		helper('form');
		helper('gravatar');
		$this->adminModel = new AdminModel();
		$this->email = Services::email();
	}

	/*
	 * Register a new administrator (get)
	 */
	public function register()
	{
		$data = [
			'title' => 'Register - Admin',
		];


		$data['content'] = view('admin/register', $data);
		return view('templates/base', $data);
	}

	/*
	 * Register a new administrator (post)
	 */
	public function store()
	{
		$validation = Services::validation();
		$validation->setRules([
			'name' => 'required',
			'emailAddress' => 'required|valid_email|is_unique[administrator.emailAddress]',
			'password' => 'required|min_length[8]',
			'phoneNumber' => 'required',
		]);

		if (!$validation->withRequest($this->request)->run()) {
			$data['errors'] = $validation->getErrors();
			$data['content'] = view('admin/register', $data);
			return view('templates/base', $data);
		}

		$emailAddress = $this->request->getPost('emailAddress');
		$newAdminData = [
			'name' => $this->request->getPost('name'),
			'emailAddress' => $emailAddress,
			'phoneNumber' => $this->request->getPost('phoneNumber'),
			'passwordHash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'gravatarHash' => get_gravatar_url($emailAddress),
		];

		$this->adminModel->insert($newAdminData);

		return redirect()->to('/auth/admin/login')->with('message', 'Admin registered successfully.');
	}

	/*
	 * Log in an administrator (get)
	 */
	public function login()
	{
		$data = [
			'title' => 'Login - Admin',
		];

		$data['content'] = view('admin/login', $data);
		return view('templates/base', $data);
	}

	/*
	 * Log in an administrator (post)
	 */
	public function login_action()
	{
		$validation = Services::validation();
		$validation->setRules([
			'emailAddress' => 'required|valid_email',
			'password' => 'required'
		]);

		if (!$validation->withRequest($this->request)->run()) {
			$data['errors'] = $validation->getErrors();
			$data['content'] = view('admin/login', $data);
			return view('templates/base', $data);
		}

		$admin = $this->adminModel->where('emailAddress', $this->request->getPost('emailAddress'))->first();

		if ($admin && password_verify($this->request->getPost('password'), $admin['passwordHash'])) {
			/* Set session data */
			session()->set([
				'user_id' => $admin['administratorId'],
				'email_address' => $admin['emailAddress'],
				'user_type' => 'admin',
				'imageUrl' => $admin['imageUrl'] ?? $admin['gravatarHash'],
			]);

			/* Redirect admin to dashboard */
			return redirect()->to('/admin/dashboard');
		}

		$data['error'] = 'Invalid login credentials.';
	}


	/*
	 * View administrator profile
	 */
	public function profile($id)
	{
		$admin = $this->adminModel->find($id);

		if (!$admin) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Admin not found.');
		}

		$data = [
			'title' => 'Profile - Admin',
			'content' => view('admin/profile', ['admin' => $admin])
		];
		return view('templates/base', $data);
	}

	/*
	 * Update administrator profile
	 */
	public function updateProfile($id)
	{
		$admin = $this->adminModel->find($id);

		if (!$admin) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Admin not found.');
		}

		$validation = Services::validation();
		$validation->setRules([
			'name' => 'required',
			'emailAddress' => 'required|valid_email',
			'phoneNumber' => 'required',
			'imageUrl' => 'permit_empty|valid_url',
		]);

		if (!$this->validate($validation->getRules())) {
			$data = [
				'title' => 'Update Profile - Admin',
				'content' => view('admin/update_profile', [
					'errors' => $validation->getErrors(),
					'admin' => $admin
				])
			];
			return view('templates/base', $data);
		}

		$data = [
			'name' => $this->request->getPost('name'),
			'emailAddress' => $this->request->getPost('emailAddress'),
			'phoneNumber' => $this->request->getPost('phoneNumber'),
			'imageUrl' => $this->request->getPost('imageUrl')
		];

		$this->adminModel->update($id, $data);

		return redirect()->to('/admin/profile/' . $id)->with('message', 'Profile updated successfully.');
	}

	/*
	 * Confirm administrator email
	 * @param string $token
	 */
	public function confirm($token)
	{
		// Assume we store tokens in a separate table for simplicity
		$tokenModel = new \App\Models\TokenModel();
		$record = $tokenModel->where('token', $token)->first();

		if ($record && $record['type'] === 'email_confirmation') {
			$this->adminModel->update($record['user_id'], ['isApproved' => 1]);
			$tokenModel->delete($record['token_id']); // Remove used token
			return redirect()->to('/auth/admin/login')->with('message', 'Email confirmed successfully.');
		}

		return redirect()->to('/auth/admin/login')->with('error', 'Invalid or expired token.');
	}

	/*
	 * Log out an administrator
	 */
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/auth/admin/login')->with('success', 'Logged out successfully.');
	}

	/*
	 * Send confirmation email to the administrator
	 */
	protected function sendConfirmationEmail($emailAddress)
	{
		$token = bin2hex(random_bytes(16)); // Generate a random token
		$tokenModel = new \App\Models\TokenModel();
		$tokenModel->insert([
			'token' => $token,
			'user_id' => $this->adminModel->where('emailAddress', $emailAddress)->first()['administratorId'],
			'type' => 'email_confirmation'
		]);

		$this->email->setTo($emailAddress);
		$this->email->setSubject('Email Confirmation');
		$this->email->setMessage('Please confirm your email by clicking on the following link: ' . base_url('/auth/admin/confirm/' . $token));

		$this->email->send();
	}
}
