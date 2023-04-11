<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductListModel;
use App\Models\SubCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    function CategoryListPage(){
        return view('Product.category');
    }

    function CategoryListData(){
        $result= CategoryModel::orderBy('id','desc')->get();

        //dd($result);
        return $result;
    }
    function GetCategoryName(Request $request){
        $id=$request->input('id');
        $result=CategoryModel::where('id','=',$id)->get();
        return $result;
    }

    function CategoryAdd(Request $request){
        $filePath=$request->file('cat_image')->store('public');
        $fileName=explode("/", $filePath)[1];
        $cat_image="http://".$_SERVER['HTTP_HOST']."/storage/".$fileName;

        $cat_name=$request->input('cat_name');
        $result=CategoryModel::insert([
            'cat1_name'=>$cat_name,
            'cat1_image'=>$cat_image,
        ]);
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function CategoryDelete(Request $request){
        $id=$request->input('id');
        $imageURL=$request->input('imageURL');

        $OldPhotoURLArray= explode("/", $imageURL);
        $OldPhotoName=end($OldPhotoURLArray);

        $result=CategoryModel::where('id','=',$id)->delete();
        Storage::delete('public/'.$OldPhotoName);
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function CategoryNameEdit(Request $request){
        $cat_id=$request->input('cat_id');
        $old_cat_name=$request->input('sobuj');
        $new_cat_name=$request->input('new_cat_name');
        $test='Sobuj';

        CategoryModel::where('cat1_name',$old_cat_name)->update([
            'cat1_name'=>$new_cat_name
        ]);
        SubCategoryModel::where('cat1_name',$old_cat_name)->update([
            'cat1_name'=>$new_cat_name
        ]);
        ProductListModel::where('category',$old_cat_name)->update([
            'category'=>$new_cat_name
        ]);

        return 1;

    }

    function ChangeCategoryImage(Request $request){

        $OldPhotoURL=$request->input('oldImage');
        $OldPhotoID=$request->input('ImageID');

        $OldPhotoURLArray= explode("/", $OldPhotoURL);
        $OldPhotoName=end($OldPhotoURLArray);


        $NewPhotoPath=$request->file('newImage')->store('public');
        $NewPhotoName=explode("/", $NewPhotoPath)[1];
        $NewPhotoURL="http://".$_SERVER['HTTP_HOST']."/storage/".$NewPhotoName;
        $UpdateResult= CategoryModel::where('id','=',$OldPhotoID)->update(['cat1_image'=>$NewPhotoURL]);
        $DeleteResult= Storage::delete('public/'.$OldPhotoName);

        return $UpdateResult;
    }
}
