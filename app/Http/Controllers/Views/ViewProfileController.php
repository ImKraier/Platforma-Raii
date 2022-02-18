<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reports;
use App\Models\Tickets;

class ViewProfileController extends Controller
{
    public function viewProfile() {
        $getUser = User::where('id', Auth::id())->first();
        $reports = Reports::where('author', Auth::id())->get();
        $tickets = Tickets::where('author', Auth::id())->get();
        return view('pages.profile.profile', compact(['getUser', 'reports', 'tickets']));
    }

    public function viewUserProfile($user) {
        $getUser = User::where('id', $user)->first();
        $reports = Reports::where('author', $user)->get();
        $tickets = Tickets::where('author', $user)->get();
        return view('pages.profile.profile', compact(['getUser', 'reports', 'tickets']));
    }
}
