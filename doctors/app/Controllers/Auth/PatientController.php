<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Models\PatientModel;
use Config\Services;

/*
 * Patient Controller for managing patients
 */
class PatientController extends BaseController
{
	protected $patientModel;
	protected $email;

	public function __construct()
	{
		helper('form');
		helper('gravatar');
		$this->patientModel = new PatientModel();
		$this->email = Services::email();
	}

	/*
	 * Register a new patient (get)
	 */
	public function register()
	{
		$data = [
			'title' => 'Register - Patient',
		];


		$data['content'] = view('patient/register', $data);
		return view('templates/base', $data);
	}
	/*
	 * Register a patient (post)
	 */
	public function store()
	{
		$validation = Services::validation();
		$validation->setRules([
			'emailAddress' => 'required|valid_email|is_unique[patient.emailAddress]',
			'password' => 'required|min_length[8]',
		]);

		if (!$validation->withRequest($this->request)->run()) {
			$data['title'] = 'Register - Patient';
			$data['errors'] = $validation->getErrors();
			$data['content'] = view('patient/register', $data);
			return view('templates/base', $data);
		}

		// Retrieve email address
		$emailAddress = $this->request->getPost('emailAddress');

		$newPatientData = [
			'emailAddress' => $emailAddress,
			'passwordHash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'gravatarHash' => get_gravatar_url($emailAddress)
		];

		$this->patientModel->insert($newPatientData);

		return redirect()->to('/auth/patient/login')->with('message', 'Registration successfully.');
	}

	/*
	 * Log in an patient (get)
	 */
	public function login()
	{
		$data = [
			'title' => 'Login - Admin',
		];

		$data['content'] = view('patient/login', $data);
		return view('templates/base', $data);
	}

	/*
	 * Log in a patient (post)
	 */
	public function login_action()
	{
		$validation = Services::validation();
		$validation->setRules([
			'emailAddress' => 'required|valid_email',
			'password' => 'required'
		]);

		if (!$this->validate($validation->getRules())) {
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}

		$patient = $this->patientModel->where('emailAddress', $this->request->getPost('emailAddress'))->first();
		if ($patient && password_verify($this->request->getPost('password'), $patient['passwordHash'])) {
			/* Set session data */
			session()->set([
				'user_id' => $patient['patientId'],
				'email_address' => $patient['emailAddress'],
				'user_type' => 'patient',
				'imageUrl' => $patient['imageUrl'] ?? $patient['gravatarHash']
			]);

			/* Redirect patient to dashboard */
			return redirect()->to('/patient/dashboard');
		}

		return redirect()->back()->with('error', 'Invalid login credentials.');
	}


	/*
	 * Send email confirmation to the patient
	 * @param string $emailAddress
	 */
	private function sendConfirmationEmail($emailAddress)
	{
		$token = bin2hex(random_bytes(50)); // Generate a token
		$link = base_url('/patient/confirm/' . $token);

		$emailData = [
			'to' => $emailAddress,
			'subject' => 'Email Confirmation',
			'message' => view('emails/patient_confirmation', ['link' => $link])
		];

		$this->email->setTo($emailData['to']);
		$this->email->setSubject($emailData['subject']);
		$this->email->setMessage($emailData['message']);
		$this->email->send();
	}

	/*
	 * Confirm patient email
	 * @param string $token
	 */
	public function confirm($token)
	{
		// Assume we store tokens in a separate table for simplicity
		$tokenModel = new \App\Models\TokenModel();
		$record = $tokenModel->where('token', $token)->first();

		if ($record && $record['type'] === 'email_confirmation') {
			$this->patientModel->update($record['user_id'], ['isConfirmed' => 1]);
			$tokenModel->delete($record['token_id']); // Remove used token
			return redirect()->to('/patient/login')->with('message', 'Email confirmed successfully.');
		}

		return redirect()->to('/patient/login')->with('error', 'Invalid or expired token.');
	}

	/*
	 * Log out a patient
	 */
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/auth/patient/login')->with('message', 'Logged out successfully.');
	}

	/*
	 * View patient profile
	 */
	public function profile($id)
	{
		$patient = $this->patientModel->find($id);

		if (!$patient) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Patient not found.');
		}

		return view('patient/profile', ['patient' => $patient]);
	}

	/*
	 * Update patient profile
	 */
	public function updateProfile($id)
	{
		$patient = $this->patientModel->find($id);

		if (!$patient) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Patient not found.');
		}

		$validation = Services::validation();
		$validation->setRules([
			'emailAddress' => 'required|valid_email'
		]);

		if (!$this->validate($validation->getRules())) {
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}

		$data = [
			'emailAddress' => $this->request->getPost('emailAddress')
		];

		$this->patientModel->update($id, $data);

		return redirect()->to('/patient/profile/' . $id)->with('message', 'Profile updated successfully.');
	}

	/*
	 * Reset patient password
	 */
	public function resetPassword($token)
	{
		$validation = Services::validation();
		$validation->setRules([
			'password' => 'required|min_length[8]'
		]);

		if (!$this->validate($validation->getRules())) {
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}

		$tokenModel = new \App\Models\TokenModel();
		$record = $tokenModel->where('token', $token)->first();

		if ($record && $record['type'] === 'password_reset') {
			$data = [
				'passwordHash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
			];
			$this->patientModel->update($record['user_id'], $data);
			$tokenModel->delete($record['token_id']); // Remove used token

			return redirect()->to('/patient/login')->with('message', 'Password reset successfully.');
		}

		return redirect()->to('/patient/login')->with('error', 'Invalid or expired token.');
	}
}
