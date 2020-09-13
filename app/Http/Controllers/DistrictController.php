<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;
use App\Country;
use App\State;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('admin.district.index',compact('countries','s_country','states','s_state','districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset($_GET['country'])){
            $s_country = Country::where('id',$_GET['country'])->first();
        }else{
            $s_country = Country::first();
        }
        $countries = Country::all();
        return view('admin.district.create',compact('countries','s_country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $district = new District();
        $district->state_id = $request->state;
        $district->name = $request->district;
        $district->save();

        return redirect('admin/district');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        if(isset($_GET['country'])){
            $s_country = Country::where('id',$_GET['country'])->first();
        }else{
            $s_country = Country::first();
        }
        $countries = Country::all();
        return view('admin.district.edit',compact('district','countries','s_country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $district->state_id = $request->state;
        $district->name = $request->district;
        $district->save();

        return redirect('admin/district');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $district->delete();

        return redirect('admin/district');
    }
}
