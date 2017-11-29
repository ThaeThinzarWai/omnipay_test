<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Omnipay;

class TestController extends Controller
{
    public function index()
    {
    	$cardInput = [
			'number'      => '4444333322221111',
			'firstName'   => 'MR. WALTER WHITE',
			'expiryMonth' => '03',
			'expiryYear'  => '16',
			'cvv'         => '333',
		];

		$card = Omnipay::creditCard($cardInput);
		$response = Omnipay::purchase([
			'amount'    => '100.00',
			'returnUrl' => 'http://bobjones.com/payment/return',
			'cancelUrl' => 'http://bobjones.com/payment/cancel',
			'card'      => $cardInput
		])->send();

		dd($response->getMessage());
    }
}
