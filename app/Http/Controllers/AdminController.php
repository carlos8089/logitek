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
        $countCategory = [];
        $categories = Categorie::all();
        //echo $categories->count();
        foreach ($categories as $category) {
            array_push($countCategory, [$category->name => $this->solByCategory($category->name)]);
        }
        //$counts = implode(",", $countCategory);
        print_r($countCategory);

        //return view('admin.solutions')->with('totalSolution',$total);
    }

    public function solByCategory($category){
        $solutions = Solution::where('category', $category)->get();
        return $solutions->count();
    }
}
