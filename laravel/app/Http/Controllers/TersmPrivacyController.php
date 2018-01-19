<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;

class TersmPrivacyController extends Controller
{
    public function terms()
    {
        $terms = Terms::all()->first();
        return view('site.terms', ['terms' => $terms]);
    }
}
