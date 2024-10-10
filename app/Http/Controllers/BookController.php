<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\Classification;

use Illuminate\Support\Str;

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
        //
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
        $book = new Book;
        $book->title=$request-> input('Title');
        $book->author=$request-> input('Author');
        $book->library_id=$request-> input('Library_id');
        $book->classification_id=$request-> input('Classification_id');
        $Slug = $request->input('Title');
        $book->slug=Str::slug($Slug);

        $book->save();
        return redirect()->back();

        //
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
        $book = Book::find($id);
        $book->title=$request-> input('Title');
        $book->author=$request-> input('Author');
        $book->slug=$request-> input('Slug');
        $book->library_id=$request-> input('Library_id');
        $book->classification_id=$request-> input('Classification_id');

        $book->update();
        return redirect()->back();

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $classification_id)
    {
        $book = Book::find($id)->delete();

        return redirect()->back();
        //
    }
}
