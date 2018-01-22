<?php

namespace App\Http\Controllers;

use App\Couresel;
use App\AboutUs;
use App\Service;
use App\Product;


class IndexController extends Controller
{
    public function index()
    {
        $sliders = Couresel::all();
        $about_us = AboutUs::select('synopsis')->first();
        $fruits = Product::where('category', 'Fruits')
            ->limit(4)->get();
        $vegs = Product::where('category', 'Vegetables')
            ->limit(4)->get();
        $others = Product::where('category', 'Others')
            ->limit(4)->get();
        $services = Service::all();
        return view('site.index', ['url' => 'home', 'sliders' => $sliders,
            'about_us' => $about_us, 'fruits' => $fruits, 'vegs' => $vegs, 'others' => $others,
            'services' => $services]);
    }

    public function contact()
    {
        return view('site.contact');
    }
}
