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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Book::create([
            'title' => $request-> input('Title'),
            'author' =>$request-> input('Author'),
            'slug' => Str::slug($request->input('Title')),
            'classification_id' => $request-> input('Classification_id'),
            'library_id' => $request-> input('Library_id')
        ]);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        Book::find($id)->update([
            'title'=>$request-> input('Title'),
            'author'=>$request-> input('Author'),
            'slug'=> Str::slug($request->input('Title')),
            'library_id'=> $request-> input('library_id'),
            'classification_id'=>$request-> input('Classification_id')
            ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $classification_id)
    {
        Book::find($id)->delete();
        return redirect()->back();
    }
}
