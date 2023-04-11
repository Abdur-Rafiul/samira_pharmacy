<?php

namespace App\Http\Controllers;

use App\Models\SiteInfoModel;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    function SendSiteInfo(){
        $result =  SiteinfoModel::get();
        return $result;
    }

    function AboutPage(){
        return view('about');
    }
    function AboutCompanyPage(){
        return view('about_company');
    }
    function TermsPage(){
        return view('terms');
    }
    function PolicyPage(){
        return view('policy');
    }
    function PurchasePage(){
        return view('purchaseGuide');
    }
    function MobileAppPage(){
        return view('mobileApp');
    }
    function SocialPage(){
        return view('social');
    }


    function AddressPage(){
        return view('address');
    }



    function GetSiteInfoDetails(){
        $result= SiteInfoModel::get();
        return $result;
    }

    function UpdateSiteInfo(Request $request){
        $infoData=$request->input('infoData');
        $infoColumn= $request->input('infoColumn');
        $result= SiteInfoModel::where('id','=',1)->update([$infoColumn=> $infoData]);
        return $result;
    }





}
