<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryLavel1Model;
use App\Models\CategoryLavel2Model;

class CategoryDetailsController extends Controller
{
    function SendCategoryDetails(){

     $ParentCategory = CategoryLavel1Model::all();
     $CategoryDetails = [];
     foreach($ParentCategory as $value){

       $subcategory =  CategoryLavel2Model::where('cat1_name',$value['cat1_name'])->get();

       $item=[

           'ParentCategoryName'=>$value['cat1_name'],
           'ParentCategoryImg'=>$value['cat1_image'],
           'Subcategory'=>$subcategory
       ];

       array_push($CategoryDetails,$item);

    }

    return $CategoryDetails;

    }
}
