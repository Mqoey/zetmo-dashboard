<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Loadshedding;
use App\Models\Municipality;
use App\Models\Stage;
use Illuminate\Http\Request;

class LoadsheddingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('loadshedding.index')
        ->with('loadsheddings', Loadshedding::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loadshedding.create')
        ->with('areas', "")
        ->with('municipalities', Municipality::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area_id = $request->area_id;
        $municipality_id = $request->municipality_id;

        if (!$area_id) {
            $areas = Area::where('municipality_id', $municipality_id)->get();
            $municipality = Municipality::where('id', $municipality_id)->first();
            return view('loadshedding.create')
                ->with('municipality', $municipality)
                ->with('stages', Stage::all())
                ->with('areas', $areas);
        }

        if (Loadshedding::create($request->all())) {
            return back()->with('success', "Load shed has been added!!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loadshedding  $loadshedding
     * @return \Illuminate\Http\Response
     */
    public function show(Loadshedding $loadshedding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loadshedding  $loadshedding
     * @return \Illuminate\Http\Response
     */
    public function edit(Loadshedding $loadshedding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loadshedding  $loadshedding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loadshedding $loadshedding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loadshedding  $loadshedding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loadshedding $loadshedding)
    {
        //
    }
}
