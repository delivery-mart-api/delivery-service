<?php

namespace App\Controllers;

use App\Models\UserModel; 

class Checkout extends BaseController
{
    public function index($seg1 = null)
    {   
        if (session()->get('num_user') == '') {
            return redirect()->to('/');
        }

        $client = \Config\Services::curlrequest();
        $apiUrl = 'http://localhost:8081/api/products/indoapril/password';
        $response = $client->request('GET', $apiUrl);
        $products = json_decode($response->getBody(), true);

        $foundProduct = null;

        foreach ($products as $product) {
            if ($product['id'] == $seg1) {
                $foundProduct = $product;
                break;
            }
        }

        if ($foundProduct == null){
            return redirect()->to("/");
        }
        
        $data = [
            'title'     => 'Checkout | HeMart',
            'product'   => $foundProduct
        
        ];
        return view('checkout_view', $data);
    }
}