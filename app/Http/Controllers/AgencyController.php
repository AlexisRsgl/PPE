<?php

namespace App\Http\Controllers;

use App\Models\Agencies;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agencies::all();
        if(count($agencies) <= 0){
            return response(["message" => "Aucune agence de disponible"], 200);
        }
        return response($agencies, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agenciesValidation = $request->validate([
            "name" => ["required", "string"],
            "location" => ["required", "string"]
        ]);

        $agencies = Agencies::create([
            "name" => $agenciesValidation["name"],
            "location" => $agenciesValidation["location"]
        ]);

        return response(["message" => "Agence ajoutée"], 201);
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
