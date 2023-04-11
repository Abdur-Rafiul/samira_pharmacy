<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductListModel;
use App\Models\SubCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductListController extends Controller
{

    function ProductListByRemark(Request $request){

        $remark = $request->remark;
        $ProductList = ProductListModel::where('remark',$remark)->get();
        return $ProductList;
    }

    function ProductListBySubCategory(Request $request){

        $Category = $request->Category;
        $SubCategory = $request->SubCategory;
        $ProductList = ProductListModel::where('category',$Category)->where('subcategory',$SubCategory)->get();
        return $ProductList;
    }
    function ProductListByCategory(Request $request){

        $Category = $request->Category;
        $ProductList = ProductListModel::where('category',$Category)->get();
        return $ProductList;
    }

    function ProductBySearch(Request $request){

        $key = $request->key;
        $ProductList = ProductListModel::where('title','LIKE',"%{$key}%")->get();
        return $ProductList;
    }

    function SimilarProduct(Request $request){

        $SubCategory = $request->subcategory;
        $ProductList=ProductListModel::where('subcategory',$SubCategory)->orderBy('id','desc')->limit(12)->get();
        return $ProductList;

    }
    function ProductListPage(){
        return view('Product.ProductList');
    }
    function ProductListData(){
        $result= ProductListModel::orderBy('id','desc')->get();
        return $result;
    }

    function GetCategoryList(){
        $result= CategoryModel::select('cat1_name')->orderBy('id','desc')->get();
        return $result;
    }

    function GetSubCategoryAsCategory(Request $request){
        $category_name=$request->input('category_name');
        $result=SubCategoryModel::select('cat2_name')->where('cat1_name','=',$category_name)->get();
        return $result;
    }

    function ProductListAdd(Request $request){
        $filePath=$request->file('image')->store('public');
        $fileName=explode("/", $filePath)[1];
        $image="http://".$_SERVER['HTTP_HOST']."/storage/".$fileName;

        $title=$request->input('title');
        $price=$request->input('price');
        $special_price=$request->input('special_price');
        $category=$request->input('category');
        $subcategory=$request->input('subcategory');
        $remark=$request->input('remark');
        $brand=$request->input('brand');
        $shop=$request->input('shop');
        $DataArray=explode('(' , rtrim($shop, ')'));
        $shop_code=$DataArray[0];
        $shop_name=$DataArray[1];


        $star=$request->input('star');
        $stock=$request->input('stock');
        $product_code=$request->input('product_code');
        $result=ProductListModel::insert([
            'title'=>$title,
            'price'=>$price,
            'special_price'=>$special_price,
            'image'=>$image,
            'category'=>$category,
            'subcategory'=>$subcategory,
            'remark'=>$remark,
            'brand'=>$brand,
            'shop'=>$shop_code,
            'shop_name'=>$shop_name,
            'star'=>$star,
            'product_code'=>$product_code,
            'stock'=>$stock
        ]);
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function ProductListDelete(Request $request){
        $id=$request->input('id');
        $imageURL=$request->input('imageURL');

        $OldPhotoURLArray= explode("/", $imageURL);
        $OldPhotoName=end($OldPhotoURLArray);

        $result=ProductListModel::where('id','=',$id)->delete();
        Storage::delete('public/'.$OldPhotoName);
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function ChangeProductListImage(Request $request){

        $OldPhotoURL=$request->input('oldImage');
        $OldPhotoID=$request->input('ImageID');

        $OldPhotoURLArray= explode("/", $OldPhotoURL);
        $OldPhotoName=end($OldPhotoURLArray);


        $NewPhotoPath=$request->file('newImage')->store('public');
        $NewPhotoName=explode("/", $NewPhotoPath)[1];
        $NewPhotoURL="http://".$_SERVER['HTTP_HOST']."/storage/".$NewPhotoName;
        $UpdateResult= ProductListModel::where('id','=',$OldPhotoID)->update(['image'=>$NewPhotoURL]);
        $DeleteResult= Storage::delete('public/'.$OldPhotoName);

        return $UpdateResult;
    }

    //edit data
    function ProductListEditData(Request $request){
        $id=$request->input('id');
        $result=ProductListModel::where('id','=',$id)->get();
        return $result;
    }

    function ProductListDataEdit(Request $request){
        $editID=$request->input('editID');
        $title=$request->input('title');
        $price=$request->input('price');
        $special_price=$request->input('special_price');
        $remark=$request->input('remark');
        $star=$request->input('star');
        $stock=$request->input('stock');
        $result=ProductListModel::where('id',$editID)->update([
            'title'=>$title,
            'price'=>$price,
            'special_price'=>$special_price,
            'remark'=>$remark,
            'star'=>$star,
            'stock'=>$stock
        ]);
        return $result;
    }
}
