<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Profiles;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class profilesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function profiles(Request $request) {
        $profiles = Profiles::all();
        if(isset($request->user()->profile_id)) {
        $profile = Profiles::find($request->user()->profile_id); }
        $profile_id = (isset($profile->id) ? $profile->id : "");
        $dealer = DB::table('dealers')->where('login_id', '=', $request->user()->id)->get();

        $dealer_id = (isset($dealer[0]->id) ? $dealer[0]->id : "");
        return view('frontend.profiles', ["profiles" => $profiles, "profile_id" => $profile_id, "dealer_id" => $dealer_id  ] );
    }
    public function getProfile($id) {
        //$profiles = DB::table('profiles')->where('id', '=', $id)->get();
        $profiles = Profiles::find($id);
        $user = $profiles->user;
        //var_dump($login);
        return view('frontend.profileDetail', ["profiles" => $profiles, "user" => $user]);
    }
    public function new_profile(Request $request) {
        $profile = new Profiles;
        $profile->first = $request->first;
        $profile->last = $request->last;
        $profile->dealers_id = $request->dealers_id;
        $profile->phone1 = $request->phone1;
        $profile->phone2 = $request->phone2;
        $profile->email = $request->email;
        $profile->login_id = $request->user()->id;
        $profile->save();

        $update = User::find($request->user()->id);
        $update->profile_id = $profile->id;
        $update->save();

        $profiles = Profiles::all();
        if(isset($request->user()->profile_id)) {
            $profile = Profiles::find($request->user()->profile_id); }
        $profile_id = (isset($profile->id) ? $profile->id : "");
        $dealer_id = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        return view('frontend.profiles', ["profiles" => $profiles, "profile_id" => $profile_id, "dealer_id" => $dealer_id]);
    }
}
