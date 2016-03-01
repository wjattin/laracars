<?php

namespace App\Http\Controllers;
use App\Login;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
    public function new_login(Request $request) {
        $login = new Login;
        $login->username = $request->username;
        $login->password = $request->password;
        $login->profile_id = $request->profile_id;

        $login->save();

        return view('frontend.profiles');
    }}
