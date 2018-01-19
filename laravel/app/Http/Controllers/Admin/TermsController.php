<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;

class TermsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTermsForm()
    {
        if (Terms::all()->isEmpty()) {
            // return the create form
            return view('admin.pages.terms.create', ['url' => 'terms']);
        }
        // return the editing form
        $terms = Terms::all()->first();
        return view('admin.pages.terms.edit', ['url' => 'terms', 'terms' => $terms]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'terms' => 'required'
        ]);
        if ($request->has('id')) {
            $term = Terms::find($request->input('id'));
            $term->terms = $request->input('terms');
            $term->save();
            return back()->with('success', 'Updated terms successfully');
        }
        Terms::create(['terms' => $request->input('terms')]);
        return redirect(route('admin.terms'))->with('success', 'created terms successfully');
    }
}
