<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentTestController extends Controller
{
    function PaymentTest(){
        return view('Product.PaymentTest');
    }
}
