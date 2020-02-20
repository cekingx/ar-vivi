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
        $location = Location::make(
            $request->only([
                'name',
                'description',
                'latitude',
                'longitude'
            ])
        );

        $location->verified = 'verified';
        $location->image = "xxx";
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
        // dd($data);
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
        $data->name = $request->name;
        $data->description = $request->description;
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

    public function createByUser() {
        return view('pages.location.create_by_user');
    }

    public function storeByUser(Request $request)
    {
        $location = Location::make(
            $request->only([
                'name',
                'description',
                'latitude',
                'longitude'
            ])
        );

        $location->verified = 'unverified';
        $location->image = "xxx";
        $location->save();

        return 'Oke';
    }

    public function verifyLocation(Location $location) {
        $data = Location::find($location)->first();
        $data->verified = 'verified';
        // dd($data);
        $data->save();

        return redirect()->route('location.index');
    }

    public function api() {
        return Location::where('verified', 'verified')->get();
    }
}
