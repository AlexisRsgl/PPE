<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        if(count($users) <= 0){
            return response(["message" => "Aucun utilisateur enregistré"], 200);
        }
        return response($users, 200);
    }

    public function inscription(Request $request){
        $UserData = $request->validate([
            "name" => ["required", "string", "min:2", "max:50"],
            "email" => ["required", "email", "unique:users,email"],
        ]);

        $Users = User::create([
            "name" => $UserData["name"],
            "role_id" => 1,
            'is_active' => 1,
            "email" => $UserData["email"],
            "password" => base_convert(hash('sha256', time() . mt_rand()), 16, 36),
        ]);

        return response()->json($Users, 201);
    }

    public function connexion(Request $request){
        try {
            $UserData = $request->validate([
                "email" => ["required", "email"],
                "password" => ["required", "string"],
            ]);

            $User = User::where("email", $UserData["email"])->first();

            if(!$User) return response()->json(["message" => "Cet email $UserData[email] ne correspond à aucun utilisateur"], 401);
            if(!Hash::check($UserData["password"], $User->password)) return response()->json(["message" => "Ce mot de passe ne correspond pas à cet email"], 401);

            $token = $User->createToken("cle_token")->plainTextToken;
            return response()->json([
                "user" => $User,
                "token" => $token
            ], 200);

        } catch (ValidationException $error) {
            return response()->json([
                "error" => $error,
            ], 422);
        }
    }

    public function deconnexion() {
        auth()->user()->tokens->each(function($token, $key) {
            $token->delete();
        });
        return response(["message" => "Déconnecté"], 200);
    }

    public function update(Request $request)
    {
        $UserData = $request->validate([
            "name" => ["required", "string", "min:2", "max:50"],
            "email" => ["required", "email"],
            "user_id" => ["required", "numeric"],
        ]);

        $User = User::where("id", $UserData["user_id"])->first();

        $User->update($UserData);
        return response(["message" => "L'utilisateur a bien été mis à jour"], 201);
    }

    public function activate(Request $request)
    {
        $UserData = $request->validate([
            "user_id" => ["required", "numeric"],
        ]);

        User::where("id", $UserData["user_id"])
        ->update(array('is_active' => 1));

        return response(["message" => "L'utilisateur est activé"], 201);
    }

    public function desactivate(Request $request)
    {
        $UserData = $request->validate([
            "user_id" => ["required", "numeric"],
        ]);

        User::where("id", $UserData["user_id"])
        ->update(array('is_active' => 0));

        return response(["message" => "L'utilisateur est désactivé"], 201);
    }

    public function delete(Request $request) {
        $UserData = $request->validate([
            "user_id" => ["required", "numeric"],
        ]);

        $User = User::where("id", $UserData["user_id"])->first();

        User::destroy($UserData["user_id"]);
        return response(["message" => "Compte supprimé"], 200);
    }
}
