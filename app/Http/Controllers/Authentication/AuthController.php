<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function employeeLogin()
    {
        return view('Auth.employeeLogin');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
