<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Servers;
use App\Models\Bans;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ViewIndexController extends Controller
{
    public function view() {
        $servers = Servers::where('hide', 0)->get();
        $bansCount = Bans::count();
        $usersCount = User::count();
        $onlinePlayers = $servers->sum('onlineplayers');
        $topPlayers = User::orderBy('played_time', 'DESC')->limit(5)->get();
        $lastBans = Bans::orderBy('id', 'DESC')->limit(5)->get();
        $user = Auth::user();
        $items = Shop::get();
        return view('index', compact(['servers', 'bansCount', 'usersCount', 'onlinePlayers', 'topPlayers', 'lastBans', 'user', 'items']));
    }
}
