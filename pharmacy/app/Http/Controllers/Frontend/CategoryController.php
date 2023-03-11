<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AddToCartModel;
use App\Models\babyModel;
use App\Models\categoryModel;
use App\Models\commonMedicineModel;
use App\Models\CovidModel;
use App\Models\DeviceModel;
use App\Models\HerbalModel;
use App\Models\ManModel;
use App\Models\medicineDetailsModel;
use App\Models\PersonalModel;
use App\Models\SexualModel;
use App\Models\SupplementModel;
use App\Models\WomenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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



            $medicineDetails = medicineDetailsModel::leftJoin('common_medicine_table', function($join) {
                $join->on('medicine_details.medicine_name', '=', 'common_medicine_table.medicine_name');
            }) ->where('medicine_details.medicine_name', '=', $MedicineName)->first();



            if($medicineDetails){
             // dd($medicineDetails);

                return $medicineDetails;
            }else{

                return 0;
            }





        //return view('frontend.medicineDetails',compact('medicineDetails'));
    }

    public function CategoryMedicineDetails($category_name){

        if($category_name == 'Common Medicine')
        {
            $medicine = commonMedicineModel::get();
        }
        elseif ($category_name == 'Baby & Mom Care')
        {
            $medicine = babyModel::get();
        }
        elseif ($category_name == 'Man Care')
        {
            $medicine = ManModel::get();
        }
        elseif($category_name == 'Women Care')
        {
            $medicine = WomenModel::get();
        }
        elseif($category_name == 'Sexual Wellness')
        {
            $medicine = SexualModel::get();
        }
        elseif($category_name == 'Supplements & Vitamins')
        {
            $medicine = SupplementModel::get();
        }
        elseif($category_name == 'Personal Care')
        {
            $medicine = PersonalModel::get();
        }
        elseif($category_name == 'Device')
        {
            $medicine = DeviceModel::get();
        }
        elseif($category_name == 'Herbal & Homeopathy')
        {
            $medicine = HerbalModel::get();
        }
        elseif($category_name == 'Covid-19 Special')
        {
            $medicine = CovidModel::get();
        }

      // dd($categoryMedicineDetails);

        return view('frontend.categorymedicinedetails',compact('medicine'));
    }

    public function AddToCart(Request $req){

          $mname = $req->input('mname');
          $cname = $req->input('cname');
          $img = $req->input('img');
          $price = $req->input('price');
          $pharmacy = $req->input('pharmacy');

          $medicine = new AddToCartModel();
          $medicine->category_name = $cname;
          $medicine->medicine_name = $mname;
          $medicine->medicine_img = $img;
          $medicine->medicine_special_price = $price;
          $medicine->medicine_price = 0;
          $medicine->medicine_discount = 0;
          $medicine->pharmacy = $pharmacy;
          $medicine->email = Auth::user()->email;

          $medicine->save();

          //dd($req->all());
        $count = AddToCartModel::count();
        if($count){
            return $count;

        }else{

            return 0;
        }
    }
}
