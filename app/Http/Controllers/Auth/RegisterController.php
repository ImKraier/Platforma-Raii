<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class RegisterController extends Controller
{
    private function existsUser(string $email)
    {
        try {
            $user = User::select('id', 'email')->where('email', $email)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return false;
        }

        if ($user) {
            return true;
        }
        return false;
    }

    public function register(RegisterRequest $request) {
        if ($request->validated()) {
            if ($this->existsUser($request->email)) {
                toastr()->error('Acest e-email este deja folosit');
                return redirect()->back();
            }

            $create = User::create($request->except(['_token', 'repassword']));
            if ($create) {
                Auth::login($create);
                toastr()->success('Te-ai inregistrat cu success!');
            }
//            self::sendVerificationEmail($request->email);
        }
        return redirect('/');
    }

    public function sendVerificationEmail($email) {
        $to_email = $email;
        $details = [
            'title' => 'Verification - Raii.ro',
            'body' => 'test'
        ];

        Mail::to($to_email)->send(new \App\Mail\VerificationMail($details));
    }


}
