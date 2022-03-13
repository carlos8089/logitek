<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::paginate(4);
        $countCat = Categorie::all()->count();
        return view('admin.categories.categories', compact('categories'))->with('count', $countCat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Categorie();
        $cat->name = $request->name;
        $cat->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
            $cat = Categorie::find($category);
            $cat->delete();

            return redirect()->route('categories.index');
    }
}
