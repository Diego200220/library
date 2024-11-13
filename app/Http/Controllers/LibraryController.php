<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libraries = Library::all();
        return view('libraries.index', compact('libraries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Library::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name'))
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
            Library::find($id)->update([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name'))
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
            Library::find($id)->delete();
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la eliminar de la informacion");
        }
    }
}
