<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QualityControl;

class QualityController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getQualityControlForm()
    {
        if (QualityControl::all()->isEmpty()) {
            // return the create form
            return view('admin.pages.quality-control.create', ['url' => 'quality']);
        }
        // return the editing form
        $quality = QualityControl::all()->first();
        return view('admin.pages.quality-control.edit', ['url' => 'quality', 'quality' => $quality]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'quality_control' => 'required'
        ]);
        if ($request->has('id')) {
            $quality = QualityControl::find($request->input('id'));
            $quality->quality_control = $request->input('quality_control');
            $quality->save();
            return back()->with('success', 'Updated quality control policy successfully');
        }
        QualityControl::create(['quality_control' => $request->input('quality_control')]);
        return redirect(route('admin.quality'))->with('success', 'created quality control policy successfully');
    }
}
