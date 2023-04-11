<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSTestController extends Controller
{


    function smsTest()
    {
        //Api setup
        $API_TOKEN = "Kistimath-b3d20709-0a2f-4824-a7ec-60266cfdfbdd";
        $SID = "KISTIMATHNONAPI";
        $DOMAIN = "https://smsplus.sslwireless.com";

        //message text
        $msisdn = "01744827686";
        $messageBody = "Hello bro";
        $csmsId = "1234864578fgd"; // csms id must be unique for one day , max length 20

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

        return $response;
    }
}
