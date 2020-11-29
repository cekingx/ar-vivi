<?php

namespace App\Http\Controllers;

use App\ObjekAR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ObjekARController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ObjekAR::all();

        /* return response($data); */
        return view('pages.objek-ar.index')->with(['objekAR' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.objek-ar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $raw_file = $request->file('audio');
        $file = new File($raw_file);

        $objekAR = ObjekAR::make(
            $request->only([
                'nama',
                'name',
                'deskripsi',
                'description'
            ])
        );
        $objekAR->audio = Storage::disk('gcs')->url('audio/sample.mp3');
        $objekAR->save();

        $fileName = $objekAR->nama . $objekAR->id . '.' . $raw_file->getClientOriginalExtension();
        $filePath = 'audio/' . $fileName;
        Storage::disk('gcs')->putFileAs('audio', $file, $fileName);
        $audioUrl = Storage::disk('gcs')->url($filePath);
        $objekAR->audio = $audioUrl;
        $objekAR->save();

        return redirect()->route('wto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ObjekAR  $objekAR
     * @return \Illuminate\Http\Response
     */
    public function show(ObjekAR $objek_ar)
    {
        $data = ObjekAR::find($objek_ar)->first();
        // return $data;
        return view('pages.objek-ar.show')->with('objekAR', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ObjekAR  $objekAR
     * @return \Illuminate\Http\Response
     */
    public function edit(ObjekAR $objek_ar)
    {
        $data = ObjekAR::find($objek_ar)->first();
        // return $data;
        return view('pages.objek-ar.edit')->with('objekAR', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ObjekAR  $objekAR
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObjekAR $objek_ar)
    {
        $data = ObjekAR::find($objek_ar)->first();
        $data->nama = $request->nama;
        $data->name = $request->name;
        $data->deskripsi = $request->deskripsi;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('wto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ObjekAR  $objekAR
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObjekAR $objek_ar)
    {
        $data = ObjekAR::find($objek_ar)->first();
        $data->delete();

        return redirect()->route('wto.index');
    }

    public function api()
    {

        $data = ObjekAR::all();

        return response($data);
    }
}
