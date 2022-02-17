<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ViewProfileController extends Controller
{
    public function viewProfile() {
        $user = User::where('id', Auth::id())->first();
        return view('pages.profile.profile', compact('user'));
    }

    public function viewUserProfile($user) {
        $getUser = User::where('id', $user)->first();
        return view('pages.profile.userProfile', compact('getUser'));
    }
}
