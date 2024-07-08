<?php

namespace App\Controllers\Admin;

use App\Models\DoctorModel;
use CodeIgniter\Controller;

/*
 * Admin Doctor Controller for managing doctors' approval status
 */
class DoctorController extends Controller
{
	protected $doctorModel;

	public function __construct()
	{
		$this->doctorModel = new DoctorModel();
	}

	/*
	 * Display all doctors
	 */
	public function index()
	{
		// Page Title
		$data['title'] = 'Registered Doctors';

		// Retrieve registered doctors
		$data['doctors'] = $this->doctorModel
				  ->join('specialization', 'doctor.specializationId = specialization.specializationId')
				  ->join('institution', 'doctor.institutionId = institution.institutionId')
				  ->select('doctor.*, specialization.title as specializationTitle, institution.name as institutionName')
				  ->findAll();

		// Add content to the data
		$data['content'] = view('admin/doctor/index', $data);

		// Return view
		return view('templates/base', $data);
	}

	/*
	 * Approve a doctor
	 * @param int $doctorId
	 */
	public function approve($doctorId)
	{
		$doctor = $this->doctorModel->find($doctorId);

		if (!$doctor) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Doctor not found.');
		}

		$this->doctorModel->update($doctorId, ['isApproved' => true]);

		return redirect()->back()->with('message', 'Doctor approved successfully.');
	}

	/*
	 * Disapprove a doctor
	 * @param int $doctorId
	 */
	public function disapprove($doctorId)
	{
		$doctor = $this->doctorModel->find($doctorId);

		if (!$doctor) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Doctor not found.');
		}

		$this->doctorModel->update($doctorId, ['isApproved' => false]);

		return redirect()->back()->with('message', 'Doctor disapproved successfully.');
	}
}
