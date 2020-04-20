<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ObjekAR;

class UploadWtoController extends Controller
{
    public function index() {
        $objekAR = ObjekAR::all();
        $url = Storage::disk('gcs')->url('wto/taman_ayun.wto');
        $data = ['url' => $url];
        return view('pages.wto.index')->with(['data' => $url, 'objekAR' =>$objekAR]);
    }

    public function create() {
        return view('pages.wto.create');
    }

    public function store(Request $request) {
        /* LOCAL */
        $file = $request->file('wto_file');
        Storage::disk('gcs')->putFileAs('wto', $file, $file->getCLientOriginalName());

        return redirect()->route('wto.index');

    }

    public function serve() {
        $url = Storage::disk('gcs')->url('wto/taman_ayun.wto');
        $data = ['url' => $url];
        return $data;
    }
}
