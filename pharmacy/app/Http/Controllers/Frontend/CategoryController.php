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






        //$medicineName= medicineDetailsModel::where('medicine_name','=',$MedicineName)->pluck('medicine_name');
        $medicine= medicineDetailsModel::where('medicine_name','=',$MedicineName)->first();

        if($Category === 'Common Medicine'){

            $medicineDetails = medicineDetailsModel::leftJoin('common_medicine_table', function($join) {
                $join->on('medicine_details.medicine_name', '=', 'common_medicine_table.medicine_name');
            }) ->where('medicine_details.medicine_name', '=', $MedicineName)->first();



            if($medicineDetails){
             // dd($medicineDetails);

                return $medicineDetails;
            }else{

                return 0;
            }

        }



        //return view('frontend.medicineDetails',compact('medicineDetails'));
    }
}
