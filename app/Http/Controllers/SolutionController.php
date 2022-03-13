<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Comment;
use App\Platform;
use App\Solution;
use App\Subcategorie;
use App\User;
use DateInterval;
use DatePeriod;
use DateTime;
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

    public static function getid()
    {
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
        $stats = $this->comments_stats(Solution::find($solution->id));

        return view('boSolutionShow', compact('solutions','users', 'screens'))->with('commentstats', $stats);
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

    public function comments_stats(Solution $solution)
    {
        $stats = collect();

        //number of comments
        $nb = $solution->comments()->count();
        $stats->push(['total', $nb]);

        //dates
        $created = new DateTime($solution->created_at->format('Y-m')) ;
        $today = new DateTime(today()->format('Y-m'));
        //echo $today->format('Y-m');
        $stats->push(['byMonth', $this->commentsStatByYear(new DateTime('2021-11-01'), new DateTime('2025-11-01'), $solution)]);

        return $stats;
    }

    public function commentsStatByDay($start, $end, Solution $solution)
    {
        $commentsByDay = collect();
        $intv = new DateInterval('P1D');
        $dateRange = new DatePeriod($start, $intv, $end);

        foreach ($dateRange as $date) {
            $comments_date = Comment::whereDate('created_at', $date->format('Y-m-d'))->where('solution_id', $solution->id)->count();
            $commentsByDay->push(['date', $date->format('Y-m-d')], ['number', $comments_date]);
        }

        return $commentsByDay;
    }

    public function commentsStatByMonth($start, $end, Solution $solution)
    {
        $commentsByMonth = collect();
        $intv = new DateInterval('P1M');
        $dateRange = new DatePeriod($start, $intv, $end);

        foreach ($dateRange as $date) {
            $comments_date = Comment::whereMonth('created_at', $date->format('m'))->where('solution_id', $solution->id)->count();
            $commentsByMonth->push(['month', $date->format('Y-m')], ['number', $comments_date]);
        }

        return $commentsByMonth;
    }

    public function commentsStatByYear($start, $end, SOlution $solution)
    {
        $commentsByYear = collect();
        $intv = new DateInterval('P1Y');
        $dateRange = new DatePeriod($start, $intv, $end);

        foreach ($dateRange as $date) {
            $comments_date = Comment::whereYear('created_at', $date->format('Y'))->where('solution_id', $solution->id)->count();
            $commentsByYear->push(['month', $date->format('Y')], ['number', $comments_date]);
        }

        return $commentsByYear;
    }
}
