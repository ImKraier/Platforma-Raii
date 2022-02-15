<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bans;

class ViewBansController extends Controller
{
    public function view() {
        $bans = Bans::orderBy('id', 'DESC')->get();
        return view('pages.bans', compact('bans'));
    }
}
