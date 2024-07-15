<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RegionModel;

class RegionController extends BaseController
{
	protected $regionModel;

	public function __construct()
	{
		$this->regionModel = new RegionModel();
	}

	/*
	 * Display a list of all regions
	 */
	public function index()
	{
		// Page Title
		$data['title'] = 'Available Regions';

		// Retrieve registered doctors
		$data['regions'] = $this->regionModel->getAllRegions();

		// Add content to the data
		$data['content'] = view('admin/region/index', $data);

		// Return view
		return view('templates/base', $data);
	}

	/*
	 * Show the form for creating a new region
	 */
	public function create()
	{
		// Add title to the data
		$data['title'] = 'Create Region - Salama Sasa';
		
		// Add content to the data
		$data['content'] = view('admin/region/create', $data);

		return view('templates/base', $data);
	}

	/*
	 * Store a newly created region in the database
	 */
	public function store()
	{
		$data = [
			'name' => $this->request->getPost('name'),
			'description' => $this->request->getPost('description'),
		];

		if ($this->regionModel->insert($data)) {
			return redirect()->to('/admin/region')->with('success', 'Region registered successfully.');
		} else {
			return redirect()->back()->withInput()->with('error', 'Failed to register region.');
		}
	}

	/*
	 * Show the form for editing the specified region
	 * @param int $id
	 */
	public function edit($id)
	{
		$data['region'] = $this->regionModel->find($id);

		if (!$data['region']) {
			return redirect()->to('/admin/region')->with('error', 'Region not found.');
		}

		// Add title to the data
		$data['title'] = 'Edit Region - Salama Sasa';
		
		// Add content to the data
		$data['content'] = view('admin/region/edit', $data);

		// Return view
		return view('templates/base', $data);
	}

	/*
	 * Update the specified region in the database
	 * @param int $id
	 */
	public function update($id)
	{
		$data = [
			'name' => $this->request->getPost('name'),
			'description' => $this->request->getPost('description'),
		];

		if ($this->regionModel->update($id, $data)) {
			return redirect()->to('/admin/region')->with('success', 'Region updated successfully.');
		} else {
			return redirect()->back()->withInput()->with('error', 'Failed to update region.');
		}
	}

	/*
	 * Delete the specified region from the database
	 * @param int $id
	 */
	public function delete($id)
	{
		// Check if region has children (institutions)
		$hasChildren = $this->regionModel->hasInstitutions($id);

		if ($hasChildren) {
			return redirect()->back()->with('error', 'Cannot delete region with associated institutions.');
		}

		if ($this->regionModel->delete($id)) {
			return redirect()->to('/admin/region')->with('success', 'Region deleted successfully.');
		} else {
			return redirect()->back()->with('error', 'Failed to delete region.');
		}
	}
}

