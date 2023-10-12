<?php

namespace App\Controllers;

use App\Models\ClaimModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function dashboard(): string
    {
        $data['title'] = 'Dashboard';
        return view('dashboard', $data);
    }
}
