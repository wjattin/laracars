<?php

namespace App\Http\Controllers;

use App\vehicleImages;
use App\vehicles;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class vehicleImagesController extends Controller
{


    public function vehicleImages($vehicles_id)
    {
        $vehicleImages = DB::table('vehicleImages')->where('vehicles_id', '=', $vehicles_id)->get();

        $vehicle = DB::table('vehicles')->where('id', '=', $vehicles_id)->get();

        return view('frontend.vehicleImages', ["vehicleImages" => $vehicleImages, "vehicle" => $vehicle]);
    }

    public static function deleteImages($vehicles_id)
    {
        $vehicleImages = DB::table('vehicleImages')->where('vehicles_id', '=', $vehicles_id)->get();
        foreach ($vehicleImages as $img) {
            vehicleImages::find($img->id)->delete();
            echo unlink(public_path() . $img->file_name);
            //var_dump($img);
        }

        return view('frontend.vehicles');
    }
    public static function deleteImage($id)
    {
        if(vehicleImages::find($id)) {
            $img = vehicleImages::find($id);
            echo unlink(public_path() . $img->file_name);
            $img->delete();
            //var_dump($img);
        }
    }
    public function new_image(Request $request)
    {

        foreach ($request->files as $files) {
            foreach ($files as $file) {
                if ($file) {
                    $string = str_random(10) . '_' . $request->vehicles_id . '_';
                    $file->move(public_path('images'), $string . $file->getClientOriginalName());
                    $image = new vehicleImages;
                    $image->file_name = '/images/' . $string . $file->getClientOriginalName();
                    $image->vehicles_id = $request->vehicles_id;
                    $image->save();
                }
            }


        }
        //return vehicleImagesController::vehicleImages($request->vehicles_id);
        return redirect()->intended('/vehicleImages/'.$request->vehicles_id);

    }
}