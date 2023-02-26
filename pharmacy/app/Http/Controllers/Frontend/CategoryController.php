<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\categoryModel;
use App\Models\commonMedicineModel;
use App\Models\medicineDetailsModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getMedicineDetails($mname,$cname){

        return view('frontend.medicineDetails',compact('mname','cname'));

    }
    public function MedicineDetails(Request $req){
        //dd($req->all());
        $MedicineName =  $req->input('medicineName');
        $Category = $req->input('categoryName');

      // dd($MedicineName);

        //$medicineName= medicineDetailsModel::where('medicine_name','=',$MedicineName)->pluck('medicine_name');
        $medicine= medicineDetailsModel::where('medicine_name','=',$MedicineName)->first();

        if($Category === 'Common Medicine'){

            $medicineImg= commonMedicineModel::where('category_name','=',$Category)->get();

            $array[] = json_decode($medicine, true);
            $array[] = json_decode($medicineImg, true);
            $medicineDetails = json_encode($array, JSON_PRETTY_PRINT);

            //dd($medicineImg);

            if($medicineDetails){

                return $medicineDetails;
            }else{

                return 0;
            }

        }



        //return view('frontend.medicineDetails',compact('medicineDetails'));
    }
}
