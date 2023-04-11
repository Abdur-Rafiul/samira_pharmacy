<?php

namespace App\Http\Controllers;


use App\Models\homeSEOModel;
use Illuminate\Http\Request;

class SiteSEOController extends Controller
{
    function SiteSEOPage(){
        return view('siteSEO');
    }
    function GetSEODetails(){
        return homeSEOModel::orderBy('id','desc')->get();
    }
    function UpdateSEODetails(Request $request){
        $SiteTitle=  $request->input('SiteTitle');
        $SiteDes=  $request->input('SiteDes');
        $SiteKey= $request->input('SiteKey');
        $OgTitle= $request->input('OgTitle');
        $OgDes=  $request->input('OgDes');
        $OgSiteName=  $request->input('OgSiteName');
        $OgUrl=  $request->input('OgUrl');
        $id=  $request->input('id');
        $result=homeSEOModel::where('id','=',$id)->update(
            [
                'title'=>$SiteTitle,
                'des'=>$SiteDes,
                'keywords'=>$SiteKey,
                'og_title'=>$OgTitle,
                'og_des'=>$OgDes,
                'og_sitename'=>$OgSiteName,
                'og_url'=>$OgUrl,
            ]);
        return $result;
    }
}
