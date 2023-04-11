<?php

namespace App\Http\Controllers;

use App\Models\ProductReviewModel;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    function ProductReviewPage(){
        return view('Review.ProductReview');
    }

    function ProductReviewData(){
        $result= ProductReviewModel::orderBy('id','desc')->get();
        return $result;
    }

    function ProductReviewDelete(Request $request){
        $id=$request->input('id');
        $result=ProductReviewModel::where('id','=',$id)->delete();
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
}
