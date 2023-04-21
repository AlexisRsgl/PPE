<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ConnexionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("connexion",array());
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

    public function connect(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $query = Http::post('http://localhost/PPE/public/index.php/api/connexion',array("email" => $email, "password" => $password));
        $decode = json_decode($query->body());
        
        $queryRole = Http::get('http://localhost/PPE/public/index.php/api/roles');
      //  var_dump($decode->user->role_id);
        $rolesListe = json_decode($queryRole->body());
foreach ($rolesListe as $role){
    if($role->id == $decode->user->role_id){
        var_dump($role->id);
        var_dump($role->name);
        Storage::disk('local')->put('role', $decode->user->role_id);

    }


}
        if(isset($decode->token) && $decode->user->is_active == 1){
            Storage::disk('local')->put('token', $decode->token);
            Storage::disk('local')->put('userId', $decode->user->id);
            if(Storage::get('role') == 1){
                return redirect('/gestion/utilisateur');
            }elseif (Storage::get('role') == 2){
                return redirect('/gestion/utilisateur');
            }elseif (Storage::get('role') == 3){
                return redirect('/gestion/agence');
            }elseif (Storage::get('role') == 4){
                return redirect('/gestion/agences');
            }elseif (Storage::get('role') == 5){
                return redirect('/gestion/fournisseurs');
            }elseif (Storage::get('role') == 6){
                return redirect('/gestion/commandes');
            }



            return redirect('/gestion/utilisateur');
        }elseif(isset($decode->token) && $decode->user->is_active == 0){
            return view("connexion",array())->with('error', '2');
        }
        else {
            return view("connexion",array())->with('error', '1');
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
