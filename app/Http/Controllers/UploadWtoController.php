<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadWtoController extends Controller
{
    public function index() {
        $url = Storage::disk('gcs')->url('wto/taman_ayun.wto');
        $data = ['url' => $url];
        return view('pages.wto.index')->with('data', $url);
    }

    public function create() {
        return view('pages.wto.create');
    }

    public function store(Request $request) {
        $file = $request->file('wto_file');
        // dd($file->getCLientOriginalName());
        // Storage::disk('gcs')->put('test1', $file);
        Storage::disk('gcs')->putFileAs('wto', $file, $file->getCLientOriginalName());
        return redirect()->route('wto.index');
        // dd($file);
    }

    public function serve() {
        $url = Storage::disk('gcs')->url('wto/taman_ayun.wto');
        $data = ['url' => $url];
        return $data;
    }
}
