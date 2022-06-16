<?php

namespace App\Http\Controllers;

use App\User;
use App\Solution;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::paginate(7);
        $countUser = User::all()->count();
        //$users = User::paginate(6);
        $solutionByUser = $this->solByUser();

        return view('admin.users.users', compact('users'))->with('nbUser', $countUser)
                                                            ->with('byUser', $solutionByUser);
    }

    public function solByUser(){
        //Nombre de solutions pour chaque utilisateurs
        $users = User::paginate(7);
        $countUsers = '';
        $solutionByUser = collect([]);
        foreach ($users as $user) {
            $countUsers = Solution::where('user_id', $user->id)->count();
            $solutionByUser->push(['name' => $user->name,'country'=>$user->country->name, 'number' => $countUsers]);
        }
        return $solutionByUser;
    }
}
