<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\directOrderModel;
use App\Models\ProductListModel;
use App\Models\ProductOrderModel;
use App\Models\SettingsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductOrderController extends Controller
{
    function CartOrder(Request $request){
        $city = $request->input('city');
        $paymentMethod = $request->input('paymentMethod');
        $address = $request->input('deliveryAddress');
        $yourName = $request->input('yourName');
        $email = $request->input('email');
        $invoice_no = $request->input('invoice_no');
        $ShippingPrice = $request->input('ShippingPrice');
        date_default_timezone_set('Asia/Dhaka');
        $request_time = date("h:i:sa");
        $request_date = date("d-m-y");
        $CartList = CartModel::where('email',$email)->get();
        $cartInsertDeleteResult="";
        foreach ($CartList as $CartListItem){
            $resultInsert = DirectOrderModel::insert([
                'invoice'=>"c".$invoice_no,
                'product_name'=>$CartListItem['product_name'],
                'product_code'=>$CartListItem['product_code'],
                'shop_name'=>'m',
                'shop_code'=>'c',
                'product_info'=>$CartListItem['product_info'],
                'product_quantity'=>$CartListItem['product_quantity'],
                'unit_price'=>$CartListItem['unit_price'],
                'total_price'=>$CartListItem['total_price'],
                'email'=>$email,
                'payment_method'=>$paymentMethod,
                'delivery_address'=>$address,
                'city'=>$city,
                'delivery_charge'=>'1',
                'order_date'=>$request_date,
                'order_time'=>$request_time,
                'order_status'=>'pending',
            ]);
        }
    }
    function AddToCart(Request $request){

        $color=$request->input('color');
        $size=$request->input('size');
        $quantity=$request->input('quantity');
        $email=$request->input('email');
        $product_code=$request->input('product_code');
        $ProductDetails=ProductListModel::where('product_code',$product_code)->get();
        $price=$ProductDetails[0]['price'];
        $special_price=$ProductDetails[0]['special_price'];
        if($special_price=='NA'){

            $total_price=$price*$quantity;
            $unit_price=$price;
        }else{

            $total_price=$special_price*$quantity;
            $unit_price=$special_price;
        }
        $result = CartModel::insert([
            'img'=>$ProductDetails[0]['image'],
            'product_name'=>$ProductDetails[0]['title'],
            'product_code'=>$product_code,
            'shop_name'=>"RFL",                //$ProductDetails[0]['shop_name'],
            'shop_code'=>"67",                 //$ProductDetails[0]['shop'],
            'product_info'=>'Color: '.$color.' size: '.$size,
            'product_quantity'=>$quantity,
            'unit_price'=>$unit_price,
            'total_price'=>$total_price,
            'email'=>$email,

        ]);
        return $result;

    }


    function CartCount(Request $request){

        $userEmail=$request->email;
        $result=CartModel::Where('email',$userEmail)->count();
        return $result;
    }

    function CartList(Request $request){
        $email = $request->email;
        $result = CartModel::where('email',$email)->get();
        return $result;

    }

    function RemoveCartList(Request $request){
        $id = $request->id;
        $result = CartModel::where('id',$id)->delete();
        return $result;
    }

    function CartItemPlus(Request $request){
        $id = $request->id;
        $quantity = $request->quantity;
        $price = $request->price;
        $newQuantity = $quantity+1;
        $total_price = $newQuantity*$price;
        $result = CartModel::where('id',$id)->update(['product_quantity' => $newQuantity, 'total_price' => $total_price]);
        return $result;


    }
    function CartItemMinus(Request $request){
        $id = $request->id;
        $quantity = $request->quantity;
        $price = $request->price;
        $newQuantity = $quantity-1;
        $total_price = $newQuantity*$price;
        $result = CartModel::where('id',$id)->update(['product_quantity' => $newQuantity, 'total_price' => $total_price]);
        return $result;


    }

     function OrderListByUser(Request $request){

       $email = $request->email;
       $result = DirectOrderModel::where('email',$email)->orderBy('id', 'DESC')->get();
       return $result;
    }

    function ProductOrderPage(){
        return view('Order.ProductOrder');
    }

    function ProductOrderData(){
        $result=DB::table('product_order')
            ->select('invoice_no','total_price','mobile','name','payment_method','delivery_address','city','delivery_charge','order_date','order_time','order_status','payment_number','trx')
            ->groupBy('invoice_no')
            ->orderBy('id','desc')
            ->get();
        return $result;
    }

    function ProductOrderDetailsData(Request $request){
        $invoice_no=$request->input('invoice_no');
        $result=ProductOrderModel::where('invoice_no','=',$invoice_no)->get();
        return $result;
    }

    function ProductOrderDelete(Request $request){
        $id=$request->input('id');
        $result=ProductOrderModel::where('invoice_no','=',$id)->delete();
        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function ProductOrderStatusEdit(Request $request){
        $statusID=$request->input('statusID');
        $OrderStatus=$request->input('status');

        $ProductOrderData= ProductOrderModel::where('invoice_no',$statusID)->get();
        $phone=$ProductOrderData[0]['mobile'];
        $six_digit_random_number = mt_rand(100000, 999999);

        //Api setup
        $settings=SettingsModel::all('ssl_wireless_sms_api_token', 'ssl_wireless_sms_sid', 'ssl_wireless_sms_domain');
        $API_TOKEN=$settings[0]['ssl_wireless_sms_api_token'];
        $SID=$settings[0]['ssl_wireless_sms_sid'];
        $DOMAIN=$settings[0]['ssl_wireless_sms_domain'];

        if ($OrderStatus=='Rejected'){
            //message text
            $msisdn = $phone;
            $messageBody = "Dear Customer, Your order has been Rejected.";
            $csmsId = $six_digit_random_number; // csms id must be unique for one day , max length 20

            $params = [
                "api_token" => $API_TOKEN,
                "sid" => $SID,
                "msisdn" => $msisdn,
                "sms" => $messageBody,
                "csms_id" => $csmsId
            ];
            $url = trim($DOMAIN, '/')."/api/v3/send-sms";
            $params = json_encode($params);

            //curl code
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params),
                'accept:application/json'
            ));

            $response = curl_exec($ch);

            curl_close($ch);

            $status=(json_decode($response,true))['status'];
            if($status=="SUCCESS"){
                $result=ProductOrderModel::where('invoice_no',$statusID)->update([
                    'order_status'=>$OrderStatus
                ]);
                return $result;
            }
            else{
                return  0;
            }


        }
        else if ($OrderStatus=='Accepted'){
            //message text
            $msisdn = $phone;
            $messageBody = "Dear Customer, Your order has been accepted.";
            $csmsId = $six_digit_random_number; // csms id must be unique for one day , max length 20

            $params = [
                "api_token" => $API_TOKEN,
                "sid" => $SID,
                "msisdn" => $msisdn,
                "sms" => $messageBody,
                "csms_id" => $csmsId
            ];
            $url = trim($DOMAIN, '/')."/api/v3/send-sms";
            $params = json_encode($params);

            //curl code
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params),
                'accept:application/json'
            ));

            $response = curl_exec($ch);

            curl_close($ch);

            $status=(json_decode($response,true))['status'];
            if($status=="SUCCESS"){
                $result=ProductOrderModel::where('invoice_no',$statusID)->update([
                    'order_status'=>$OrderStatus
                ]);
                return $result;
            }
            else{
                return  0;
            }
        }
        else if ($OrderStatus=='Delivered'){
            //message text
            $msisdn = $phone;
            $messageBody = "Dear Customer, Your product successfully delivered.";
            $csmsId = $six_digit_random_number; // csms id must be unique for one day , max length 20

            $params = [
                "api_token" => $API_TOKEN,
                "sid" => $SID,
                "msisdn" => $msisdn,
                "sms" => $messageBody,
                "csms_id" => $csmsId
            ];
            $url = trim($DOMAIN, '/')."/api/v3/send-sms";
            $params = json_encode($params);

            //curl code
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params),
                'accept:application/json'
            ));

            $response = curl_exec($ch);

            curl_close($ch);

            $status=(json_decode($response,true))['status'];
            if($status=="SUCCESS"){
                $result=ProductOrderModel::where('invoice_no',$statusID)->update([
                    'order_status'=>$OrderStatus
                ]);
                return $result;
            }
            else{
                return  0;
            }
        }
        else{
            $result=ProductOrderModel::where('invoice_no',$statusID)->update([
                'order_status'=>$OrderStatus
            ]);
            return $result;
        }



    }

    function ProductOrderInvoiceData(Request $request){
        $id=$request->input('id');
        $OrderData=ProductOrderModel::where('invoice_no','=',$id)->get();
        $sub_total=0;
        foreach ($OrderData as $OrderDatas){
            $total_price_taka=$OrderDatas['total_price'];
            $price_array=explode(" ",$total_price_taka);
            $total_price=$price_array[0];
            $sub_total +=$total_price;
        }
        $result=['order_data'=>$OrderData,'sub_total'=> $sub_total];
        return json_encode($result);
    }
}
