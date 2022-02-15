<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewBansController extends Controller
{
    public function view() {
        return view('pages.bans');
    }
}
