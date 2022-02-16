<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewAuthController extends Controller
{
    public function viewLogin() {
        return view('pages.auth.login');
    }

    public function viewRegister() {
        return view('pages.auth.register');
    }

    public function verifyEmail()
    {
        if(Auth::user()->verified_email != 1) return view('pages.auth.verify');
//        return dd(Auth::user()->verified_email);
    }
}
