<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Classification;

use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications = Classification::all();
        $books = Book::all();
        return view('classifications.index',compact('classifications', 'books'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Classification::create([
                'name' => $request->input('name'),
                'type' => $request->input('type'),
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
            Classification::find($id)->update([
                'name' => $request->input('name'),
                'type' => $request->input('type'),
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
            Classification::find($id)->delete();
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la eliminar de la informacion");

        }
    }
}
