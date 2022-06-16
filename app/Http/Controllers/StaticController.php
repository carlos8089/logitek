<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Comment;
use App\Country;
use App\Os;
use Illuminate\Http\Request;
use App\Solution;
use App\Subcategorie;
use App\Platform;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Providers\AppServiceProvider;
use DateTime;
use Illuminate\Pagination\Paginator;
use PhpParser\Node\Expr\AssignOp\Concat;
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
        $oses = Os::all();
        $countries = Country::all()->sortBy('name');
        $count = Solution::all()->count();
        return view('directory', compact('solutions', 'categories', 'subcategories', 'platforms', 'oses', 'countries'))->with('count', $count);
    }

    public function solution($solution){
        $solutions = Solution::where('id',$solution)->get();
        $sol = $solutions->first();
        $users = User::where('id',$sol->user_id)->get();
        $screens = unserialize($sol->screens);
        $comments = $sol->comments->sortByDesc('created_at');
        $comments_total = $comments->count();
        return view('solutionShow', compact('sol','solutions','users', 'screens', 'comments'))->with('totalComment', $comments_total);
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

    //Filters

    public function filter(Request $request){
        //$solutions = DB::table('solutions');
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();

        //filter solutions
        $sub = $request->subcategory;
        $plat = $request->platform;
        if(isset($sub)===false && isset($plat)===false){
            return redirect(route('marketplace'));
        }else{
            if ((isset($sub)) && (isset($plat))) {
                $solutions = Solution::when($sub, function($query) use ($sub){
                    return $query->where('subcategorie_id', $sub);
                })->when($plat, function ($query) use ($plat){
                    return $query->where('platform_id', $plat);
                })->paginate(9)->withQueryString();
                $filtercount = Solution::where('subcategorie_id',$sub)->where('platform_id',$plat)->count();
            }else{
                if (isset($sub) && isset($plat)===false) {
                    $solutions = Solution::where('subcategorie_id',$sub)->paginate(15)->withQueryString();
                    $filtercount = Solution::where('subcategorie_id',$sub)->count();
                }
                if (isset($sub)===false && isset($plat)) {
                    $solutions = Solution::where('platform_id',$plat)->paginate(15)->withQueryString();
                    $flitercount = Solution::where('platform_id',$plat)->get()->count();
                }
            }
        }
        //$solutions->append(request()->query());
        return view('directory', compact('solutions', 'categories', 'subcategories', 'platforms'))->with('count', $filtercount);
    }

    public function advancedFilter(Request $request){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $oses = Os::all();
        $countries = Country::all()->sortBy('name');

        if(isset($request->category)){
            $cat = Categorie::where('id', $request->category)->first();
        }
        if(isset($request->subcategory)){
            $sub = Subcategorie::where('id', $request->subcategory)->first();
        }
        if(isset($request->platform)){
            $plat = Platform::where('id', $request->platform)->first();
        }
        if(isset($request->os)){
            $os = Os::where('id', $request->os)->first();
        }
        if(isset($request->country)){
            //retreive the list of users for that country
            $u_country = User::where('country_id', $request->country)->get();
            //create an array off those users' id
            $u = [];
            foreach ($u_country as $u_c) {
                array_push($u, $u_c->id);
            }
        }
        if(isset($request->price)){
            $price = $request->price;
        }
        if(isset($request->dateInf)){
            $inf = $request->dateInf.' 00:00:00';
            $date = new DateTime();
            $dateInf = date_modify($date,$inf);
        }
        if(isset($request->dateSup)){
            $sup = $request->dateSup.' 23:59:59';
            //echo $sup;
            $date = new DateTime();
            $dateSup = date_modify($date,$sup);
        }
        /*
        User::where('country_id', $country);
        */
        $solutions = Solution::where('categorie_id', $cat->id)
                                ->where('subcategorie_id', $sub->id)
                                ->where('platform_id', $plat->id)
                                ->where('os_id', $os->id)
                                ->whereIn('user_id', $u)
                                ->whereBetween('created_at', [$dateInf, $dateSup])->paginate(10);
        //$solutions->append(request()->query());
        $filtercount = $solutions->count();
        return view('directory', compact('solutions', 'categories', 'subcategories', 'platforms', 'oses', 'countries'))->with('count', $filtercount);
    }

    public function fcat($category){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $cat = Categorie::where('id', $category)->first();
        $subs = Subcategorie::where('categorie_id', $cat->id)->get();
        //echo $subs->first()->name;

        $fsols = Solution::where('categorie_id', $cat->id)->paginate(18);
        $count = Solution::where('categorie_id', $cat->id)->count();
        return view('category', compact('cat','fsols', 'categories', 'subcategories', 'platforms', 'subs'))->with('count', $count)
                                                                                            ->with('category',$cat->name);

    }

    public function fsub($subcategory){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $sub = Subcategorie::where('id', $subcategory)->first();
        $fsols = Solution::where('subcategorie_id', $sub->id)->paginate(18);
        $count = Solution::where('subcategorie_id', $sub->id)->count();
        return view('subcategory', compact('sub','fsols', 'categories', 'subcategories', 'platforms'))->with('type','subcategory')
                                                                                                        ->with('count', $count)
                                                                                                        ->with('subcategory', $sub->name);
    }

    public function fplatform($platform){
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();
        $plat = Platform::where('id', $platform)->first();
        $fsols = Solution::where('platform_id', $plat->id)->paginate(18);
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
