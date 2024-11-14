<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Client;
use App\Models\RentBook;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class RentBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $books = Book::all();
        $rentbooks = RentBook::all();
        return view('rentbooks.index',compact('books', 'clients', 'rentbooks'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            RentBook::create([
                'ticket' => $request->input('ticket'),
                'book_id' => $request->input('book_id'),
                'client_id' => $request->input('client_id')
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
            RentBook::find($id)->update([
                'ticket' => $request->input('ticket'),
                'book_id' => $request->input('book_id'),
                'client_id' => $request->input('client_id')
            ]);
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la actualizacion de la informacion");
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            RentBook::find($id)->delete();
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back()->with("error","Error en la eliminar de la informacion");
        }
    }
    public function show($id) {
        $rentBook = RentBook::find($id);
        if (!$rentBook) {
            return response()->json(['error' => 'rentbooks not found'], 405);
        }
        return response()->json(['data' => ['rentbooks' => $rentBook]]);
    }
}
