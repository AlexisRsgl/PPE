<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GestionVehicule extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $vendorQuery = Http::get('http://localhost/PPE/public/index.php/api/vendors');
        $vendors = json_decode($vendorQuery->body());
      //  var_dump($vendors);
        $agenciesQuery = Http::get('http://localhost/PPE/public/index.php/api/agencies');
        $agencies = json_decode($agenciesQuery->body());
      //  var_dump($agencies);
        $carsQuery = Http::get('http://localhost/PPE/public/index.php/api/cars');
        $cars = json_decode($carsQuery->body());
      //  var_dump($cars);
       // var_dump($response->status());

        $role = Storage::get('role');

              return view("gestionVehicule", ['tableauDeVoiture' => $cars, 'role' => $role, 'tableauDeFournisseur' => $vendors, 'tableauAgences' => $agencies]);

    }

    public function modifierVehicule(Request $request){
        $marque = $request->marque;
        $model = $request->model;
        $immatriculation = $request->immatriculation;
        $fournisseur = $request->fournisseur;
        $agence = $request->agence;
        $response = Http::post('http://localhost/PPE/public/index.php/api/cars',array("mark" => "$marque", "model" => "$model",
            "immatriculation" => "$immatriculation", "vendor_id" => $fournisseur, "agency_id" => $agence));
        //    var_dump($response->status());
        if($response->status() == 200 || $response->status() == 201){
            return redirect('./gestion/fournisseurs/vehicule');
        }else{
            return redirect('./gestion/fournisseurs/vehicule');
        }

    }

    public function creerVehiculeFournisseur(Request $request){
        $marque = $request->marque;
        $model = $request->model;
        $immatriculation = $request->immatriculation;
        $fournisseur = $request->fournisseur;
        $agence = $request->agence;
        $response = Http::post('http://localhost/PPE/public/index.php/api/cars',array("mark" => "$marque", "model" => "$model",
            "immatriculation" => "$immatriculation", "vendor_id" => $fournisseur, "agency_id" => $agence));
    //    var_dump($response->status());
        if($response->status() == 200 || $response->status() == 201){
                    return redirect('./gestion/fournisseurs/vehicule');
        }else{
                  return redirect('./gestion/fournisseurs/vehicule');
        }


    }

    public function creerVehicule(Request $request)
    {
        $marque = $request->marque;
        $model = $request->model;
        $immatriculation = $request->immatriculation;
        $agence = $request->agence;
        $response = Http::post('http://localhost/PPE/public/index.php/api/cars',array("mark" => "$marque", "model" => "$model",
            "immatriculation" => "$immatriculation", "vendor_id" => null, "agency_id" => $agence));
        var_dump($response->body());
        if($response->status() == 200 || $response->status() == 201){
            return redirect('./gestion/vehicule');
        }else{
            return redirect('./gestion/vehicule');
        }

    }

    public function disponible(Request $request){

        $car_id = $request->car;
        $query = Http::put('http://localhost/PPE/public/index.php/api/cars/disponible',array("car_id" => $car_id));
        return redirect('./gestion/vehicule');
    }

    public function indisponible(Request $request){

        $car_id = $request->car;
        $query = Http::put('http://localhost/PPE/public/index.php/api/cars/indisponible',array("car_id" => $car_id));
        return redirect('./gestion/vehicule');
    }

    public function suppressionVehicule(Request $request){
        $idVehicule = $request->car;
        var_dump($idVehicule);
        $response = Http::delete('http://localhost/PPE/public/index.php/api/cars',array("car_id" => "$idVehicule"));
        if($response->status() == 200 || $response->status() == 201){

            return redirect('./gestion/vehicule');
        }else{
            return redirect('./gestion/vehicule');
        }
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
