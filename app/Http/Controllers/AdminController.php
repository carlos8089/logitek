<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Solution;
use App\Categorie;
use App\Platform;
use App\Subcategorie;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $countSol = Solution::all()->count();
        $countCat = Categorie::all()->count();
        $countSub = Subcategorie::all()->count();
        $countPlat = Platform::all()->count();
        $countUsers = User::all()->count();
        return view('admin.adminHome')->with('solutions', $countSol)
                                        ->with('categories', $countCat)
                                        ->with('subcategories', $countSub)
                                        ->with('platforms', $countPlat)
                                        ->with('users', $countUsers);
    }

    public function solutions(){
        $total = Solution::all()->count();
        $categories = Categorie::all();
        $solutionsByCat = $this->solByCategory();
        $solutionsBySub = $this->solBySubcategory();
        $solutionsByPlat = $this->solByPlatform();

        return view('admin.solutions', compact('categories'))->with('totalSolution',$total)
                                    ->with('byCat', $solutionsByCat)
                                    ->with('bySub', $solutionsBySub)
                                    ->with('byPlat', $solutionsByPlat);
    }

    public function solByCategory(){
        $categories = Categorie::all();
        $countCategory = '';
        $solutionsByCat = collect([]);
        foreach ($categories as $category) {
            $countCategory = Solution::where('categorie_id', $category->id)->count();
            $solutionsByCat->push(['name'=>$category->name, 'number'=>$countCategory]);
        }
        return $solutionsByCat;
    }
    public function solBySubcategory(){
        $subcategories = Subcategorie::all();
        $countSub = '';
        $solutionBySub = collect([]);
        foreach ($subcategories as $sub) {
            $countSub = Solution::where('subcategorie_id', $sub->id)->count();
            $solutionBySub->push(['name'=>$sub->name, 'number'=>$countSub]);
        }
        return $solutionBySub;
    }
    public function solByPlatform(){
        $platforms = Platform::all();
        $countPlat = '';
        $solutionByPlat = collect([]);
        foreach ($platforms as $plat) {
            $countPlat = Solution::where('platform_id', $plat->id)->count();
            $solutionByPlat->push(['name'=>$plat->name, 'number'=>$countPlat]);
        }
        return $solutionByPlat;
    }
}
