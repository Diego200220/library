<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Classification;

use Illuminate\Support\Str;

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
        Classification::create([
            'name' => $request-> input('name'),
            'type'=> $request-> input('type'),
            'slug'=> Str::slug($request->input('name'))
        ]);
        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, $id)
    {
        Classification::find($id)->update([
            'name' => $request-> input('name'),
            'type'=> $request-> input('type'),
            'slug'=> Str::slug($request->input('name'))
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Classification::find($id)->delete();
        return redirect()->back();
    }
}
