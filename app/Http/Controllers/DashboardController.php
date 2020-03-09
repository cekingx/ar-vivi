<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __contruct() {
    //     $this->middleware('auth');
    // }

    public function index() {
        $count = Location::all()->count();
        return view('pages.dashboard')->with('count', $count);
    }
}
