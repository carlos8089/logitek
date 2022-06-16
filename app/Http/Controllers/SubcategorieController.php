<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubcategorieRequest;
use App\Http\Requests\UpdateSubcategorieRequest;
use App\Subcategorie;
use App\Categorie;

class SubcategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = Subcategorie::paginate(6);
        $categories = Categorie::all();
        $countSub = Subcategorie::all()->count();

        return view('admin.subcategories.subcategories', compact('subs', 'categories'))->with('count', $countSub);

        /*
        $subs = Subcategorie::all();
        foreach ($subs as $sub) {
            echo $sub->categorie->name;
        }
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.subcategories.subcategorieCreate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubcategorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubcategorieRequest $request)
    {
        $sub = new Subcategorie();
        $sub->categorie_id = Categorie::where('name',$request->category)->first()->id;
        $sub->name = $request->name;
        $sub->save();

        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategorie $subcategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategorie $subcategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubcategorieRequest  $request
     * @param  \App\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcategorieRequest $request, Subcategorie $subcategorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategorie $subcategory)
    {
        $sub = Subcategorie::find($subcategory)->first()->delete();
        return redirect()->route('subcategories.index');
    }
}
