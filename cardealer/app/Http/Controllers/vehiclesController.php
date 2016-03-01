<?php

namespace App\Http\Controllers;
use App\Vehicles;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\vehicleImagesController;

class vehiclesController extends Controller
{
    public function vehicles() {
        $vehicles = Vehicles::all();
        return view('frontend.vehicles', ["vehicles" => $vehicles]);
    }
    public function deleteVehicles($id) {
        if(Vehicles::find($id)) {
            vehicleImagesController::deleteImages($id);
            Vehicles::find($id)->delete();
        }
        $vehicles = Vehicles::all();
        return view('frontend.vehicles', ["vehicles" => $vehicles]);
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

        $vehicles = Vehicles::all();
        return view('frontend.vehicles', ["vehicles" => $vehicles]);

    }
}
