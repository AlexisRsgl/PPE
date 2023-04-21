<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;



class GestionFournisseurs
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

         $response = Http::get('http://localhost/PPE/public/index.php/api/vendors');
         $fournisseurs = json_decode($response->body());
        $role = Storage::get('role');
        return view("gestionFournisseurs", ['role' => $role, 'tableauDeFournisseurs' => $fournisseurs]);
    }

    public function createFournisseur(Request $request){

        $fournisseur = $request->fournisseur;

        $response = Http::post('http://localhost/PPE/public/index.php/api/vendors',array("name" => "$fournisseur"));
        if($response->status() == 200 || $response->status() == 201){
            return redirect('./gestion/fournisseurs');
        }else{
            return redirect('./gestion/fournisseurs');
        }

    }

    public function modifierVehiculeFournisseur(Request $request){
        $marque = $request->marque;
        $model = $request->model;
        $immatriculation = $request->immatriculation;
        $fournisseur = $request->fournisseur;
        $vehiculeId = $request->vehiculeId;
        $carId = $request->vehiculeIdToAffect;
        $getVehicule = Http::put('http://localhost/PPE/public/index.php/api/cars', array(
            "car_id" => "$carId",
            "marque" => "$marque",
            "model" => "$model",
            "immatriculation" => "$immatriculation",
            "vendor_id" => "$fournisseur"));
        var_dump($getVehicule->status());
        var_dump($getVehicule->body());
        return redirect('./gestion/fournisseurs/vehicule');
    }

    public function suppressionFournisseur(Request $request){
        $idFournisseur = $request->fournisseur;
        var_dump($idFournisseur);
        $response = Http::delete('http://localhost/PPE/public/index.php/api/vendors',array("vendor_id" => "$idFournisseur"));
        if($response->status() == 200 || $response->status() == 201){
            return redirect('./gestion/fournisseurs');
        }else{
            return redirect('./gestion/fournisseurs');
        }
    }


    public function suppressionVehiculeFournisseur(Request $request){
        $idVehicule = $request->car;
        var_dump($idVehicule);
        $response = Http::delete('http://localhost/PPE/public/index.php/api/cars',array("car_id" => "$idVehicule"));
        if($response->status() == 200 || $response->status() == 201){

            return redirect('./gestion/fournisseurs/vehicule');
        }else{
            return redirect('./gestion/fournisseurs/vehicule');
        }
    }


    public function modifierFournisseur(Request $request){
        $nameFournisseur = $request->fournisseur;
        $idFournisseur = $request->fournisseurIdModify;
        $getFournisseur = Http::put('http://localhost/PPE/public/index.php/api/vendors', array("id" => "$idFournisseur", "name" => "$nameFournisseur"));
        return redirect('./gestion/fournisseurs');
    }


    public function vehiculeFournisseur(){

        $response = Http::get('http://localhost/PPE/public/index.php/api/vendors');
        $fournisseurs = json_decode($response->body());
        $role = Storage::get('role');

        $agencesQuery = Http::get('http://localhost/PPE/public/index.php/api/agencies');
        $agences = json_decode($agencesQuery->body());
        $carsQuery = Http::get('http://localhost/PPE/public/index.php/api/cars');
        $cars = json_decode($carsQuery->body());


        return view("gestionFournisseurVehicule", ['tableauDeVoiture' => $cars,'role' => $role, 'tableauDeFournisseur' => $fournisseurs, 'tableauAgences' => $agences]);
    }

}
