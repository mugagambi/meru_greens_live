<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Privacy;

class PrivacyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPrivacyForm()
    {
        if (Privacy::all()->isEmpty()) {
            // return the create form
            return view('admin.pages.privacy.create', ['url' => 'privacy']);
        }
        // return the editing form
        $privacy = Privacy::all()->first();
        return view('admin.pages.privacy.edit', ['url' => 'privacy', 'privacy' => $privacy]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'privacy' => 'required'
        ]);
        if ($request->has('id')) {
            $privacy = Privacy::find($request->input('id'));
            $privacy->privacy = $request->input('privacy');
            $privacy->save();
            return back()->with('success', 'Updated privacy policy successfully');
        }
        Privacy::create(['privacy' => $request->input('privacy')]);
        return redirect(route('admin.privacy'))->with('success', 'created privacy policy successfully');
    }
}
