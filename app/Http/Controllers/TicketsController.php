<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketsRequest;
use App\Http\Requests\AdminTicketRequest;
use App\Models\User;
use App\Models\Tickets;
use App\Models\TicketComments;
use App\Mail\VerificationMail;
use Mail;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function viewApp() {
        $tickets = Tickets::where('author', Auth::id())->get();
        return view('pages.tickets.app', compact('tickets'));
    }

    public function createTicket(TicketsRequest $request) {
        if($request->validated()) {
            $create = Tickets::create($request->except('_token'));
            if($create) {
                $admins = User::where('admin_level', '>', 0)->get();
                foreach($admins as $admin) {
                    $details = [
                        'author_name' => $create->author_name,
                        'subject' => $create->title,
                        'link' => route('app.admin.ticket', ['ticket' => $create->id]),
                        'to_name' => $admin->uname,
                    ];
                    Mail::to($admin->email)->send(new VerificationMail($details, "Un nou tichet a fost trimis", "emails.new_ticket"));
                }
                toastr()->success('Ai creat cu succes un tichet de suport');
            }
        }
        return redirect()->back();
    }

    public function sendComment(AdminTicketRequest $request) {
        if($request->validated()) {
            $create = TicketComments::create($request->except('_token'));
            $ticket = Tickets::where('id', $request->ticket_id)->first();
            if($create) {
                if(Auth::id() == $ticket->author && $ticket->taken_by != null) {
                    $email = $ticket->taken_by_email;
                    if($email != 'Nimic') {
                        $details = [
                            'author' => $ticket->taken_by_name,
                            'title' => $ticket->title,
                            'link' => route('app.admin.ticket', ['ticket' => $ticket->id])
                        ];
                        Mail::to($email)->send(new VerificationMail($details, "Ai primit un raspuns la tichetul {$ticket->title}", "emails.new_comment"));
                        toastr()->success('Ai trimis cu succes un nou comentariu');
                    }
                } else {
                    $email = $ticket->author_email;
                    if($email != 'Nedefinit') {
                        $ticket->taken_by = Auth::id();
                        $ticket->save();
                        $details = [
                            'author' => $ticket->author_name,
                            'title' => $ticket->title,
                            'link' => route('app.manage.ticket', ['id' => $ticket->id])
                        ];
                        Mail::to($email)->send(new VerificationMail($details, "Ai primit un raspuns la tichetul {$ticket->title}", "emails.new_comment"));
                        toastr()->success('Ai trimis cu succes un nou comentariu');
                    }
                }
            }
        }
        return redirect()->back();
    }

    public function manageTicket($id) {
        $ticket = Tickets::where('id', $id)->with('comments')->firstOrFail();
        if($ticket->author == Auth::id() || Auth::user()->admin_level > 0) {
            return view('pages.tickets.manageTicket', compact('ticket'));
        } else {
            return redirect()->route('app.home');
        }
    }

    public function closeTicket($id) {
        $ticket = Tickets::where('id', $id)->firstOrFail();
        if($ticket->author == Auth::id() || Auth::user()->admin_level > 0 || $ticket->status != 1) {
            $ticket->status = 1;
            $ticket->save();
            toastr()->success('Ai inchis cu succes tichetul');
            return redirect()->route('app.tickets');
        } else {
            toastr()->error('Nu poti face asta.');
        }
        return redirect()->back();
    }

    public function deleteTicket($id) {
        $ticket = Tickets::find($id)->with('comments')->firstOrFail();
        $ticket->comments()->delete();
        $ticket->delete();
        toastr()->success('Ai sters cu succes tichetul');
        return redirect()->route('app.admin.tickets');
    }
}
