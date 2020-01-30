<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadWtoController extends Controller
{
    public function index() {
        return view('pages.wto.index');
    }

    public function create() {
        return view('upload.create');
    }

    public function store(Request $request) {
        $file = $request->file('image');
        // dd($file->getCLientOriginalName());
        // Storage::disk('gcs')->put('test1', $file);
        Storage::disk('gcs')->putFileAs('test1', $file, $file->getCLientOriginalName());
        // dd($file);
    }

    public function serve() {
        $url = Storage::disk('gcs')->url('test1/file.pdf');
        $data = ['url' => $url];
        return $data;
    }
}
