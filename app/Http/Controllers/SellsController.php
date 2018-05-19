<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Sell;
use Fahim\PaypalIPN\PaypalIPNListener;

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
      $coupons = Coupon::all();
      $codes = [];
      $index = 0;
      foreach($coupons as $coupon){
        $codes[$index++] = $coupon->couponcode;
      }
      return $codes;
    }

    public function paypalIpn()
    {
        $ipn = new PaypalIPNListener();
        $ipn->use_sandbox = true;

        $verified = $ipn->processIpn();

        $report = $ipn->getTextReport();

        Log::info("-----new payment-----");

        Log::info($report);

        if ($verified) {
            if ($_POST['address_status'] == 'confirmed') {
                // Check outh POST variable and insert your logic here
                Sell s = new Sell();
                $s->textReport = $report;
                $s->save();
                Log::info("payment verified and inserted to db");
            }
        } else {
            Log::info("Some thing went wrong in the payment !");
        }
    }

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
