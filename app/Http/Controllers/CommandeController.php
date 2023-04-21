<?php

namespace App\Http\Controllers;

use Faker\Core\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CommandeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $role = Storage::get('role');
        $response = Http::get('http://localhost/PPE/public/index.php/api/vendors');
        $fournisseurs = json_decode($response->body());
        $vehiculeQuery = Http::get('http://localhost/PPE/public/index.php/api/cars');
        $vehicule = json_decode($vehiculeQuery->body());
        $commandQuery = Http::get('http://localhost/PPE/public/index.php/api/commandes');
        $command = json_decode($commandQuery->body());
        $agencesQuery = Http::get('http://localhost/PPE/public/index.php/api/agencies');
        $agences = json_decode($agencesQuery->body());

        return view("commande",array('role' => $role,'tableauAgences' =>  $agences,'tableauDeFournisseurs' => $fournisseurs, 'tableauDeVehicule' => $vehicule, 'tableauDeCommandes' => $command));
    }
    public function creerUneCommande(Request $request){
        $idVehicule = $request->vehicule;
     //   var_dump($idVehicule);

        $commandQuery = Http::post('http://localhost/PPE/public/index.php/api/commandes',array("car_id" => "$idVehicule"));
        return redirect('./gestion/commande');

    }

    public function addFournisseur(Request $request){
       $fournisseur = $request->fournisseur;
        $role = Storage::get('role');
        $response = Http::get('http://localhost/PPE/public/index.php/api/vendors');
        $fournisseurs = json_decode($response->body());



        return view("commande",array('role' => $role, 'tableauDeFournisseurs' => $fournisseurs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function connect()
    {

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
