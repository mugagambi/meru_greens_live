<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function save_message(Request $request)
    {
        \Log::error($request->input('_token'));
        $this->validate($request, [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        Contact::create([
            'name' => $request->input('name'),
            'subject' => $request->input('subject'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'read' => false
        ]);
        return response()->json();
    }
}
