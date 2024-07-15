<?php

namespace App\Controllers\Admin;

use App\Models\RegionModel;
use App\Models\InstitutionModel;
use App\Controllers\BaseController;

class InstitutionController extends BaseController
{
    protected $institutionModel;

    public function __construct()
    {
        $this->institutionModel = new InstitutionModel();
        $this->regionModel = new RegionModel();
    }

    /*
    * Display a list of all institutions
    */
    public function index()
    {
		$data['title'] = 'Institutions - Salama Sasa';
        $data['institutions'] = $this->institutionModel->getAllInstitutions();
		$data['content'] = view('admin/institution/index', $data);
		return view('templates/base', $data);
    }

    /*
    * Show the form for creating a new institution
    */
    public function create()
	{
		$regionModel = new RegionModel();
		$data['title'] = 'Register Institution - Salama Sasa';
		$data['regions'] = $regionModel->getAllRegions();

		$data['content'] = view('admin/institution/create', $data);
		return view('templates/base', $data);
    }

    /*
    * Store a newly created institution in the database
    */
    public function store()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'longitude' => "36.8034",
            'latitude' => "1.2959",
            'regionId' => $this->request->getPost('regionId'),
            'domain' => $this->request->getPost('domain'),
            'imageUrl' => '',
        ];

        if ($this->institutionModel->insert($data)) {
            return redirect()->to('/admin/institution')->with('success', 'Institution registered successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to register institution.');
        }
    }

    /*
    * Show the form for editing the specified institution
    * @param int $id
    */
    public function edit($id)
	{
		// Retrieve institution record
        $data['institution'] = $this->institutionModel->find($id);

        if (!$data['institution']) {
            return redirect()->to('/admin/institution')->with('error', 'Institution not found.');
        }

		// Retrieve all registered regions
		$data['regions'] = $this->regionModel->getAllRegions();
		
		return view('admin/institution/edit', $data);
    }

    /*
    * Update the specified institution in the database
    * @param int $id
    */
    public function update($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'longitude' => "36.8034",
            'latitude' => "1.2959",
            'regionId' => $this->request->getPost('regionId'),
            'domain' => $this->request->getPost('domain'),
        ];

        if ($this->institutionModel->update($id, $data)) {
            return redirect()->to('/admin/institution')->with('success', 'Institution updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update institution.');
        }
    }

    /*
    * Delete the specified institution from the database
    * @param int $id
    */
    public function delete($id)
    {
        // Check if institution has children (doctors)
        $hasChildren = $this->institutionModel->hasDoctors($id);

        if ($hasChildren) {
            return redirect()->back()->with('error', 'Cannot delete institution with associated doctors.');
        }

        if ($this->institutionModel->delete($id)) {
            return redirect()->to('/admin/institution')->with('success', 'Institution deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete institution.');
        }
    }

    /*
    * Update the profile image of the specified institution
    * @param int $id
    */
    public function updateImage($id)
    {
        $file = $this->request->getFile('image');

        if ($file->isValid() && $file->getClientMimeType() == 'image/jpeg') {
            $newName = $file->getRandomName();
            $file->move('./uploads', $newName);

            $data = [
                'imageUrl' => $newName,
            ];

            if ($this->institutionModel->update($id, $data)) {
                return redirect()->to('/admin/institution')->with('success', 'Institution image updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update institution image.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid image format.');
        }
    }
}
