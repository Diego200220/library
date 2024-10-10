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
        $Slug = $request->input('Name');
        $classifications = new Classification;
        $classifications->name=$request-> input('Name');
        $classifications->type=$request-> input('Type');
        $classifications->slug=Str::slug($Slug);
        $classifications->save();
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
        $classifications = Classification::find($id);
        $classifications->name=$request-> input('Name');
        $classifications->type=$request-> input('Type');
        $classifications->slug=$request-> input('Slug');
        $classifications->update();
        return redirect()->back();
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classifications = Classification::find($id)->delete();
        return redirect()->back();
        //
    }
}
