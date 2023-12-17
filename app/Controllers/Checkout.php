<?php

namespace App\Controllers;

use App\Models\UserModel; 

class Checkout extends BaseController
{
    public function index()
    {   
        if (session()->get('num_user') == '') {
            return redirect()->to('/');
        }
        $data = [
            'title'     => 'Checkout | HeMart'
        ];
        return view('checkout_view', $data);
    }
}