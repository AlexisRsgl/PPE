<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class GestionUtilisateur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $response = Http::get('http://localhost/PPE/public/index.php/api/utilisateurs');
       // var_dump($response->status());
        $utilisateurs = json_decode($response->body());
        $token = Storage::get('token');
        $role = Storage::get('role');
        $queryRole = Http::get('http://localhost/PPE/public/index.php/api/roles');
        $roles = json_decode($queryRole->body());
     //   var_dump($queryRole->status());
        $agenceQuery =  Http::get('http://localhost/PPE/public/index.php/api/agencies');
        $agence = json_decode($agenceQuery->body());
      //  var_dump($agence);
      //  var_dump($agenceQuery->status());
        return view("gestionUtilisateur", ['tableauDesUtilisateurs' => $utilisateurs, 'role' => $role, 'rolesListe' => $roles,'tableauDesAgences' => $agence]);
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

    public function affecterAgence(Request $request){
        $user = $request->userIdToAffect;
        $agence = $request->agence;

        $query = Http::put('http://localhost/PPE/public/index.php/api/agencies/chief',array("user_id" => $user, "agency_id" => $agence));
        return redirect('./gestion/utilisateur');

    }

    public function desactivate(Request $request)
    {
        $userId = $request->user;
       // var_dump($userId);
        $query = Http::put('http://localhost/PPE/public/index.php/api/utilisateur/desactivate',array("user_id" => $userId));
        return redirect('./gestion/utilisateur');
    }

    public function activate(Request $request)
    {
        $userId = $request->user;
        $query = Http::put('http://localhost/PPE/public/index.php/api/utilisateur/activate',array("user_id" => $userId));
          return redirect('./gestion/utilisateur');
    }

    public function createUser(Request $request)
    {
        $getUsers = Http::get('http://localhost/PPE/public/index.php/api/utilisateurs');
      //  var_dump($getUsers->status());
        $utilisateurs = json_decode($getUsers->body());
        $role = Storage::get('role');

        $email = $request->email;
        $name = $request->name;
        $role = $request->get('role');
      //  var_dump($request->get('role'));

        $response = Http::post('http://localhost/PPE/public/index.php/api/inscription',array("name" => "$name","email" => "$email", "role_id" => $role));
      //  var_dump($response->status());
        if($response->status() == 200 || $response->status() == 201){
            return redirect('./gestion/utilisateur');
        }else{
            return redirect('./gestion/utilisateur');
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


    public function update(Request $request)
    {

        $userId = $request->userIdModify;
        $name = $request->firstname;
        $email = $request->email;
        $role = $request->role;
        var_dump($userId);
        $response = Http::put('http://localhost/PPE/public/index.php/api/compte',array("user_id" => "$userId","name" => "$name", "email" => "$email","role_id" => "$role"));
        var_dump($response->status());

        return redirect('./gestion/utilisateur');
    }


    public function destroy(Request $request)
    {
        $user = $request->user;
        $response = Http::delete('http://localhost/PPE/public/index.php/api/compte',array("user_id" => "$user"));

       // var_dump($user);
        return redirect('./gestion/utilisateur');
    }
}
