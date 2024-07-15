<?php

namespace App\Controllers\Doctor;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\AppointmentModel;

class AppointmentController extends BaseController
{
	protected $appointmentModel;

	public function __construct()
	{
		$this->appointmentModel = new AppointmentModel();
		$this->patientModel = new PatientModel();
	}

	/*
	 * Display a list of appointments for the doctor
	 */
	public function index()
	{
		$doctorId = session()->get('user_id');

		$data['title'] = 'Doctor - Appointments';
		$data['appointments'] = $this->appointmentModel->getDoctorAppointments($doctorId);
		$data['content'] = view('doctor/index', $data);
		return view('templates/base', $data);
	}

	/*
	 * View a specific appointment
	 * @param int $appointmentId
	 */
	public function view($appointmentId)
	{
		$appointment = $this->appointmentModel->find($appointmentId);

		if (!$appointment) {
			return redirect()->back()->with('error', 'Appointment not found.');
		}

		$data['patient'] = $this->patientModel->find($appointment['patientId']);
		$data['title'] = 'Doctor - View Appointment';
		$data['appointment'] = $appointment;
		$data['content'] = view('doctor/appointment/view', $data);
		return view('templates/base', $data);
	}

	/*
	 * Edit the details of a specific appointment
	 * @param int $appointmentId
	 */
	public function edit($appointmentId)
	{
		$appointment = $this->appointmentModel->find($appointmentId);

		if (!$appointment) {
			return redirect()->back()->with('error', 'Appointment not found.');
		}

		// Check if appointment is unapproved
		if ($appointment->status == 'Approved') {
			return redirect()->back()->with('error', 'Cannot edit approved appointment.');
		}

		$data['title'] = 'Doctor - Edit Appointment';
		$data['appointment'] = $appointment;
		$data['content'] = view('doctor/appointment/edit', $data); // Adjust view path as needed
		return view('templates/base', $data);
	}

	/*
	 * Update the details of a specific appointment
	 * @param int $appointmentId
	 */
	public function update($appointmentId)
	{
		$appointment = $this->appointmentModel->find($appointmentId);

		if (!$appointment) {
			return redirect()->back()->with('error', 'Appointment not found.');
		}

		// Check if appointment is unapproved
		if ($appointment->status == 'Approved') {
			return redirect()->back()->with('error', 'Cannot update approved appointment.');
		}

		$data = [
			'startTime' => $this->request->getPost('start_time'),
			'endTime' => $this->request->getPost('end_time'),
			'summary' => $this->request->getPost('summary'),
		];

		if ($this->appointmentModel->update($appointmentId, $data)) {
			return redirect()->to('/doctor/appointment')->with('success', 'Appointment updated successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to update appointment.');
		}
	}

	/*
	 * Approve an appointment
	 * @param int $appointmentId
	 */
	public function approve($appointmentId)
	{
		$appointment = $this->appointmentModel->find($appointmentId);

		if (!$appointment) {
			return redirect()->back()->with('error', 'Appointment not found.');
		}

		$appointment['status'] = 'Approved';
		if ($this->appointmentModel->save($appointment)) {
			return redirect()->back()->with('success', 'Appointment approved successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to approve appointment.');
		}
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

		$appointment['status'] = 'Cancelled';
		if ($this->appointmentModel->save($appointment)) {
			return redirect()->back()->with('success', 'Appointment cancelled successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to cancel appointment.');
		}
	}

	/*
	 * Add doctor comments to an appointment
	 * @param int $appointmentId
	 */
	public function addComments($appointmentId)
	{
		$appointment = $this->appointmentModel->find($appointmentId);

		if (!$appointment) {
			return redirect()->back()->with('error', 'Appointment not found.');
		}

		$comments = $this->request->getPost('doctor_comments');
		$appointment['doctorComments'] = $comments;

		if ($this->appointmentModel->save($appointment)) {
			return redirect()->back()->with('success', 'Doctor comments added successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to add doctor comments.');
		}
	}
}
