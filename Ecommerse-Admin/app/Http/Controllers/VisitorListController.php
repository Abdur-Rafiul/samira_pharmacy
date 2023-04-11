<?php

namespace App\Http\Controllers;

use App\Models\notificationModel;
use App\Models\visitorModel;
use Illuminate\Http\Request;

class VisitorListController extends Controller
{
    function VisitorListPage(){
        return view('visitorList');
    }

    function VisitorListData(){
        $result= visitorModel::orderBy('id','desc')->get();
        return $result;
    }
}
