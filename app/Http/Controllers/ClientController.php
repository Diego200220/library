<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

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
        Client::create([
            'name' => $request-> input('name'),
            'last_name' =>$request-> input('last_name'),
            'membership_card' => $request-> input('membership_card')
        ]);

        return redirect()->back();
          }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Client::find($id)->update([
            'name' => $request-> input('name'),
            'last_name' =>$request-> input('last_name'),
            'membership_card' => $request-> input('membership_card')
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        return redirect()->back();
    }
}
