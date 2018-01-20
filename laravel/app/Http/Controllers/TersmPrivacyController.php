<?php

namespace App\Http\Controllers;

use App\Terms;
use App\Privacy;

class TersmPrivacyController extends Controller
{
    public function terms()
    {
        $terms = Terms::all()->first();
        return view('site.terms', ['terms' => $terms]);
    }

    public function privacy()
    {
        $privacy = Privacy::all()->first();
        return view('site.privacy', ['privacy' => $privacy]);
    }
}
