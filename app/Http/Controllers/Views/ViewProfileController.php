<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reports;
use App\Models\Tickets;
use App\Models\Bans;

class ViewProfileController extends Controller
{
    public function viewProfile() {
        return redirect()->route('app.profile.user', ['userId' => Auth::id()]);
    }

    public function viewUserProfile($userId) {
        $user = User::where('id', $userId)->first();
        $reports = Reports::where('author', $userId)->get();
        $tickets = Tickets::where('author', $userId)->get();
        $isUserBanned = false;
        if(Bans::where('victim_steamid', 'LIKE', "%{$user->authid}%")->orWhere('victim_steamid', 'LIKE', "%{$user->ip}%")->count() > 0) {
            $isUserBanned = true;
        }
        return view('pages.profile.userProfile', compact(['user', 'reports', 'tickets', 'isUserBanned']));
    }
}
