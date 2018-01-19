<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;
// trying to close issue
class CareersController extends Controller
{
    public function index()
    {
        $jobs = Career::all();
        return view('site.jobs', ['jobs' => $jobs]);
    }

    public function job(Career $job)
    {
        return view('site.job', ['job' => $job]);
    }
}
