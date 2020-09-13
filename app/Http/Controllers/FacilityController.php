<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use Auth;
use App\Building;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::where('user_id',Auth::User()->id)->get();
        return view('owner.facility.index',compact('buildings'));
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
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $facility->bed_type = $request->bed_type;
        $facility->cooling = $request->cooling;
        $facility->water_purifier = $request->water_purifier;
        $facility->electricity = $request->electricity;
        $facility->wifi = $request->wifi;
        $facility->cc_tv = $request->cc_tv;
        $facility->kitchen_with_gas = $request->kitchen_with_gas;
        $facility->food = $request->food;
        $facility->parking = $request->parking;
        $facility->security_guard = $request->security_guard;
        $facility->water_supply = $request->water_supply;
        $facility->bathroom = $request->bathroom;
        $facility->washing_machine = $request->washing_machine;
        $facility->teresh = $request->teresh;
        $facility->metress = $request->metress;
        $facility->chair_table = $request->chair_table;
        $facility->wordrobe = $request->wordrobe;
        $facility->gate_opening = $request->gate_opening;
        $facility->gate_closing = $request->gate_closing;
        $facility->furnished = $request->furnished;
        $facility->breakfast = $request->breakfast;
        $facility->lunch = $request->lunch;
        $facility->dinner = $request->dinner;
        $facility->food_type = $request->food_type;
        $facility->food_on_sunday = $request->sunday;

        $facility->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        //
    }
}
