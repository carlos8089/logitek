<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solution;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function getid(){
        $uid = Auth::id();
        return $uid;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sol = Solution::where('user_id', $this::getid())->get();
        $nbsol = $sol->count();
        return view('home')->with('nbsolutions',$nbsol);
    }
}
