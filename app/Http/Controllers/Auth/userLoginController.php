<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class userLoginController extends Controller
{
    use AuthenticatesUsers;

    // Show the custom login form
    public function index()
    {
        return view('Auth.userLogin');
    }

    // Handle custom login
    public function __construct()
    {
        $this->middleware('auth');
    }
}
