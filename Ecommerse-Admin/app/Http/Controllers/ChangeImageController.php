<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\homeSEOModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChangeImageController extends Controller
{
   function ChangeSEOIMG(Request $request){

        $OldPhotoURL=$request->input('OldPhotoURL');
        $OldPhotoID=$request->input('id');

        $OldPhotoURLArray= explode("/", $OldPhotoURL);
        $OldPhotoName=end($OldPhotoURLArray);


        $NewPhotoPath=$request->file('photo')->store('public');
        $NewPhotoName=explode("/", $NewPhotoPath)[1];
        $NewPhotoURL="http://".$_SERVER['HTTP_HOST']."/storage/".$NewPhotoName;
        $UpdateResult= homeSEOModel::where('id','=',$OldPhotoID)->update(['og_img'=>$NewPhotoURL]);
        $DeleteResult= Storage::delete('public/'.$OldPhotoName);

        return $UpdateResult;
   }
}
