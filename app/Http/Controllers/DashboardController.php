<?php

namespace App\Http\Controllers;

use App\Location;
use App\ObjekAR;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __contruct() {
    //     $this->middleware('auth');
    // }

    public function index() {
        $count_location= Location::all()->count();
        $count_objek_ar = ObjekAR::all()->count();
        return view('pages.dashboard')->with(
            [
                'count_location' => $count_location,
                'count_objek_ar' => $count_objek_ar
            ]
        );
    }
}
