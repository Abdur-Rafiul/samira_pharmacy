<?php

namespace App\Http\Controllers;

use App\Models\ProductListModel;
use App\Models\SubCategoryModel;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function SubCategoryListPage(){
        return view('Product.subCategory');
    }

    function SubCategoryListData(){
        $result= SubCategoryModel::orderBy('id','desc')->get();
        return $result;
    }

    function SubCategoryAdd(Request $request){

        $cat_name=$request->input('cat_name');
        $sub_cat=$request->input('sub_cat_name');
        $result=SubCategoryModel::insert([
            'cat1_name'=>$cat_name,
            'cat2_name'=>$sub_cat,
        ]);
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function SubCategoryDelete(Request $request){
        $id=$request->input('id');
        $result=SubCategoryModel::where('id','=',$id)->delete();
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }


    function GetSubCategoryEditData(Request $request){
        $id=$request->input('id');
        $result=SubCategoryModel::where('id','=',$id)->get();
        return $result;
    }
    function SubCategoryNameEdit(Request $request){
        $cat_id=$request->input('cat_id');
        $old_cat_name=$request->input('sobuj');
        $new_cat_name=$request->input('new_cat_name');
        $test='Sobuj';

        SubCategoryModel::where('cat2_name',$old_cat_name)->update([
            'cat2_name'=>$new_cat_name
        ]);
        ProductListModel::where('subcategory',$old_cat_name)->update([
            'subcategory'=>$new_cat_name
        ]);

        return 1;

    }
}
