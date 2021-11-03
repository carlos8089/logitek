<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Platform;
use App\Solution;
use App\Subcategorie;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class SolutionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'delete']]);
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    public static function getid(){
        $uid = Auth::id();
        return $uid;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $solutions = Solution::where('user_id', $this->getid())->paginate(20);
        return view('boSolutionIndex', compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $subcategories = Subcategorie::all();
        $platforms = Platform::all();

        return view('boSolutionCreate', compact('categories','subcategories','platforms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
        $solution = new Solution;
        $solution->user_id = $this->getid();
        $solution->name = $request->name;
        $solution->category = $request->category;
        $solution->subcategory = $request->subcategory;
        $solution->platform = $request->platform;
        $solution->os = $request->os;
        $solution->desc = $request->desc;
        $solution->site = $request->site;
        $solution->sellable = $request->sellable;
        $solution->currency = $request->currency;
        $solution->amount = $request->amount;
        //Save screenshots
        if ($request->file !== 'null') {
            # code...
            $paths = [];
        $files = $request->file('screens');
        foreach ($files as $file) {
            $path = $file->storePublicly('images', 'public');
            array_push($paths, $path);
        }
        //serialize screenshots paths to make them storable
        $solution->screens = serialize($paths);
        } else {
            # code...
        }
        $solution->save();

        return redirect(route('solutions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        $solutions = Solution::where('id',$solution->id)->get();
        $users = User::where('id',$solution->user_id)->get();
        $sol = $solutions->first();
        //unserialize screenshots paths
        $screens = unserialize($sol->screens, ['allowed_classes' => false]);

        return view('boSolutionShow', compact('solutions','users', 'screens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function edit($solution)
    {
        return view('boSolutionEdit')->with('sol',$solution);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $solution)
    {
        $sol = Solution::find($solution);
        $sol->name = $request->name;
        $sol->save();

        return redirect()->route('solutions.show', $solution);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy($solution)
    {
        $sol = Solution::find($solution);
        $sol->delete();

        return redirect()->route('solutions.index');
    }
}
