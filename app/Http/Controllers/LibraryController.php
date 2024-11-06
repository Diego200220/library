<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        Library::create([
            'name' => $request-> input('name'),
            'slug' =>Str::slug($request->input('name'))
        ]);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $library = Library::find($id);
        $library-> name = $request-> input('name');
        $library->slug=Str::slug($request->input('name'));

        $library->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Library::find($id)->delete();
        return redirect()->back();
        //
    }
}
