<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function show($id)
    {
        $car = DB::table("cars")
        ->join("users", "cars.user_id", "=", "users.id")
        ->select("cars.*", "users.name", "users.email")
        ->where("cars.id", "=", $id)
        ->get()
        ->first();
        return $car;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carsValidation = $request->validate([
            "mark" => ["string"],
            "model" => ["string"],
            "price" => ["numeric"],
            "description" => ["string", "min:10"],
            "status" => ["numeric"],
            "user_id" => ["required", "numeric"],
            "vendor_id" => ["numeric"],
            "agency_id" => ["numeric"]
        ]);

        $car = Cars::find($id);
        if(!$car){
            return response(["message" => "Aucune voiture de trouvée avec cet id : $id"], 404);
        }
        if($car->user_id != $carsValidation["user_id"]) {
            return response(["message" => "Action non autorisée"], 403);
        }
        $car->update($carsValidation);
        return response(["message" => "La voiture a bien été mise à jour"], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $carsValidation = $request->validate([
            "user_id" => ["required", "numeric"],
        ]);

        $car = Cars::find($id);
        if(!$car){
            return response(["message" => "Aucune voiture de trouvée avec cet id : $id"], 404);
        }
        if($car->user_id != $carsValidation["user_id"]) {
            return response(["message" => "Action non autorisée"], 403);
        }

        Cars::destroy($id);

        return response(["message" => "La voiture a bien été supprimée"], 200);
    }
}
