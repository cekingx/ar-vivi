<?php

namespace App\Http\Controllers;

use App\UserLocation;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $file = $request->file('foto');
        $filePath = Storage::disk('gcs')->put('foto', $file);
        $url = Storage::disk('gcs')->url($filePath);

        $location->image = $url;
        $location->save();
        return redirect()->route('user-location.create')->with('status', 'Data berhasil disimpan');
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
        $data = UserLocation::find($user_location)->first();
        $data->delete();

        return redirect()->route('user-location.index')->with('delete', 'Data dihapus');
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
        $data->delete();

        return redirect()->route('user-location.index')->with('status', 'Sukses Verifikasi');
    }
}
