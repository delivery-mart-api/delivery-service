<?php

namespace App\Controllers;

use App\Models\UserModel; 

class Checkout extends BaseController
{
    public function index()
    {   
        $data = [
            'title'     => 'Checkout | HeMart'
        ];
        return view('checkout_view', $data);
    }
}