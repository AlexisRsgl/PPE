<?php

namespace App\Http\Controllers;

use App\Models\Vendors;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendors::all();
        if(count($vendors) <= 0){
            return response(["message" => "Aucun fournisseur de disponible"], 200);
        }
        return response($vendors, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendorsValidation = $request->validate([
            "name" => ["required", "string"]
        ]);

        $vendors = Vendors::create([
            "name" => $vendorsValidation["name"]
        ]);

        return response(["message" => "Fournisseur ajouté"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function show(Vendors $vendors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendorsValidation = $request->validate([
            "name" => ["string"]
        ]);

        $vendor = Vendors::find($id);
        if(!$vendor){
            return response(["message" => "Aucun fournisseur de trouvé avec cet id : $id"], 404);
        }
        $vendor->update($vendorsValidation);
        return response(["message" => "Le fournisseur a bien été mis à jour"], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $vendors = Vendors::find($id);
        if(!$vendors){
            return response(["message" => "Aucun fournisseur de trouvé avec cet id : $id"], 404);
        }

        Vendors::destroy($id);

        return response(["message" => "Le fournisseur a bien été supprimé"], 200);
    }
}
