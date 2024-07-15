<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SpecializationModel;

class SpecializationController extends BaseController
{
	protected $specializationModel;

	public function __construct()
	{
		$this->specializationModel = new SpecializationModel();
	}

	/*
	 * Display a list of all specializations
	 */
	public function index()
	{
		$data['specializations'] = $this->specializationModel->getAllSpecializations();
		$data['title'] = 'Specializations - Salama Sasa';
		$data['content'] = view('admin/specialization/index', $data);

		return view('templates/base', $data);
	}

	/*
	 * Show the form for creating a new specialization
	 */
	public function create()
	{
		$data['title'] = 'Add Specialization - Salama Sasa';
		$data['content'] = view('admin/specialization/create', $data);

		return view('templates/base', $data);
	}

	/*
	 * Store a newly created specialization in the database
	 */
	public function store()
	{
		$data = [
			'title' => $this->request->getPost('title'),
			'description' => $this->request->getPost('description')
		];

		if ($this->specializationModel->insert($data)) {
			return redirect()->to('/admin/specialization')->with('success', 'Specialization created successfully.');
		} else {
			return redirect()->back()->withInput()->with('error', 'Failed to create specialization.');
		}
	}

	/*
	 * Show the form for editing the specified specialization
	 * @param int $id
	 */
	public function edit($id)
	{
		$data['specialization'] = $this->specializationModel->find($id);

		if (!$data['specialization']) {
			return redirect()->to('/admin/specialization')->with('error', 'Specialization not found.');
		}

		$data['title'] = 'Edit Specialization - Salama Sasa';
		$data['content'] = view('admin/specialization/edit', $data);

		return view('templates/base', $data);
	}

	/*
	 * Update the specified specialization in the database
	 * @param int $id
	 */
	public function update($id)
	{
		$data = [
			'title' => $this->request->getPost('title'),
			'description' => $this->request->getPost('description')
		];

		if ($this->specializationModel->update($id, $data)) {
			return redirect()->to('/admin/specialization')->with('success', 'Specialization updated successfully.');
		} else {
			return redirect()->back()->withInput()->with('error', 'Failed to update specialization.');
		}
	}

	/*
	 * Delete the specified specialization from the database
	 * @param int $id
	 */
	public function delete($id)
	{
		// Check if specialization has children (doctors)
		$hasChildren = $this->specializationModel->hasDoctors($id);

		if ($hasChildren) {
			return redirect()->back()->with('error', 'Cannot delete specialization with associated doctors.');
		}

		if ($this->specializationModel->delete($id)) {
			return redirect()->to('/admin/specialization')->with('success', 'Specialization deleted successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to delete specialization.');
		}
	}
}
