<?php

namespace App\Controllers;

class Registration extends BaseController
{
    public function index()
    {   
        return view('registration_view');
    }

    public function registration_supermarket()
    {   
        return view('mitra_registration_view');
    }
}