<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use App\Solution;
use App\Subcategorie;
use App\Platform;
use App\User;
use Illuminate\Support\Facades\Storage;
class StaticController extends Controller
{
    public function accueil(){
        $solutions = Solution::all();
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        return view('accueil', compact('solutions', 'categories', 'subcategories', 'platforms'));
    }

    public function solution($solution){
        $solutions = Solution::where('id',$solution)->get();
        $sol = $solutions->first();
        $users = User::where('id',$sol->user_id)->get();
        $screens = unserialize($sol->screens);
        return view('solutionShow', compact('solutions','users', 'screens'));
    }

    public function search(Request $request){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $solution =$request->stsearch;
        $solutions = Solution::where('name', $solution)->get();
        $nbsol = $solutions->count();
        return view('result', compact('solutions', 'nbsol', 'categories', 'subcategories', 'platforms'));
    }

    //Pages de filtres

    public function fcat($categorie){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $cat = Categorie::where('id', $categorie)->first();
        $fsols = Solution::where('category', $cat->name)->get();
        //$filters = $categories;
        return view('filter', compact('fsols', 'categories', 'subcategories', 'platforms'))->with('type', 'category')
                                                                                            ->with('category',$cat->name);
    }

    public function fsub($subcategorie){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $sub = Subcategorie::where('id', $subcategorie)->first();
        $fsols = Solution::where('subcategory', $sub->name)->get();
        return view('filter', compact('fsols', 'categories', 'subcategories', 'platforms'))->with('type','subcategory')
                                                ->with('subcategory', $sub->name);
    }

    public function fplatform($platform){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $plat = Platform::where('id', $platform)->first();
        $fsols = Solution::where('platform', $plat->name)->get();
        return view('filter', compact('fsols', 'categories', 'subcategories', 'platforms'))->with('type','platform')
                                                ->with('platform', $plat->name);
    }

    public function interceptCatName($value){
        $cat = Categorie::where('name', $value)->first();
        $categorie = $cat->id;
        return $this->fcat($categorie);
    }
    public function interceptSubcatName($value){
        $sub = Subcategorie::where('name', $value)->first();
        $subcategorie = $sub->id;
        return $this->fsub($subcategorie);
    }
    public function interceptPlatName($value){
        $plat = Platform::where('name', $value)->first();
        $platform = $plat->id;
        return $this->fplatform($platform);
    }

    //Files management
    public function storeFiles(Request $request){
        /*
        Storage::disk('local')->put('public/exampl.txt', 'Contents');
        echo('A file has been created. click to see ');
        return redirect(asset('storage/exampl.txt'));
        */
        $paths = [];
        $files = $request->file('screen');
        foreach($files as $file){
            $path = $file->storePublicly('images','public');
            array_push($paths, $path);
        }
        return view('imgTest', compact('paths'));
    }
}
