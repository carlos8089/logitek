<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Comment;
use Illuminate\Http\Request;
use App\Solution;
use App\Subcategorie;
use App\Platform;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Providers\AppServiceProvider;
use SebastianBergmann\Environment\Console;

class StaticController extends Controller
{
    public function accueil(){
        /*
        $solutions = Solution::paginate(12);
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $count = Solution::all()->count();
        return view('accueil', compact('solutions', 'categories', 'subcategories', 'platforms'))->with('count', $count);
        */
        $categories = Categorie::all();
        return view('accueil');
    }

    public function marketplaceIndex(){
        $solutions = Solution::paginate(12);
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $count = Solution::all()->count();
        return view('directory', compact('solutions', 'categories', 'subcategories', 'platforms'))->with('count', $count);
    }

    public function solution($solution){
        $solutions = Solution::where('id',$solution)->get();
        $sol = $solutions->first();
        $users = User::where('id',$sol->user_id)->get();
        $screens = unserialize($sol->screens);
        $comments = $sol->comments->sortByDesc('created_at');
        $comments_total = $comments->count();
        return view('solutionShow', compact('solutions','users', 'screens', 'comments'))->with('totalComment', $comments_total);
    }
    /*
    public function searchUser(Request $request){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $user = $request->user;
        $publishers = User::where('name', 'like', "%$user%")->get();
        return view('userResults', compact('publishers','categories','subcategories','platforms'));
    }
    */

    public function user($user){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $users = User::where('id', $user)->get();
        $solutions = Solution::where('user_id', $user)->paginate(12);
        $nbSol = Solution::where('user_id', $user)->count();
        return view('user', compact('users' ,'solutions', 'categories','subcategories', 'platforms'))->with('solutionCount', $nbSol);
    }
    //Search an element in the library
    /*
        @params {
            $meta //data collection in which the search is made through;
            $key //keyword that has to be search
        }
        return a result view with the @items as result of the query.
    */
    public function search(Request $request){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        //get request informations
        $meta = $request->searchIn;
        $key = $request->stsearch;
        //switch meta's value proceed..
        $type = '';
        switch ($meta) {
            case 'solution':
                //$solution =$key;
                $solutions = Solution::where('name', 'like', "%$key%")->get();
                $count = $solutions->count();
                $items = $solutions;
                $type = $meta;
                break;
            case 'publisher':
                $publishers = User::where('name', 'like', "%$key%")->get();
                $count = $publishers->count();
                $items = $publishers;
                $type = $meta;
                break;
            default:
                echo('lolol');
                break;
        }

        return view('result', compact('items', 'count', 'categories', 'subcategories', 'platforms'))->with('type', $type);
    }

    //Pages de filtres

    public function filter(Request $request){
        //$solutions = DB::table('solutions');
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();

        //filter solutions
        if (($request->category !== '') && ($request->platform !== '')) {
            $cat = $request->category;
            $plat = $request->platform;
            $solutions = Solution::when($cat, function($query) use ($cat){
                return $query->where('category', $cat);
            })->when($plat, function ($query) use ($plat){
                return $query->where('platform', $plat);
            })->paginate(9)->withQueryString();
            $filtercount = Solution::where('category',$cat)->where('platform',$plat)->count();
        }
        if (($request->category !== '') && ($request->platform == '')) {
            $cat = $request->category;
            $solutions = Solution::where('category',$cat)->paginate(15)->withQueryString();
            $filtercount = Solution::where('category',$cat)->count();
        }
        if (($request->category == '') && ($request->platform !== '')) {
            $plat = $request->platform;
            $solutions = Solution::where('platform',$plat)->paginate(15)->withQueryString();
            $flitercount = Solution::where('platform',$plat)->get()->count();
        }
        //$solutions->append(request()->query());
        return view('accueil', compact('solutions', 'categories', 'subcategories', 'platforms'))->with('count', $filtercount);

    }

    public function fcat($category){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $cat = Categorie::where('id', $category)->first();
        $subs = Subcategorie::where('categorie_id', $cat->id)->get();
        //echo $subs->first()->name;

        $fsols = Solution::where('category', $cat->name)->paginate(18);
        $count = Solution::where('category', $cat->name)->count();
        return view('category', compact('cat','fsols', 'categories', 'subcategories', 'platforms', 'subs'))->with('count', $count)
                                                                                            ->with('category',$cat->name);

    }

    public function fsub($subcategory){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $sub = Subcategorie::where('id', $subcategory)->first();
        $fsols = Solution::where('subcategory', $sub->name)->paginate(18);
        $count = Solution::where('subcategory', $sub->name)->count();
        return view('subcategory', compact('sub','fsols', 'categories', 'subcategories', 'platforms'))->with('type','subcategory')
                                                                                                        ->with('count', $count)
                                                                                                        ->with('subcategory', $sub->name);
    }

    public function fplatform($platform){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $plat = Platform::where('id', $platform)->first();
        $fsols = Solution::where('platform', $plat->name)->paginate(18);
        return view('filter', compact('fsols', 'categories', 'subcategories', 'platforms'))->with('type','platform')
                                                ->with('platforme', $plat->name);
    }

    public function interceptCatName($value){
        $cat = Categorie::where('name', $value)->first();
        $category = $cat->id;
        return $this->fcat($category);
    }
    public function interceptSubcatName($value){
        $sub = Subcategorie::where('name', $value)->first();
        $subcategory = $sub->id;
        return $this->fsub($subcategory);
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
