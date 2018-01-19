<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pages.users', ['users' => $users, 'url' => 'users']);
    }
}
