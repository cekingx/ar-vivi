<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Location::all();
        return view('pages.location.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('locations.create');
        return view('pages.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location;
        $location->nama_objek = $request->nama_objek;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();

        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $data = Location::find($location)->first();
        return view('pages.location.show')->with('lokasi', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $data = Location::find($location)->first();
        // return view('locations.edit')->with('location', $data);
        return view('pages.location.edit')->with('location', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $data = Location::find($location)->first();
        $data->nama_objek = $request->nama_objek;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->save();

        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $data = Location::find($location)->first();
        $data->delete();

        return redirect()->route('location.index');
    }

    public function api() {
        return Location::all();
    }
}
