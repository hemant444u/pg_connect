<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Building;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Auth;
use App\GalleryRoom;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::where('user_id',Auth::User()->id)->get();
        return view('owner.room.index',compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::where('user_id',Auth::User()->id)->get();
        return view('owner.room.create',compact('buildings'));
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
        $file_name_video = '';
        if($request->hasFile('banner'))
        {
            $image = $request->file('banner');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/images/room/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_name = '/images/room/' .$fileName;
        }
        if($request->hasFile('video'))
        {
            $image = $request->file('video');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/videoes/room/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_name_video = '/videoes/room/' .$fileName;
        }
        $room = new Room();
        $room->building_id = $request->building;
        $room->room_no = $request->room_no;
        $room->bed = $request->bed;
        $room->renter = $request->renter;
        $room->max_rent = $request->max_rent;
        $room->photo = $file_name;
        $room->video = $file_name_video;
        $room->available = $request->available;

        $room->save();
        return redirect('owner/room');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $buildings = Building::where('user_id',Auth::User()->id)->get();
        return view('owner.room.edit',compact('room','buildings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        if($request->hasFile('banner'))
        {
            $image = $request->file('banner');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/images/room/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_name = '/images/room/' .$fileName;
            $room->photo = $file_name;
        }
        if($request->hasFile('video'))
        {
            $image = $request->file('video');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/videoes/room/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_name = '/videoes/room/' .$fileName;
            $room->video = $file_name;
        }
        $room->building_id = $request->building;
        $room->room_no = $request->room_no;
        $room->bed = $request->bed;
        $room->renter = $request->renter;
        $room->max_rent = $request->max_rent;
        $room->available = $request->available;

        $room->save();
        return redirect('owner/room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->back();
    }

    public function gallery(Request $request)
    {
        if($request->hasFile('photo'))
        {
            $image = $request->file('photo');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            $fileName = Str::random(12) . '.' .$extension;
            $location = public_path().'/images/room/' .$fileName;

            //Storage::disk('local')->put('/complains/' .$fileName, File::get($image));
            file_put_contents($location, File::get($image));
            $file_type = $exploded[0];
            $file_name = '/images/room/' .$fileName;
        }

        $gallery = new GalleryRoom();
        $gallery->room_id = $request->room_id;
        $gallery->image = $file_name;
        $gallery->video = '';
        $gallery->save();
        return redirect()->back();
    }
}
