<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Models\DoctorModel;
use App\Models\SpecializationModel;
use App\Models\InstitutionModel;
use Config\Services;

/*
 * Doctor Controller for managing doctors
 */
class DoctorController extends BaseController
{
	protected $doctorModel;
	protected $specializationModel;
	protected $institutionModel;
	protected $email;

	public function __construct()
	{
		helper('form');
		helper('gravatar');
		$this->doctorModel = new DoctorModel();
		$this->specializationModel = new SpecializationModel();
		$this->institutionModel = new InstitutionModel();
	}

	/*
	 * Register a new doctor (get)
	 */
	public function register()
	{
		$data = [
			'title' => 'Register - Doctor',
			'specializations' => $this->specializationModel->findAll(),
			'institutions' => $this->institutionModel->findAll(),
		];
		$data['content'] = view('doctor/register', $data);
		return view('templates/base', $data);
	}

	/*
	 * Register a new doctor (post)
	 */
	public function store()
	{
		$validation = Services::validation();
		$validation->setRules([
			'name' => 'required',
			'emailAddress' => 'required|valid_email|is_unique[doctor.emailAddress]',
			'password' => 'required|min_length[8]',
			'phoneNumber' => 'required',
			'licenseNumber' => 'required',
			'specializationId' => 'required|integer',
			'institutionId' => 'required|integer'
		]);

		if (!$this->validate($validation->getRules())) {
			return view('templates/base', $data);
		}

		$data = [
			'name' => $this->request->getPost('name'),
			'emailAddress' => $this->request->getPost('emailAddress'),
			'phoneNumber' => $this->request->getPost('phoneNumber'),
			'licenseNumber' => $this->request->getPost('licenseNumber'),
			'specializationId' => $this->request->getPost('specializationId'),
			'institutionId' => $this->request->getPost('institutionId'),
			'passwordHash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'gravatarHash' => md5(strtolower(trim($this->request->getPost('emailAddress'))))
		];

		$this->doctorModel->insert($data);

		return redirect()->to('/auth/doctor/login')->with('message', 'Doctor registered successfully.');
	}

	/*
	 * Log in a doctor (get)
	 */
	public function login()
	{
		$data = [
			'title' => 'Login - Doctor',
		];
		$data['content'] = view('doctor/login', $data);
		return view('templates/base', $data);
	}

	/*
	 * Log in a doctor (get)
	 */
	public function login_action()
	{
		$validation = Services::validation();
		$validation->setRules([
			'emailAddress' => 'required|valid_email',
			'password' => 'required'
		]);

		if (!$this->validate($validation->getRules())) {
			$data = [
				'title' => 'Login - Doctor',
				'content' => view('doctor/login', ['errors' => $validation->getErrors()])
			];
			return view('templates/base', $data);
		}

		$doctor = $this->doctorModel->where('emailAddress', $this->request->getPost('emailAddress'))->first();

		if ($doctor && password_verify($this->request->getPost('password'), $doctor['passwordHash'])) {
			/* Set session variables */
			session()->set([
				'user_id' => $doctor['doctorId'],
				'email_address' => $doctor['emailAddress'],
				'user_type' => 'doctor',
				'imageUrl' => $doctor['imageUrl'] ?? $doctor['gravatarHash'],
			]);

			/* Redirect doctor to dashboard */
			return redirect()->to('/doctor/dashboard');
		}
	}

	/*
	 * View doctor profile
	 */
	public function profile($id)
	{
		$doctor = $this->doctorModel->find($id);

		if (!$doctor) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Doctor not found.');
		}

		$data = [
			'title' => 'Profile - Doctor',
			'content' => view('doctor/profile', ['doctor' => $doctor])
		];
		return view('templates/base', $data);
	}

	/*
	 * Update doctor profile
	 */
	public function updateProfile($id)
	{
		$doctor = $this->doctorModel->find($id);

		if (!$doctor) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Doctor not found.');
		}

		$validation = Services::validation();
		$validation->setRules([
			'name' => 'required',
			'phoneNumber' => 'required',
			'licenseNumber' => 'required'
		]);

		if (!$this->validate($validation->getRules())) {
			$data = [
				'title' => 'Update Profile - Doctor',
				'content' => view('doctor/update_profile', [
					'errors' => $validation->getErrors(),
					'doctor' => $doctor
				])
			];
			return view('templates/base', $data);
		}

		$data = [
			'name' => $this->request->getPost('name'),
			'phoneNumber' => $this->request->getPost('phoneNumber'),
			'licenseNumber' => $this->request->getPost('licenseNumber')
		];

		$this->doctorModel->update($id, $data);

		return redirect()->to('/doctor/profile/' . $id)->with('message', 'Profile updated successfully.');
	}

	/*
	 * Confirm doctor email
	 * @param string $token
	 */
	public function confirm($token)
	{
		// Assume we store tokens in a separate table for simplicity
		$tokenModel = new \App\Models\TokenModel();
		$record = $tokenModel->where('token', $token)->first();

		if ($record && $record['type'] === 'email_confirmation') {
			$this->doctorModel->update($record['user_id'], ['isConfirmed' => 1]);
			$tokenModel->delete($record['token_id']); // Remove used token
			return redirect()->to('/doctor/login')->with('message', 'Email confirmed successfully.');
		}

		return redirect()->to('/doctor/login')->with('error', 'Invalid or expired token.');
	}

	/*
	 * Log out a doctor
	 */
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/auth/doctor/login')->with('message', 'Logged out successfully.');
	}
}
