<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AddToCartModel;
use Illuminate\Http\Request;
use App\Models\categoryModel;
use App\Models\commonMedicineModel;
class HomeController extends Controller
{
    public function Home(){

       $category = categoryModel::all();
       $common_medicine= commonMedicineModel::all();
        $count = AddToCartModel::count();

        return view('frontend.index',compact('category','common_medicine','count'));
    }

   public function Category(){
       $category = categoryModel::all();
       $count = AddToCartModel::count();
       //dd($category) ;

       return $category;
   }
   public function Count(){

       $count = AddToCartModel::count();
       //dd($category) ;

       return $count;
   }

   public function DashBoardProfile(){

        return view('frontend.profile');
   }
}
