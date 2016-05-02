<?php

namespace App\Http\Controllers;
use App\Dealers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Profiles;

class dealersController extends Controller
{
    public function __construct() {
    $this->middleware('auth');
    }
    public function dealers(Request $request) {
        $dealers = Dealers::all();
        $profile = Profiles::find($request->user()->profile_id);
        $dealer = DB::table('dealers')->where('login_id', '=', $request->user()->id)->get();
        $user_id = $request->user()->id;
        $user = (isset($dealer[0]->id) ? $dealer[0]->id : "");
        return view('frontend.dealers', ["dealers" => $dealers, "user" => $user, "user_id" => $user_id ]);
    }
    public function getDealer($id) {
        $dealers = DB::table('dealers')->where('id', '=', $id)->get();
        return view('frontend.dealerDetail', ["dealers" => $dealers]);
    }
    public function new_dealer(Request $request) {
        $dealer = new Dealers;
        $dealer->location_name = $request->location_name;
        $dealer->address1 = $request->address1;
        $dealer->address2 = $request->address2;
        $dealer->city = $request->city;
        $dealer->state = $request->state;
        $dealer->zip = $request->zip;
        $dealer->phone1 = $request->phone1;
        $dealer->phone2 = $request->phone2;
        $dealer->email = $request->email;
        $dealer->login_id = $request->login_id;
        $dealer->save();

        $dealers = Dealers::all();
        $profile = Profiles::find($request->user()->profile_id);
        $user_id = $request->user()->id;
        $user = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        return view('frontend.dealers', ["dealers" => $dealers, "user" => $user, "user_id" => $user_id ]);
    }

}
