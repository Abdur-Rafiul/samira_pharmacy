<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationModel;
class NotificationController extends Controller
{
    function NotificationHistory(){

       $result = NotificationModel::get();
       return $result;
    }
}
