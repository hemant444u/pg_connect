<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\District;
use App\Building;
use Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::where('user_id',Auth::User()->id)->get();
        $districts = [];
        if(isset($_GET['country'])){
            $country = Country::where('id',$_GET['country'])->first();
        }else{
            $country = Country::first();
        }
        $s_country = $country;
        $states = $country->states;
        $countries = Country::all();

        if(isset($_GET['state'])){
            $state = State::where('id',$_GET['state'])->first();
        }else{
            $state = $country->states->first();
        }
        if($state){
            $districts = $state->districts;
        }

        $s_state = $state;

        return view('owner.address.index',compact('buildings','countries','states','districts','s_country','s_state'));
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
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $address->country = $request->country;
        $address->state = $request->state;
        $address->district = $request->district;
        $address->city = $request->city;
        $address->area = $request->area;
        $address->lat = $request->lat;
        $address->lng = $request->lng;

        $address->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
