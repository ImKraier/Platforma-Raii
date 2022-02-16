<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tickets;

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

    public function viewTickets() {
        $tickets = Tickets::orderBy('id', 'DESC')->get();
        return view('pages.admin.tickets', compact('tickets'));
    }

    public function viewManageTicket($ticket) {
        $ticket = Tickets::where('id', $ticket)->with('comments')->firstOrFail();
        return view('pages.admin.manageTicket', compact('ticket'));
    }
}
