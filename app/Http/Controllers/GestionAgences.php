<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GestionAgences extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $response = Http::get('http://localhost/PPE/public/index.php/api/agencies');
        //var_dump($response->status());
        $agences = json_decode($response->body());
        $role = Storage::get('role');
        $userQuery = Http::get('http://localhost/PPE/public/index.php/api/utilisateurs');
        $user = json_decode($userQuery->body());
        return view("gestionAgence", ['tableauDeAgences' => $agences, 'role' => $role, 'tableauDeUsers' => $user]);
    }

    public function delete(Request $request)
    {
        $agenceId = $request->agence;
        $query = Http::delete('http://localhost/PPE/public/index.php/api/agencies',array("agency_id" => $agenceId));
        return redirect('./gestion/agences');
    }



    public function createAgence(Request $request)
    {
        $name = $request->agence;
        $location = $request->location;
        $getAgence = Http::post('http://localhost/PPE/public/index.php/api/agencies', array("name" => "$name", "location" => $location));
          var_dump($getAgence->status());
        if($getAgence->status() == 200 || $getAgence->status() == 201){
              return redirect('./gestion/agences');
        }else{
            return redirect('./gestion/agences');
        }

    }

    public function modifierAgence(Request $request){
        $nameAgence = $request->agence;
        $localisationAgence = $request->localisation;
        $idAgence = $request->agenceIdModify;
        $getAgence = Http::put('http://localhost/PPE/public/index.php/api/agencies', array("id" => "$idAgence", "location" => $localisationAgence, "name" => "$nameAgence"));
        return redirect('./gestion/agences');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
