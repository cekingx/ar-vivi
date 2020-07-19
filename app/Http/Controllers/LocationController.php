<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $location->image = "xxx";
        $location->save();

        $file = $request->file('foto');
        $filePath = Storage::disk('gcs')->put('foto', $file);
        $url = Storage::disk('gcs')->url($filePath);

        $location->image = $url;
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
        // return $location;
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
        $data->name = $request->name;
        $data->description = $request->description;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->save();

        return redirect()->route('location.index');
    }

    public function editImage(Location $location) {
        $data = Location::find($location)->first();
        return view('pages.location.edit-image')->with('location', $data);
    }

    public function updateImage(Request $request, Location $location)
    {
        $data = Location::find($location)->first();

        $file = $request->file('foto');
        $filePath = Storage::disk('gcs')->put('foto', $file);
        $url = Storage::disk('gcs')->url($filePath);

        $data->image = $url;
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

    // public function verifyLocation(Location $location) {
    //     $data = Location::find($location)->first();
    //     $data->verified = 'verified';
    //     // dd($data);
    //     $data->save();

    //     return redirect()->route('location.index');
    // }

    public function api() {
        return Location::all();
    }

    public function object() {
        return response([
            [
                'id' => 1,
                'name' => 'teather',
                'description' => 'teather di taman ayun'
            ],
            [
                'id' => 2,
                'name' => 'bale',
                'description' => 'bale di taman ayun'
            ],
            [
                'id' => 3,
                'name' => 'PaduRaksa',
                'description' => 'PaduRaksa di taman ayun'
            ],
        ]);
    }
}
