<?php

namespace App\Http\Controllers;

use App\Models\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    function ShopPage(){
        return view('Shop.Shop');
    }
    function ShopData(){
        $result= ShopModel::orderBy('id','desc')->get();
        return $result;
    }

    function ShopAdd(Request $request){
        $filePath=$request->file('shop_logo')->store('public');
        $fileName=explode("/", $filePath)[1];
        $shop_logo="http://".$_SERVER['HTTP_HOST']."/storage/".$fileName;

        $shop_code=$request->input('shop_code');
        $shop_name=$request->input('shop_name');
        $shop_address=$request->input('shop_address');
        $shop_owner=$request->input('shop_owner');
        $shop_category=$request->input('shop_category');
        $shop_username=$request->input('shop_username');
        $shop_mobile=$request->input('shop_mobile');
        $shop_email=$request->input('shop_email');
        $shop_password=$request->input('shop_password');
        $shop_status=$request->input('shop_status');
        $result=ShopModel::insert([
            'shop_code'=>$shop_code,
            'shop_name'=>$shop_name,
            'shop_logo'=>$shop_logo,
            'shop_address'=>$shop_address,
            'shop_owner'=>$shop_owner,
            'shop_category'=>$shop_category,
            'shop_username'=>$shop_username,
            'shop_mobile'=>$shop_mobile,
            'shop_email'=>$shop_email,
            'shop_password'=>$shop_password,
            'shop_status'=>$shop_status
        ]);
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function ShopDelete(Request $request){
        $id=$request->input('id');
        $imageURL=$request->input('imageURL');

        $OldPhotoURLArray= explode("/", $imageURL);
        $OldPhotoName=end($OldPhotoURLArray);

        $result=ShopModel::where('id','=',$id)->delete();
        Storage::delete('public/'.$OldPhotoName);
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function ChangeShopLogo(Request $request){

        $OldPhotoURL=$request->input('oldImage');
        $OldPhotoID=$request->input('ImageID');

        $OldPhotoURLArray= explode("/", $OldPhotoURL);
        $OldPhotoName=end($OldPhotoURLArray);


        $NewPhotoPath=$request->file('newImage')->store('public');
        $NewPhotoName=explode("/", $NewPhotoPath)[1];
        $NewPhotoURL="http://".$_SERVER['HTTP_HOST']."/storage/".$NewPhotoName;
        $UpdateResult= ShopModel::where('id','=',$OldPhotoID)->update(['shop_logo'=>$NewPhotoURL]);
        $DeleteResult= Storage::delete('public/'.$OldPhotoName);

        return $UpdateResult;
    }
}
