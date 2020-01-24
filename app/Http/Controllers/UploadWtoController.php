<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadWtoController extends Controller
{
    public function create() {
        return view('upload.create');
    }

    public function store(Request $request) {
        $file = $request->file('image');
        Storage::disk('gcs')->put('test', $file);
        // dd($file);
    }

    public function serve() {

    }
}
