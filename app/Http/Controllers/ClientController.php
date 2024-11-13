<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Client::create([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
                'membership_card' => $request->input('membership_card')
            ]);
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la creacion de la informacion");
        }
          }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            Client::find($id)->update([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
                'membership_card' => $request->input('membership_card')
            ]);
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la actualizacion de la informacion");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Client::find($id)->delete();
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la eliminar de la informacion");
        }
    }
}
