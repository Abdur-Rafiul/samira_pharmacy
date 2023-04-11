<?php

namespace App\Http\Controllers;

use App\Models\FavListModel;
use App\Models\ProductListModel;
use Illuminate\Http\Request;

class FavListController extends Controller
{
    function  addFav(Request $request){
        $code = $request->code;
        $email = $request->email;
        $ProductDetails = ProductListModel::where('product_code',$code)->get();
        $result = FavListModel::insert([
            'title'=>$ProductDetails[0]['title'],
            'image'=>$ProductDetails[0]['images'],
            'product_code'=>$code,
            'mobile'=>$email,
        ]);
        return $result;
    }

    function favList(Request $request){
        $email = $request->email;
        $result = FavListModel::where('mobile',$email)->get();
        return $result;
    }

    function removeFavItem(Request $request){
        $code = $request->code;
        $email = $request->email;
        $result = FavListModel::where('mobile',$email)->where('product_code',$code)->delete();
        return $result;
    }
}
