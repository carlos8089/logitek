<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOsRequest;
use App\Http\Requests\UpdateOsRequest;
use App\Os;
use App\Platform;

class OsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = Platform::all();
        $ungroupedOs= Os::all();
        $oses = $ungroupedOs->sortBy('platform_id');
        return view('admin.os', compact('platforms', 'oses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOsRequest $request)
    {
        $os = new Os();
        $os->name = $request->name;
        $os->platform_id = $request->platform;
        $os->save();
        return redirect(url('/admin/os'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Os  $os
     * @return \Illuminate\Http\Response
     */
    public function show(Os $os)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Os  $os
     * @return \Illuminate\Http\Response
     */
    public function edit(Os $os)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOsRequest  $request
     * @param  \App\Os  $os
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOsRequest $request, Os $os)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Os  $os
     * @return \Illuminate\Http\Response
     */
    public function destroy(Os $os)
    {
        //
    }
}
