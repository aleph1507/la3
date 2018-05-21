<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Coupon;
use App\Sell;
use App\User;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $couponcode = Coupon::where('user_id', $user->id)->first()->couponcode;
        $sell_count = Sell::where('coupon','=',$couponcode)->count();
        return view('profile.index')->with(compact('user', 'couponcode', 'sell_count'));
    }

    public function admin() {
      $user = Auth::user();
      $users = User::all();
      $sells = Sell::all();
      $sells_total = Sell::count();
      return view('profile.admin')->with(compact('user', 'users', 'sells', 'sells_total'));
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
