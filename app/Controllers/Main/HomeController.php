<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Salama Sasa - Welcome',
			'content' => view('main/homepage')
		];

		return view('templates/base', $data);
	}
}
