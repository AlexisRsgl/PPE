<?php

use App\Http\Controllers\GestionFournisseurs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\GestionUtilisateur;
use App\Http\Controllers\GestionFournisseur;
use App\Http\Controllers\GestionVehicule;
use App\Http\Controllers\GestionAgence;
use App\Http\Controllers\GestionAgences;
use App\Http\Controllers\CommandeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//connexion | deconnexion
Route::get("/connexion",[ConnexionController::class,"index"])->name('connexion');
Route::post("/queryToConnect",[ConnexionController::class,"connect"])->name('login');


//utilisateurs
Route::get("/gestion/utilisateur",[GestionUtilisateur::class,"index"]);
Route::get("/createUser",[GestionUtilisateur::class,"createUser"])->name('createUser');
Route::get("/suppressionUtilisateur",[GestionUtilisateur::class,"destroy"])->name('suppressionUtilisateur');
Route::get("/modifierUtilisateur",[GestionUtilisateur::class,"update"])->name('modifierUtilisateur');
Route::get("/desactiverUtilisateur",[GestionUtilisateur::class,"desactivate"])->name('desactiverUtilisateur');
Route::get("/activerUtilisateur",[GestionUtilisateur::class,"activate"])->name('activerUtilisateur');
Route::get("/affecterAgenceUtilisateur",[GestionUtilisateur::class,"affecterAgence"])->name('affecterAgenceUtilisateur');




//commande
Route::get("/gestion/commande",[CommandeController::class,"index"]);
Route::get("/gestion/creerUneCommande",[CommandeController::class,"creerUneCommande"])->name("creerUneCommande");

//Route::get("/gestion/utilisateur",[GestionUtilisateur::class,"create"]);

//fournisseurs
Route::get("/gestion/fournisseurs",[GestionFournisseurs::class,"index"]);
Route::get("/gestion/fournisseurs/vehicule",[GestionFournisseurs::class,"vehiculeFournisseur"]);
Route::get("/suppressionVehiculeFournisseur",[GestionFournisseurs::class,"suppressionVehiculeFournisseur"])->name("suppressionVehiculeFournisseur");
Route::get("/modifierVehiculeFournisseur",[GestionFournisseurs::class,"modifierVehiculeFournisseur"])->name("modifierVehiculeFournisseur");
Route::get("/gestion/createFournisseur",[GestionFournisseurs::class,"createFournisseur"])->name("createFournisseur");
Route::get("/gestion/suppressionFournisseur",[GestionFournisseurs::class,"suppressionFournisseur"])->name("suppressionFournisseur");
Route::get("/modifierFournisseur",[GestionFournisseurs::class,"modifierFournisseur"])->name("modifierFournisseur");

//vehicule
Route::get("/gestion/vehicule",[GestionVehicule::class,"index"]);
Route::get("/creerVehicule",[GestionVehicule::class,"creerVehicule"])->name("creerVehicule");
Route::get("/modifierVehicule",[GestionVehicule::class,"modifierVehicule"])->name("modifierVehicule");
Route::get("/creerVehiculeFournisseur",[GestionVehicule::class,"creerVehiculeFournisseur"])->name("creerVehiculeFournisseur");
Route::get("/suppressionVehicule",[GestionVehicule::class,"suppressionVehicule"])->name("suppressionVehicule");
Route::get("/disponible",[GestionVehicule::class,"disponible"])->name("disponible");
Route::get("/indisponible",[GestionVehicule::class,"indisponible"])->name("indisponible");


//agence
Route::get("/gestion/agence",[GestionAgence::class,"index"]);
Route::get("/disponibleOnly",[GestionAgence::class,"disponible"])->name("disponibleOnly");
Route::get("/indisponibleOnly",[GestionAgence::class,"indisponible"])->name("indisponibleOnly");

//gestion agences
Route::get("/gestion/agence/vehicule",[GestionAgence::class,"vehicule"]);
Route::get("/gestion/agences",[GestionAgences::class,"index"]);

Route::get("/createAgence",[GestionAgences::class,"createAgence"])->name('createAgence');
Route::get("/supprimerAgence",[GestionAgences::class,"delete"])->name('supprimerAgence');
Route::get("/modifierAgence",[GestionAgences::class,"modifierAgence"])->name("modifierAgence");



