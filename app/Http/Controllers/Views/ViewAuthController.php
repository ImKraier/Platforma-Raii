<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewAuthController extends Controller
{
    public function viewLogin() {
        return view('pages.auth.login');
    }

    public function viewRegister() {
        return view('pages.auth.register');
    }
}
