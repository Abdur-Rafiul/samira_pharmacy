<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoryModel;
use App\Models\commonMedicineModel;
class HomeController extends Controller
{
    public function Home(){

       $category = categoryModel::all();
       $common_medicine= commonMedicineModel::all();

        return view('frontend.index',compact('category','common_medicine'));
    }

   public function Category(){
       $category = categoryModel::all();

       //dd($category) ;

       return $category;
   }
}
