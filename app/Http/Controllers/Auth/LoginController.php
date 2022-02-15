<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request) {
        if ($request->validated()) {
            $user = User::where('email', $request->email)
                ->where('upassword', $request->password)
                ->first();

            if ($user) {
                Auth::login($user);
                toastr()->success('Te-ai autentificat cu succes');
                return redirect()->route('app.home');
            }

            toastr()->error('Ne pare rau dar a intervenit o eroare');
        }
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
