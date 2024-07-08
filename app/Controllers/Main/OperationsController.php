<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class OperationsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Salama Sasa - Operations Guide',
            'content' => view('main/operations')
        ];

        return view('templates/base', $data);
    }
}
