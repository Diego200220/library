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
        //
        $clients = Client::all();
        $books = Book::all();
        $rentbooks = RentBook::all();

        return view('rentbooks.index',compact('books', 'clients', 'rentbooks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $rent = new RentBook;
        $rent->ticket=$request-> input('ticket');
        $rent->book_id=$request-> input('book_id');
        $rent->client_id=$request-> input('client_id');

        $rent->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rent = RentBook::find($id);
        $rent->ticket=$request-> input('ticket');
        $rent->book_id=$request-> input('book_id');
        $rent->client_id=$request-> input('client_id');

        $rent->update();
        return redirect()->back();

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rent = RentBook::find($id)->delete();

        return redirect()->back();
        //
    }
}
