<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\InstitutionModel;
use App\Models\DoctorModel;
use App\Models\RegionModel;
use App\Models\PatientModel;

class AppointmentController extends BaseController
{
	protected $appointmentModel;
	protected $doctorModel;
	protected $patientModel;

	public function __construct()
	{
		$this->appointmentModel = new AppointmentModel();
		$this->institutionModel = new InstitutionModel();
		$this->doctorModel = new DoctorModel();
		$this->regionModel = new RegionModel();
		$this->patientModel = new PatientModel();
	}

	/*
	 * Show the form for creating a new appointment
	 * @param int $doctorId
	 */
	public function create($doctorId)
	{
		$doctor = $this->doctorModel
				 ->select('doctor.*, specialization.title as specializationTitle, institution.name as institutionName, region.name as regionName')
				 ->join('specialization', 'doctor.specializationId = specialization.specializationId')
				 ->join('institution', 'doctor.institutionId = institution.institutionId')
				 ->join('region', 'institution.regionId = region.regionId')
				 ->find($doctorId);


		if (!$doctor) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Doctor not found.');
		}

		$institution = $this->institutionModel->find($doctor['institutionId']);
		$region = $this->regionModel->find($institution['regionId']);

		$data = [
			'title' => 'Schedule Appointment - Salama Sasa',
			'doctor' => $doctor,
			'institution' => $institution,
			'region' => $region,
		];

		$data['content'] = view('patient/appointment/create', $data);
		return view('templates/base', $data);
	}

	/*
	 * Store a newly created appointment in the database
	 */
	public function store()
	{
		try {
			// Retrieve the posted data
			$patientId = session()->get('user_id');
			$doctorId = $this->request->getPost('doctorId');
			$appointmentDate = $this->request->getPost('appointment_date');
			$startTime = $this->request->getPost('start_time');
			$endTime = $this->request->getPost('end_time');

			// Convert date and time to datetime objects for validation
			$appointmentDateTime = new \DateTime($appointmentDate . ' ' . $startTime);
			$currentDateTime = new \DateTime();

			// Validate that the appointment date is not in the past
			if ($appointmentDateTime < $currentDateTime) {
				return redirect()->back()->with('error', 'Appointment date and time cannot be in the past.');
			}

			// Validate that there are no conflicting appointments for the doctor
			$existingAppointments = $this->appointmentModel
								->where('doctorId', $doctorId)
								->where('appointmentDate', $appointmentDate)
								->groupStart()
								->where('startTime <=', $startTime)
								->where('endTime >=', $startTime)
								->groupEnd()
								->orGroupStart()
								->where('startTime <=', $endTime)
								->where('endTime >=', $endTime)
								->groupEnd()
								->findAll();

			if (!empty($existingAppointments)) {
				return redirect()->back()->with('error', 'The doctor is already booked for the selected date and time.');
			}

			// Prepare the data for insertion
			$data = [
				'patientId' => $patientId,
				'doctorId' => $doctorId,
				'appointmentDate' => $appointmentDate,
				'startTime' => $startTime,
				'endTime' => $endTime,
				'status' => 'Pending',
				'ratings' => 0,
				'review' => '',
				'doctorComments' => '',
				'summary' => '',
			];

			// Insert the appointment data into the database
			if ($this->appointmentModel->insert($data)) {
				return redirect()->to('/patient/appointment')->with('success', 'Appointment created successfully.');
			} else {
				// Retrieve the error messages
				$errors = $this->appointmentModel->errors();
				$errorMessages = implode(', ', $errors);
				return redirect()->back()->with('error', 'Failed to create appointment: ' . $errorMessages);
			}
		} catch (\Exception $e) {
			return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
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
			  ->where('doctor.isApproved', true)
				  ->select('doctor.*, institution.name as institutionName, specialization.title as specializationTitle')
				  ->findAll();

		$data['doctors'] = $doctors;

		// Configurations
		$data['title'] = 'Dashboard - Salama Sasa';

		$data['content'] = view('patient/appointment/search_doctors', $data);
		return view('templates/base', $data);
	}

	/*
	 * Show appointment details and options to cancel, rate, and review
	 * @param int $appointmentId
	 */
	public function view($appointmentId)
	{
		$appointment = $this->appointmentModel->find($appointmentId);

		if (!$appointment) {
			return redirect()->back()->with('error', 'Appointment not found.');
		}

		$doctor = $this->doctorModel->find($appointment['doctorId']);
		$now = new \DateTime();
		$startTime = new \DateTime($appointment['startTime']);

		$data = [
			'title' => 'Appointment ' . $appointmentId . ' - Salama Sasa',
			'appointment' => $appointment,
			'doctor' => $doctor,
			'canCancel' => $now < $startTime,
			'canRate' => $now > $startTime,
		];

		$data['content'] = view('patient/appointment/profile', $data);
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

		$now = new \DateTime();
		$appointmentDateTime = new \DateTime($appointment['appointmentDate'] . ' ' . $appointment['startTime']);

		// Compare current date with appointment date and time
		if ($now >= $appointmentDateTime) {
			return redirect()->back()->with('error', 'Cannot cancel past appointments.');
		}

		$appointment['status'] = 'Cancelled';
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
		$appointment['ratings'] = $rating;

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
		$appointment['review'] = $review;

		if ($this->appointmentModel->save($appointment)) {
			return redirect()->back()->with('success', 'Review added successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to add review.');
		}
	}
}
