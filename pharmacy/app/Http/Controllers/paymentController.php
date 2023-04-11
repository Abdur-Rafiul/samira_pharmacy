<?php

namespace App\Http\Controllers;

use App\Models\MedicineOrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class paymentController extends Controller
{
    public function index(Request $request){

        // dd($request->all());
        $url = 'https://sandbox.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
        $fields = array(
            'store_id' => 'aamarpaytest', //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
            'amount' => $request->price, //transaction amount
            'payment_type' => 'VISA', //no need to change
            'currency' => 'BDT',  //currenct will be USD/BDT
            'tran_id' => rand(1111111,9999999), //transaction id must be unique from your end
            'cus_name' => $request->fname,  //customer name
            'cus_email' => $request->email, //customer email address
            'cus_add1' => $request->address,  //customer address
            'mname' => $request->mname,
            'cname' => $request->cname,
            'img' => $request->img,
            'cus_add2' => 'Mohakhali DOHS', //customer address
            'cus_city' => 'Dhaka',  //customer city
            'cus_state' => 'Dhaka',  //state
            'cus_postcode' => '1206', //postcode or zipcode
            'cus_country' => 'Bangladesh',  //country
            'cus_phone' => $request->phone, //customer phone number
            'cus_fax' => 'Not¬Applicable',  //fax
            'ship_name' => 'ship name', //ship name
            'ship_add1' => 'House B-121, Road 21',  //ship address
            'ship_add2' => 'Mohakhali',
            'ship_city' => 'Dhaka',
            'ship_state' => 'Dhaka',
            'ship_postcode' => '1212',
            'ship_country' => 'Bangladesh',
            'desc' => 'payment description',
            'success_url' => route('success'), //your success route
            'fail_url' => route('fail'), //your fail route
            'cancel_url' => 'http://localhost/foldername/cancel.php', //your cancel url
            'opt_a' => $request->address,  //optional paramter
            'opt_b' => $request->mname,
            'opt_c' => $request->pharmacy,
            'opt_d' => $request->img,

            'signature_key' => 'dbb74894e82415a2f7ff0ec3a97e4183'); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

        $fields_string = http_build_query($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));
        curl_close($ch);

        $this->redirect_to_merchant($url_forward);
    }

    function redirect_to_merchant($url) {

        ?>
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head><script type="text/javascript">
                function closethisasap() { document.forms["redirectpost"].submit(); }
            </script></head>
        <body onLoad="closethisasap();">

        <form name="redirectpost" method="post" action="<?php echo 'https://sandbox.aamarpay.com/'.$url; ?>"></form>
        <!-- for live url https://secure.aamarpay.com -->
        </body>
        </html>
        <?php
        exit;
    }


    public function success(Request $req){
        //return $req;

    

            $mname = $req->opt_b;

            $img = $req->opt_d;
            $price = $req->amount_original;
            $pharmacy = $req->opt_c;
            $status = '2';
            $address = $req->opt_a;

            $delivery_email = $req->cus_email;
            $phone = $req->cus_phone;
            $fname = $req->cus_name;

            $medicine = new MedicineOrderModel();
            $medicine->category_name = "0";
            $medicine->medicine_name = $mname;
            $medicine->medicine_img = $img;
            $medicine->medicine_special_price = $price;
            $medicine->medicine_price = 0;
            $medicine->medicine_discount = 0;
            $medicine->pharmacy = $pharmacy;
            $medicine->email = 'r';

            $medicine->delivery_email = $delivery_email;
            $medicine->phone = $phone;
            $medicine->fname = $fname;
            $medicine->address = $address;
            $medicine->status = $status;

            $medicine->save();


            // dd($medicine);
            if($medicine){
                return redirect('/');

            }else{

                return 0;
            }
        }


    public function fail(Request $request){
        return $request;
    }
}
