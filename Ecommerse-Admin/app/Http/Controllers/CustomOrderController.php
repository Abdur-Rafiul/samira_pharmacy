<?php

namespace App\Http\Controllers;

use App\Models\CustomOrderModel;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
    function CustomOrderPage(){
        return view('Order.CustomOrder');
    }

    function CustomOrderData(){
        $result= CustomOrderModel::orderBy('id','desc')->get();
        return $result;
    }

    function CustomOrderDelete(Request $request){
        $id=$request->input('id');
        $result=CustomOrderModel::where('id','=',$id)->delete();
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
}
