<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.mailbox.index', ['url' => 'mailbox']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $mailbox)
    {
        $mailbox->read = true;
        $mailbox->save();
        return view('admin.pages.mailbox.show', ['url' => 'mailbox', 'message' => $mailbox]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
