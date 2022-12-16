<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::all();
        if(count($cars) <= 0){
            return response(["message" => "Aucune voiture de disponible"], 200);
        }
        return response($cars, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carsValidation = $request->validate([
            "mark" => ["required", "string"],
            "model" => ["required", "string"],
            "price" => ["required", "numeric"],
            "description" => ["required", "string", "min:10"],
            "status" => ["required", "numeric"],
            "user_id" => ["required", "numeric"],
            "vendor_id" => ["required", "numeric"],
            "agency_id" => ["required", "numeric"]
        ]);

        $cars = Cars::create([
            "mark" => $carsValidation["mark"],
            "model" => $carsValidation["model"],
            "price" => $carsValidation["price"],
            "description" => $carsValidation["description"],
            "status" => $carsValidation["status"],
            "user_id" => $carsValidation["user_id"],
            "vendor_id" => $carsValidation["vendor_id"],
            "agency_id" => $carsValidation["agency_id"]
        ]);

        return response(["message" => "Voiture ajoutée"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(Cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cars $cars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars $cars)
    {
        //
    }
}
