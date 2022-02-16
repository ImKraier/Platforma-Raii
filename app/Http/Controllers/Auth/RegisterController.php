<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerificationMail;
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
            $create = User::create($request->except(['_token', 'repassword']));
            if ($create) {
                $token = self::generateRandomString(24);
                Auth::login($create);
                $create->email_token = $token;
                $create->save();
                $details = [
                    'target' => $request->uname,
                    'confirm_link' => route('app.email.confirmation', ['token' => $token]),
                ];
                Mail::to($request->email)->send(new VerificationMail($details, "Confirmă adresa de e-mail", "emails.verification"));
                toastr()->success('Te-ai inregistrat cu success!');
            }
        }
        return redirect('/');
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
