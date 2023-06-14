<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class LandingController extends Controller
{
    public function index()
    {
        // mengambil data slider berstatus diterima
        $sliders = Slider::where('status', 'Diterima')->get();

        return view('landing', compact('sliders'));
    }
}
