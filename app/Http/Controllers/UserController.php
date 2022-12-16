<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function inscription(Request $request){
        $UserData = $request->validate([
            "name" => ["required", "string", "min:2", "max:50"],
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required", "string", "min:12", "max:50", "regex:/[A-Z]/", "regex:/[0-9]/", "regex:/[@$!%*#?&]/", "confirmed"]
        ]);

        $Users = User::create([
            "name" => $UserData["name"],
            "email" => $UserData["email"],
            "password" => bcrypt($UserData["password"])
        ]);

        return response($Users, 201);
    }

    public function connexion(Request $request){
        $UserData = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "string", "min:12", "max:50", "regex:/[A-Z]/", "regex:/[0-9]/", "regex:/[@$!%*#?&]/"]
        ]);

        $User = User::where("email", $UserData["email"])->first();
        if(!$User) return response(["message" => "Cet email $UserData[email] ne correspond à aucun utilisateur"], 401);
        if(!Hash::check($UserData["password"], $User->password)) return response(["message" => "Ce mot de passe ne correspond pas à cet email"], 401);

        $token = $User->createToken("cle_token")->plainTextToken;
        return response([
            "User" => $User,
            "token" => $token
        ], 200);
    }

    public function deconnexion() {
        auth()->user()->tokens->each(function($token, $key) {
            $token->delete();
        });
        return response(["message" => "Déconnecté"], 200);
    }

    public function delete(Request $request) {
        $UserData = $request->validate([
            "email" => ["required", "email", "exists:users,email"],
            "password" => ["required", "string", "min:12", "max:50", "regex:/[A-Z]/", "regex:/[0-9]/", "regex:/[@$!%*#?&]/"],
            "user_id" => ["required", "numeric"]
        ]);

        $User = User::where("email", $UserData["email"])->first();

        if(!Hash::check($UserData["password"], $User->password)) {
            return response(["message" => "Ce mot de passe ne correspond pas à cet email"], 401);
        }
        if($User->id != $UserData["user_id"]) {
            return response(["message" => "Action non autorisée"], 403);
        }
        User::destroy($UserData["user_id"]);
        return response(["message" => "Compte supprimé"], 200);
    }
}
