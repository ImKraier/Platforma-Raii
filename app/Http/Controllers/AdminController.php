<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function viewUsers() {
        $users = User::get();
        return view('pages.admin.users', compact('users'));
    }

    public function viewManageUser($user) {
        $getUser = User::where('id', $user)->firstOrFail();
        return view('pages.admin.manageUser', compact('getUser'));
    }
}
