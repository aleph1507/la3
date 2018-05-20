<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Sell;
// use Fahim\PaypalIPN\PaypalIPNListener;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

class SellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buy_the_book');
    }

    public function getCC() {
      // $this->paypalIpn();

      error_log("in getCC()");
      $coupons = Coupon::all();
      $codes = [];
      $index = 0;
      foreach($coupons as $coupon){
        $codes[$index++] = $coupon->couponcode;
      }
      return $codes;
    }

    public function paypalIpn(Request $request)
    {

      $s0 = new Sell();
      $s0->textReport = "vo paypalIPN()";
      $s0->save();
      // error_log("in paypalIpn()");
      // Log::info("in paypalIpn");
      // Import the namespace Srmklive\PayPal\Services\ExpressCheckout first in your controller.
      $provider = new ExpressCheckout;

      $s1 = new Sell();
      $s1->textReport = "posle provider = new ExpressCheckout";
      $s1->save();
      $request->merge(['cmd' => '_notify-validate']);
      $s2 = new Sell();
      $s2->textReport = "posle request->merge(['cmd' => '_notify-validate'])";
      $s2->save();
      $post = $request->all();
      $sReq = new Sell();
      if(empty($request)){
        $sReq->textReport = "request is empty";
      } else {
        // $request_dump = var_dump($request);
        $request_string = (string)$request;
        // $req_type = gettype($request);
        $sReq->textReport = "request_string: $request_string";
      }
      $sReq->save();

      $s3 = new Sell();
      $s3->textReport = "posle post = request->all()";
      $s3->save();

      $sPost = new Sell();
      if(empty($post)){
        $sPost->textReport = "post is empty";
      } else {
        // $post_dump = var_dump($post);
        // $post_type = gettype($post);
        // $post_string = implode(' ,  ', $post);
        // $sPost->textReport = "post_string: $post_string";
        $sPost->textReport = "post[custom] : " . $post['custom'];
      }
      $sPost->save();

      $response = (string) $provider->verifyIPN($post);

      $s5 = new Sell();
      $s5->textReport = "posle response = provider->verifyIPN(post)";
      $s5->save();

      $sRes = new Sell();
      if(empty($response)){
        $sRes->textReport = "response is empty";
      } else {
        // $response_dump = var_dump($response);
        // $res_type = gettype($response);
        $sRes->textReport = "response: $response";
      }
      $sRes->save();

      $ch = curl_init('https://ipnpb.paypal.com/cgi-bin/webscr');
      curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

      if ( ($response = curl_exec($ch)) ) {
        // error_log("Got " . curl_error($ch) . " when processing IPN data");
        curl_close($ch);
        exit;
      }

      // error_log("payment before verified and inserted to db");
      // Log::info("payment before verified and inserted to db");

      if ($response == 'VERIFIED') {
          // Your code goes here ...

          $s = new Sell();
          $s->textReport = "vo VERIFIED";
          $s->save();

          $s = new Sell();
          $s->coupon = $this->post['coupon'];
          $request_string = (string)$this->request;
          $s->textReport = "request_string: " . $request_string;
          $s->save();

          $s = new Sell();
          $s->textReport = "vo VERIFIED";
          $s->save();
          //
          // $s = new Sell();
          // $s->textReport = $report;
          // $s->save();
          // error_log("payment verified and inserted to db");
          // Log::info("payment verified and inserted to db");
      }

    }

    // public function paypalIpn()
    // {

      // $provider = new ExpressCheckout;      // To use express checkout.


      // $provider = new AdaptivePayments;

        // $ipn = new PaypalIPNListener();
        // $ipn->use_sandbox = true;
        //
        // $verified = $ipn->processIpn();
        //
        // $report = $ipn->getTextReport();
        //
        // Log::info("-----new payment-----");
        //
        // Log::info($report);
        //
        // if ($verified) {
        //     if ($_POST['address_status'] == 'confirmed') {
        //         // Check outh POST variable and insert your logic here
        //         $s = new Sell();
        //         $s->textReport = $report;
        //         $s->save();
        //         Log::info("payment verified and inserted to db");
        //     }
        // } else {
        //     Log::info("Some thing went wrong in the payment !");
        // }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
