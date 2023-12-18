<?php

namespace App\Controllers;

use App\Models\UserModel; 
use App\Models\SupermarketModel; 

class Checkout extends BaseController
{
    public function index($seg1 = null, $seg2 = null)
    {   
        if (session()->get('num_user') == '') {
            return redirect()->to('/');
        }

        $client = \Config\Services::curlrequest();
        $apiUrl = 'http://localhost:8081/api/products/indoapril/password';
        $response = $client->request('GET', $apiUrl);
        $products = json_decode($response->getBody(), true);

        $user = session()->get('num_user');

        $supermarket = model(SupermarketModel::class)->findById($seg1);
        $foundProduct = null;

        foreach ($products as $product) {
            if ($product['id'] == $seg2) {
                $foundProduct = $product;
                break;
            }
        }

        if ($foundProduct == null){
            return redirect()->to("/supermarket/$seg1");
        }
        
        $data = [
            'title'     => 'Checkout | HeMart',
            'product'   => $foundProduct,
            'supermarket' => $seg1,
            'user'      => $user['id']
        ];
        return view('checkout_view', $data);
    }
}