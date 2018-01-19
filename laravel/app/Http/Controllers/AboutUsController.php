<?php

namespace App\Http\Controllers;

use App\CSR;
use App\Team;
use Illuminate\Http\Request;
use App\AboutUs;
use App\QualityControl;

class AboutUsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $about_us = AboutUs::first();
        return view('site.about-us', ['url' => 'about', 'about' => $about_us]);
    }

    public function team()
    {
        $members = Team::all();
        return view('site.team', ['url' => 'about', 'members' => $members]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function csr()
    {
        $csr = CSR::all()->first();
        return view('site.csr', ['url' => 'about', 'csr' => $csr]);
    }

    public function quality_control()
    {
        $quality = QualityControl::all()->first();
        return view('site.quality', ['quality' => $quality]);
    }
}
