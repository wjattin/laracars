<?php

namespace App\Http\Controllers;
use App\Vehicles;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\vehicleImagesController;
use App\User;
use App\Profiles;
use DB;

class vehiclesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function vehicles(Request $request) {
        $sortby = (isset($request->sortby) ? $request->sortby : 'id');
        $vehicles = Vehicles::orderBy($sortby, 'DESC')->paginate(3);
        $profile = Profiles::find($request->user()->profile_id);
        $dealer = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        return view('frontend.vehicles', ["vehicles" => $vehicles, "dealer"=> $dealer]);
    }
    public function myvehicles(Request $request) {
        $profile = Profiles::find($request->user()->profile_id);
        $dealer = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        //$vehicles = Vehicles::where('dealers_id', '=',$dealer );
        $vehicles = DB::table('vehicles')->where('dealers_id', $dealer)->get();
        // $dealer = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        $dealers = DB::table('dealers')->where('login_id', '=', $request->user()->id)->get();
        $dealer = (isset($dealers[0]->id) ? $dealers[0]->id : "");
        return view('frontend.myvehicles', ["vehicles" => $vehicles, "dealer"=> $dealer, "request"=> $request]);
    }
    public function vehiclesAPI() {
        $vehicles = Vehicles::all();
        return response()->json($vehicles);
    }
    public function deleteVehicles($id, Request $request) {
        $profile = Profiles::find($request->user()->profile_id);
        $dealer = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        if(Vehicles::find($id)) {
            vehicleImagesController::deleteImages($id);
            Vehicles::find($id)->delete();
        }
        $vehicles = Vehicles::all();
        return view('frontend.myvehicles', ["vehicles" => $vehicles, "dealer" => $dealer, "request" => $request]);
    }
    public function new_vehicle(Request $request) {
        $vehicle = new Vehicles;
        $vehicle->make = $request->make;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->transmission = $request->transmission;
        $vehicle->veh_condition = $request->veh_condition;
        $vehicle->comments = $request->comments;
        $vehicle->price = $request->price;
        $vehicle->dealers_id = $request->dealers_id;
        $vehicle->vin = $request->vin;
        $vehicle->save();

        //$vehicles = Vehicles::all();
        //$profile = Profiles::find($request->user()->profile_id);
        //$dealer = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        $profile = Profiles::find($request->user()->profile_id);
        $dealer = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        //$vehicles = Vehicles::where('dealers_id', '=',$dealer );
        $vehicles = DB::table('vehicles')->where('dealers_id', $dealer)->get();
        $dealer = (isset($profile->dealers_id) ? $profile->dealers_id : "");

        return view('frontend.myvehicles', ["vehicles" => $vehicles, "dealer" => $dealer, "request" => $request]);
    }
    public function update_vehicle(Request $request) {
        $vehicle = Vehicles::find($request->id);
        $vehicle->make = $request->make;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->transmission = $request->transmission;
        $vehicle->veh_condition = $request->veh_condition;
        $vehicle->comments = $request->comments;
        $vehicle->price = $request->price;
        $vehicle->dealers_id = $request->dealers_id;
        $vehicle->vin = $request->vin;
        $vehicle->save();

        $vehicles = Vehicles::all();
        $profile = Profiles::find($request->user()->profile_id);
        $dealer = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        //return view('frontend.vehicles', ["vehicles" => $vehicles, "dealer" => $dealer]);
        return redirect()->intended('/vehicleImages/'.$request->id);

    }
    public function decodeVin($vin){
        $url = 'https://api.edmunds.com/api/vehicle/v2/vins/'.$vin.'?fmt=json&api_key=zsjym3t8xbvxbdv4e85fbqqg';
        //$json = json_decode(file_get_contents($url));
        $json = file_get_contents($url);
        return view('frontend.decodeVin', ["json" => $json]);
    }
    public function search(Request $request) {

        $year = $request->year;
        $make = $request->make;
        $model = $request->model;
        $query = Vehicles::where('year', '=', "{$year}");

      /*  if($year != ""){
            $query = Vehicles::where('year', 'LIKE', "%{$year}%");
        } */
        if($make != "") {
            $query = $query->where('make', '=', "{$make}");
        }
        if($model != "") {
            $query = $query->where('model', '=', "{$model}");
        }
        /*foreach($searchTerms as $term)
        {
            $query = $query->orWhere('name', 'LIKE', '%'. $term .'%');
        }*/
        $profile = Profiles::find($request->user()->profile_id);
        $dealer = (isset($profile->dealers_id) ? $profile->dealers_id : "");
        $vehicles = $query->paginate(3);
        return view('frontend.vehicles', ["vehicles" => $vehicles, "dealer" => $dealer, "request" => $request]);
    }
    public function getMakes(){
        $makes = Vehicles::distinct()->select('make')->groupBy('make')->orderBy('make', 'ASC')->get();
        return response()->json($makes);

    }
    public function getModels($make){
        $models = Vehicles::distinct()->select('model')->where('make','LIKE',$make)->orderBy('model', 'ASC')->get();
        return response()->json($models);

    }
    public function getYears(){
        $years = Vehicles::distinct()->select('year')->orderBy('year', 'DESC')->get();
        return response()->json($years);

    }
}
