<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Building;
use App\Room;
use App\Country;
use App\State;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hot_trends = Room::limit(3)->get();
        $best_sellers = Room::limit(3)->get();
        $feature = Room::limit(3)->get();
        $best = Building::first();
        $buildings = Building::limit(4)->latest()->get();
        $rooms = Room::all();
        return view('welcome',compact('buildings','best','rooms','hot_trends','best_sellers','feature'));
    }

    public function room($id)
    {
        $buildings = Building::all();
        $room = Room::where('id',$id)->first();
        return view('room-details',compact('room','buildings'));
    }

    public function pgByType($for)
    {
        if(isset($_GET['state'])){
            $state = State::where('id',$_GET['state'])->first();
            $buildings = $state->buildings->where('for',$for);
        }else{
            $buildings = Building::where('for',$for)->get();
        }
        $countries = Country::all();
        return view('building',compact('buildings','countries'));
    }
    public function pgDetails($id)
    {
        $buildings = Building::all();
        $building = Building::where('id',$id)->first();
        $room = $building->rooms->first();
        return view('building-details',compact('building','room','buildings'));
    }

    public function map()
    {
        $buildings = Building::all();
        return view('map',compact('buildings'));
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('id',Auth::User()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->save();
        return redirect()->back();
    }


}
