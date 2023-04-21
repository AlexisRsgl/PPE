<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class   GestionAgence extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $role = Storage::get('role');
        $userId = Storage::get('userId');
     //   var_dump($userId);
        $query = Http::get('http://localhost/PPE/public/index.php/api/agencies/only', array("user_id" => "$userId"));
        $listeAgencies = json_decode($query->body());
       // var_dump($query->status());
      //  var_dump($listeAgencies[0]->id);
        $queryVoiture = Http::get('http://localhost/PPE/public/index.php/api/cars-only', array("agency_id" => $listeAgencies[0]->id));
        //var_dump($queryVoiture->status());
        $tableauDeVoiture = json_decode($queryVoiture->body());
        $queryFournisseur = Http::get('http://localhost/PPE/public/index.php/api/vendors');
        //var_dump($queryFournisseur->body());
        $tableauDeFournisseur = json_decode($queryFournisseur->body());;
        return view("gestionAgenceOnly",array('role' => $role, 'listeAgencies' => $listeAgencies,'tableauDeFournisseur' => $tableauDeFournisseur, 'tableauDeVoiture' => $tableauDeVoiture));
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

    public function disponible(Request $request){

        $car_id = $request->car;
        $query = Http::put('http://localhost/PPE/public/index.php/api/cars/disponible',array("car_id" => $car_id));
        return redirect('./gestion/agence');
    }

    public function indisponible(Request $request){

        $car_id = $request->car;
        $query = Http::put('http://localhost/PPE/public/index.php/api/cars/indisponible',array("car_id" => $car_id));
        return redirect('./gestion/agence');
    }


    public function vehicule()
    {
        $role = Storage::get('role');
        return view("gestionAgenceVehicule",array('role' => $role));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $agence = $request->agence;
        $response = Http::delete('http://localhost/PPE/public/index.php/api/compte',array("user_id" => "$agence"));

        // var_dump($user);
        return redirect('./gestion/agences');
    }
}
