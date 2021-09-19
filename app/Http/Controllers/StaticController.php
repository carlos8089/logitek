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

    public function solution($solution){
        $solutions = Solution::where('id',$solution)->get();
        $uid = $solutions->first();
        $users = User::where('id',$uid->user_id)->get();

        return view('solutionShow', compact('solutions','users'));
    }

    public function search(Request $request){
        $solution =$request->stsearch;
        $solutions = Solution::where('name', $solution)->get();
        $nbsol = $solutions->count();
        return view('result', compact('solutions', 'nbsol'));
    }
}
