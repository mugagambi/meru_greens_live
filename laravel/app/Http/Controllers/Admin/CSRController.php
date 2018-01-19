<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CSR;

class CSRController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCSRForm()
    {
        if (CSR::all()->isEmpty()) {
            // return the create form
            return view('admin.pages.csr.create', ['url' => 'csr']);
        }
        // return the editing form
        $csr = CSR::all()->first();
        return view('admin.pages.csr.edit', ['url' => 'csr', 'csr' => $csr]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'csr' => 'required'
        ]);
        if ($request->has('id')) {
            $csr = CSR::find($request->input('id'));
            $csr->csr = $request->input('csr');
            $csr->save();
            return back()->with('success', 'Updated csr successfully');
        }
        CSR::create(['csr' => $request->input('csr')]);
        return redirect(route('admin.csr'))->with('success', 'created csr successfully');
    }
}
