<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;

class AdminController extends BaseController
{
	public function __construct()
	{
		$this->appointmentModel = new AppointmentModel();
	}

    public function index()
    {
		$data = [
			'title' => 'Admin Dashboard - Salama Sasa',
			'content' => view('admin/dashboard')
		];

		return view('templates/base', $data);
	}

	public function appointments()
    {
        $appointments = $this->appointmentModel
            ->join('doctor', 'appointment.doctorId = doctor.doctorId')
            ->join('patient', 'appointment.patientId = patient.patientId')
            ->select('appointment.*, doctor.name as doctor_name, patient.emailAddress as patient_name')
            ->findAll();

        $data = [
            'title' => 'Appointments - Salama Sasa',
            'appointments' => $appointments,
        ];
        $data['content'] = view('admin/appointment/index', $data);

        return view('templates/base', $data);
    }
}
