<?php

namespace App\Http\Controllers;

use App\UserLocation;
use App\Location;
use Illuminate\Http\Request;

class UserLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserLocation::all();
        return view('pages.user-location.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user-location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = UserLocation::make(
            $request->only([
                'owner',
                'phone',
                'email',
                'nama_tempat',
                'description',
                'latitude',
                'longitude'
            ])
        );

        $location->image = "xxx";
        $location->save();

        return redirect()->route('user-location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserLocation $user_location)
    {
        $data = UserLocation::find($user_location)->first();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLocation $user_location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLocation $user_location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLocation $user_location)
    {
        //
    }

    public function verify(UserLocation $user_location) {
        $data = UserLocation::find($user_location)->first();

        $location = [
            'name' => $data->nama_tempat,
            'description' => $data->description,
            'latitude' => $data->latitude,
            'longitude' => $data->longitude,
            'image' => $data->image
        ];

        Location::create($location);
    }
}
