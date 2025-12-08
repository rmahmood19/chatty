<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotIn('id', [auth()->user()->id])->get();

        return response()->json($users);
    }
}
