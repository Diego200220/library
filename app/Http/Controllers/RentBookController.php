<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Client;
use App\Models\RentBook;
use Illuminate\Http\Request;

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
        RentBook::create([
            'ticket' => $request-> input('ticket'),
            'book_id' => $request-> input('book_id'),
            'client_id' => $request-> input('client_id')
        ]);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        RentBook::find($id)->update([
            'ticket' => $request-> input('ticket'),
            'book_id' => $request-> input('book_id'),
            'client_id' => $request-> input('client_id')
        ]);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RentBook::find($id)->delete();
        return redirect()->back();
    }
}
