<?php

namespace App\Http\Controllers;

use App\Couresel;
use App\AboutUs;
use App\Service;
use App\SubCategory;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Couresel::all();
        $about_us = AboutUs::select('synopsis')->first();
        $fruits = SubCategory::where('category', 'Fruits')
            ->limit(6)->get();
        $vegs = SubCategory::where('category', 'Vegetables')
            ->limit(6)->get();
        $services = Service::all();
        return view('site.index', ['url' => 'home', 'sliders' => $sliders,
            'about_us' => $about_us, 'fruits' => $fruits, 'vegs' => $vegs,
            'services' => $services]);
    }

    public function contact()
    {
        return view('site.contact');
    }
}
