<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\Classification;

use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications = Classification::all();
        $books = Book::all();
        $libraries = Library::all();
        return view('books.index',compact('books', 'classifications', 'libraries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Book::create([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'slug' => Str::slug($request->input('title')),
                'classification_id' => $request->input('classification_id'),
                'library_id' => $request->input('library_id')
            ]);
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la creacion de la informacion");
        }
    }

    public function update(Request $request, $id)
    {
        try {
        Book::find($id)->update([
            'title'=>$request-> input('title'),
            'author'=>$request-> input('author'),
            'slug'=> Str::slug($request->input('title')),
            'library_id'=> $request-> input('library_id'),
            'classification_id'=>$request-> input('classification_id')
            ]);
        return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la actualizar de la informacion");
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $classification_id)
    {
        try {
            Book::find($id)->delete();
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la eliminar de la informacion");

        }
    }
}
