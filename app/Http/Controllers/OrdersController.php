<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        if(count($orders) <= 0){
            return response(["message" => "Il n'y a aucune commande"], 200);
        }
        return response($orders, 200);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ordersValidation = $request->validate([
            "date debut" => ["required", "date"],
            "date fin" => ["required", "date"],
            "user_id" => ["required", "numeric"],
            "car_id" => ["required", "numeric"],
        ]);

        $orders = Orders::create([
            "date debut" => $ordersValidation["date debut"],
            "date fin" => $ordersValidation["date fin"],
            "user_id" => $ordersValidation["user_id"],
            "car_id" => $ordersValidation["car_id"],
        ]);

        return response(["message" => "Commande ajoutée"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = DB::table("orders")
        ->join("users", "orders.user_id", "=", "users.id")
        ->select("orders.*", "users.name", "users.email")
        ->where("orders.id", "=", $id)
        ->get()
        ->first();
        return $order;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ordersValidation = $request->validate([
            "date debut" => ["required", "date"],
            "date fin" => ["required", "date"],
            "user_id" => ["required", "numeric"],
            "car_id" => ["required", "numeric"],
        ]);

        $order = Orders::find($id);
        if(!$order){
            return response(["message" => "Aucune commande de trouvée avec cet id : $id"], 404);
        }
        if($order->user_id != $ordersValidation["user_id"]) {
            return response(["message" => "Action non autorisée"], 403);
        }
        $order->update($ordersValidation);
        return response(["message" => "La commande a bien été mise à jour"], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ordersValidation = $request->validate([
            "user_id" => ["required", "numeric"],
        ]);

        $order = Orders::find($id);
        if(!$order){
            return response(["message" => "Aucune commande de trouvée avec cet id : $id"], 404);
        }
        if($order->user_id != $ordersValidation["user_id"]) {
            return response(["message" => "Action non autorisée"], 403);
        }

        Orders::destroy($id);

        return response(["message" => "La commande a bien été supprimée"], 200);
    }
}
