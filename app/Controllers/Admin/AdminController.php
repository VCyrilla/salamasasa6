<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
		$data = [
			'title' => 'Admin Dashboard - Salama Sasa',
			'content' => view('admin/dashboard')
		];

		return view('templates/base', $data);
	}
}
