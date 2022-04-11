<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reports;
use App\Models\Tickets;
use App\Models\Bans;
use App\Http\Requests\DescriptionRequest;

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

    public function addDescription(DescriptionRequest $request) {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->id == Auth::user()->id && $user->admin_level == 0) {
            switch ($request->input('action')) {
                case 'add':
                    $user->profile_description = $request->profile_description;
                    $user->save();
                    return redirect()->back();
                case 'remove':
                    $user->profile_description = 'NONE';
                    $user->save();
                    return redirect()->back();
            }
        } elseif(Auth::user()->admin_level > 0) {
            $user = User::where('id', $request->userId)->first();
            switch ($request->input('action')) {
                case 'add':
                    $user->profile_description = $request->profile_description;
                    $user->save();
                    return redirect()->back();
                case 'remove':
                    $user->profile_description = 'NONE';
                    $user->save();
                    return redirect()->back();
            }
        }
    }
}
