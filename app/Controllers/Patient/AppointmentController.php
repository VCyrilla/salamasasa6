<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\DoctorModel;
use App\Models\PatientModel;

class AppointmentController extends BaseController
{
	protected $appointmentModel;
	protected $doctorModel;
	protected $patientModel;
	protected $emailService;

	public function __construct()
	{
		$this->appointmentModel = new AppointmentModel();
		$this->doctorModel = new DoctorModel();
		$this->patientModel = new PatientModel();
	}

	/*
	 * Show the form for creating a new appointment
	 * @param int $doctorId
	 */
	public function create($doctorId)
	{
		$doctor = $this->doctorModel->find($doctorId);

		if (!$doctor) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Doctor not found.');
		}

		$institution = $this->institutionModel->find($doctor['institutionId']);
		$region = $this->regionModel->find($institution['regionId']);

		$data = [
			'doctor' => $doctor,
			'institution' => $institution,
			'region' => $region
		];

		return view('patient/appointment/create', $data);
	}

	/*
	 * Store a newly created appointment in the database
	 */
	public function store()
	{
		$data = [
			'patientId' => $this->session->get('patientId'), // Assuming patient is logged in
			'doctorId' => $this->request->getPost('doctorId'),
			'startTime' => $this->request->getPost('start_time'),
			'endTime' => $this->request->getPost('end_time'),
			'status' => 'Pending', // Initial status
		];

		if ($this->appointmentModel->insert($data)) {
			return redirect()->to('/patient/appointment')->with('success', 'Appointment created successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to create appointment.');
		}
	}

	/*
	 * Display a listing of the patient's appointments
	 */
	public function index()
	{
		// Retrieve current user ID
		$patientId = session()->get('user_id');

		// Configurations
		$data['title'] = 'Dashboard - Salama Sasa';

		// Retrieve current user appointments
		$data['appointments'] = $this->appointmentModel->getPatientAppointments($patientId);

		$data['content'] = view('patient/index', $data);
		return view('templates/base', $data);
	}

	/*
	 * Show the form for searching doctors
	 */
	public function searchDoctors()
	{
		// Fetch all doctors
        $doctors = $this->doctorModel
            ->join('institution', 'doctor.institutionId = institution.institutionId')
            ->join('specialization', 'doctor.specializationId = specialization.specializationId')
            ->select('doctor.*, institution.name as institutionName, specialization.title as specializationTitle')
            ->findAll();

        $data['doctors'] = $doctors;
			
		// Configurations
		$data['title'] = 'Dashboard - Salama Sasa';

		$data['content'] = view('patient/appointment/search_doctors', $data);
		return view('templates/base', $data);
	}

	/*
	 * Cancel an appointment
	 * @param int $appointmentId
	 */
	public function cancel($appointmentId)
	{
		$appointment = $this->appointmentModel->find($appointmentId);

		if (!$appointment) {
			return redirect()->back()->with('error', 'Appointment not found.');
		}

		// Check if appointment is approved
		if ($appointment->status == 'Approved') {
			/* This might take time
			// Notify doctor via email
			$doctor = $this->doctorModel->find($appointment->doctorId);
			$this->emailService->sendAppointmentCancellationEmail($doctor->emailAddress, $appointment->id);
			 */

		}

		$appointment->status = 'Cancelled';
		if ($this->appointmentModel->save($appointment)) {
			return redirect()->back()->with('success', 'Appointment cancelled successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to cancel appointment.');
		}
	}

	/*
	 * Rate an appointment
	 * @param int $appointmentId
	 */
	public function rate($appointmentId)
	{
		$appointment = $this->appointmentModel->find($appointmentId);

		if (!$appointment) {
			return redirect()->back()->with('error', 'Appointment not found.');
		}

		$rating = $this->request->getPost('rating');
		$appointment->ratings = $rating;

		if ($this->appointmentModel->save($appointment)) {
			return redirect()->back()->with('success', 'Appointment rated successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to rate appointment.');
		}
	}

	/*
	 * Add review to an appointment
	 * @param int $appointmentId
	 */
	public function addReview($appointmentId)
	{
		$appointment = $this->appointmentModel->find($appointmentId);

		if (!$appointment) {
			return redirect()->back()->with('error', 'Appointment not found.');
		}

		$review = $this->request->getPost('review');
		$appointment->review = $review;

		if ($this->appointmentModel->save($appointment)) {
			return redirect()->back()->with('success', 'Review added successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to add review.');
		}
	}
}
