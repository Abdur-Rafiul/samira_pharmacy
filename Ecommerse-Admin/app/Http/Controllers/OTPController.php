<?php

namespace App\Http\Controllers;

use App\Models\OTPModel;
use Illuminate\Http\Request;

class OTPController extends Controller
{
    function OtpListPage(){
        return view('OTP.OtpHistory');
    }

    function OtpListData(){
        $result= OTPModel::orderBy('id','desc')->get();
        return $result;
    }
}
