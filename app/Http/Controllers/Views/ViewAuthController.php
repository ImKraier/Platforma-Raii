<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
Use Mail;
use App\Mail\VerificationMail;

class ViewAuthController extends Controller
{
    public function viewLogin() {
        return view('pages.auth.login');
    }

    public function viewRegister() {
        return view('pages.auth.register');
    }

    public function verifyEmail()
    {
        $user = Auth::user();
        if($user->is_email_verified == 0) {
            if($user->is_email_verified != 1 && $user->email_token == null) {
                $token = RegisterController::generateRandomString(24);
                $user->email_token = $token;
                $user->save();
                $details = [
                    'target' => $user->uname,
                    'confirm_link' => route('app.email.confirmation', ['token' => $token]),
                ];
                Mail::to($user->email)->send(new VerificationMail($details, "Confirmă adresa de e-mail", "emails.verification"));
                return view('pages.auth.verify');
            } else if($user->is_email_verified != 1) {
                $token = $user->email_token;
                $details = [
                    'target' => $user->uname,
                    'confirm_link' => route('app.email.confirmation', ['token' => $token]),
                ];
                Mail::to($user->email)->send(new VerificationMail($details, "Confirmă adresa de e-mail", "emails.verification"));
                return view('pages.auth.verify');
            }
        }
        return redirect()->route('app.home');
    }

    public function confirmation($token) {
        $getUserByToken = User::where('email_token', $token)->first();
        if($getUserByToken != null) {
            User::where('id', $getUserByToken->id)->update([
                'is_email_verified' => '1'
            ]);;
            return view('pages.auth.emailVerified');
        }
        return redirect()->route('app.home');
    }
}
