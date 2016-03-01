<?php

namespace App\Http\Controllers;
use App\Dealers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class dealersController extends Controller
{
    public function dealers() {
        $dealers = Dealers::all();
        return view('frontend.dealers', ["dealers" => $dealers]);
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
        $dealer->save();

        $dealers = Dealers::all();
        return view('frontend.dealers', ["dealers" => $dealers]);
    }

}
