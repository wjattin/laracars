<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Profiles;
use App\Login;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class profilesController extends Controller
{
    public function profiles() {
        $profiles = Profiles::all();
        return view('frontend.profiles', ["profiles" => $profiles]);
    }
    public function getProfile($id) {
        $profiles = DB::table('profiles')->where('id', '=', $id)->get();
        $logins = '';
        return view('frontend.profileDetail', ["profiles" => $profiles, "logins" => $logins]);
    }
    public function new_profile(Request $request) {
        $profile = new Profiles;
        $profile->first = $request->first;
        $profile->last = $request->last;
        $profile->dealers_id = $request->dealers_id;
        $profile->phone1 = $request->phone1;
        $profile->phone2 = $request->phone2;
        $profile->email = $request->email;
        $profile->save();

        $profiles = Profiles::all();
        return view('frontend.profiles', ["profiles" => $profiles]);
    }
}
