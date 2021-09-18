<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solution;
use App\User;

class StaticController extends Controller
{
    public function accueil(){
        $solutions = Solution::all();
        return view('accueil', compact('solutions'));
    }

    public function solution($id){
        $solutions = Solution::where('id',$id)->get();
        //$uid = $solutions->user_id;
        $users = User::where('id','1')->get();
        return view('solutionShow', compact('solutions'));
    }
}
