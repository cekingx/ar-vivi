<?php

namespace App\Http\Controllers;

use App\ObjekAR;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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

        return view('pages.objek-ar.index')->with('objekAR', $data);
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
        $objekAR = ObjekAR::make(
            $request->only([
                'nama_objek',
                'description'
            ])
        );

        $file = $request->file('wto_file');
        $path = Storage::disk('gcs')->putFileAs('wto', $file, $request->nama_objek);

        return response(['path' => $path]);
        /* return redirect()->route('wto.index'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ObjekAR  $objekAR
     * @return \Illuminate\Http\Response
     */
    public function show(ObjekAR $objek_ar)
    {
        //
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
        $data->nama_objek = $request->nama_objek;
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
}
