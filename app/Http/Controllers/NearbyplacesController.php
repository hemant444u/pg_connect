<?php

namespace App\Http\Controllers;

use App\Nearbyplaces;
use Illuminate\Http\Request;
use App\Building;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class NearbyplacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::where('user_id',Auth::User()->id)->get();
        return view('owner.nearbyplaces.index',compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::where('user_id',Auth::User()->id)->get();
        return view('owner.nearbyplaces.create',compact('buildings'));
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
        $file_video = '';
        if($request->hasFile('photo'))
        {
            $image = $request->file('photo');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/images/nearbyplaces/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_name = '/images/nearbyplaces/' .$fileName;
        }
        if($request->hasFile('video'))
        {
            $image = $request->file('video');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/videoes/nearbyplaces/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_video = '/videoes/nearbyplaces/' .$fileName;
        }
        $nearbyplaces = new Nearbyplaces();
        $nearbyplaces->building_id = $request->building;
        $nearbyplaces->place = $request->place;
        $nearbyplaces->name = $request->name;
        $nearbyplaces->photo = $file_name;
        $nearbyplaces->video = $file_video;
        $nearbyplaces->distance = $request->distance;

        $nearbyplaces->save();
        return redirect('owner/nearbyplaces');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nearbyplaces  $nearbyplaces
     * @return \Illuminate\Http\Response
     */
    public function show(Nearbyplaces $nearbyplaces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nearbyplaces  $nearbyplaces
     * @return \Illuminate\Http\Response
     */
    public function edit(Nearbyplaces $nearbyplaces,$id)
    {
        $nearbyplaces = Nearbyplaces::where('id',$id)->first();
        $buildings = Building::all();
        return view('owner.nearbyplaces.edit',compact('buildings','nearbyplaces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nearbyplaces  $nearbyplaces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nearbyplaces $nearbyplaces,$id)
    {
        $nearbyplaces = Nearbyplaces::where('id',$id)->first();
        if($request->hasFile('photo'))
        {
            $image = $request->file('photo');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/images/nearbyplaces/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_name = '/images/nearbyplaces/' .$fileName;
            $nearbyplaces->photo = $file_name;
        }
        if($request->hasFile('video'))
        {
            $image = $request->file('video');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/videoes/nearbyplaces/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_video = '/videoes/nearbyplaces/' .$fileName;
            $nearbyplaces->video = $file_video;
        }
        $nearbyplaces->building_id = $request->building;
        $nearbyplaces->place = $request->place;
        $nearbyplaces->name = $request->name;
        $nearbyplaces->distance = $request->distance;

        $nearbyplaces->save();
        return redirect('owner/nearbyplaces');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nearbyplaces  $nearbyplaces
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nearbyplaces $nearbyplaces, $id)
    {
        $nearbyplaces = Nearbyplaces::where('id',$id)->first();
        $nearbyplaces->delete();
        return redirect()->back();
    }
}
