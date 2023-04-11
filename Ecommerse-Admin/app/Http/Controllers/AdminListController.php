<?php

namespace App\Http\Controllers;

use App\Models\adminModel;
use Illuminate\Http\Request;

class AdminListController extends Controller
{

    function AdminListPage(){
        return view('adminList');
    }

    function AdminListData(){
        $result= adminModel::orderBy('id','desc')->get();
        return $result;
    }

    function AdminAdd(Request $request){

        $AdminName = $request->input('AdminName');
        $AdminEmail =$request->input('AdminEmail');
        $AdminMobile =$request->input('AdminMobile');
        $AdminUserName =$request->input('AdminUserName');
        $AdminPass1=$request->input('AdminPass1');

        $result= adminModel::insert([
            'name'=>$AdminName,
            'email'=> $AdminEmail,
            'mobile'=>$AdminMobile,
            'username'=>$AdminUserName,
            'password'=>$AdminPass1
        ]);
        return $result;
    }

    function AdminListDelete(Request $request){
        $id=$request->input('id');
        $result=adminModel::where('id','=',$id)->delete();
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

}
