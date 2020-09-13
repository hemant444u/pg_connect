<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Building;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Facility;
use App\Country;
use App\Address;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::where('user_id',Auth::user()->id)->get();
        return view('owner.building.index',compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.building.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name = '';
        if($request->hasFile('banner'))
        {
            $image = $request->file('banner');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/images/building/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_name = '/images/building/' .$fileName;
        }
        $building = new Building();
        $building->user_id = Auth::User()->id;
        $building->name = $request->name;
        $building->type = $request->type;
        $building->for = $request->for;
        $building->banner = $file_name;
        $building->status = 'pending';

        $building->save();

        $facility = New Facility();
        $facility->building_id = $building->id;
        $facility->save();

        $address = New Address();
        $address->building_id = $building->id;
        $address->save();
        return redirect('owner/building');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $building = Building::where('id',$id)->first();
        return view('owner.building.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $districts = [];
        if(isset($_GET['country'])){
            $country = Country::where('id',$_GET['country'])->first();
        }else{
            $country = Country::first();
        }
        $s_country = $country;
        $states = $country->states;

        if(isset($_GET['state'])){
            $state = State::where('id',$_GET['state'])->first();
        }else{
            $state = $country->states->first();
        }
        if($state){
            $districts = $state->districts;
        }

        $s_state = $state;
        $countries = Country::all();
        $building = Building::where('id',$id)->first();
        return view('owner.building.edit',compact('building','countries','states','districts','s_country','s_state'));
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
        $building = Building::where('id',$id)->first();

        if($request->hasFile('banner'))
        {
            $image = $request->file('banner');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/images/building/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_name = '/images/building/' .$fileName;

            $building->banner = $file_name;
        }
        $building->name = $request->name;
        $building->type = $request->type;

        $building->save();
        return redirect('owner/building');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building = Building::where('id',$id)->first();
        $building->delete();
        return redirect()->back();
    }
}
