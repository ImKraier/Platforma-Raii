@extends('layouts.auth')
@section('main-container')
    <div class="d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-4" style="font-size: 38px; color: white;">RAII<b style="color: var(--primary-color);">.RO</b></h3>
            </div>
            <form method="POST" action="/register/validate" class="col-md-5 login-form m-auto p-5">
                @csrf
                <h4 class="mb-4">Inregistrare</h4>
                <input type="text" class="custom-input mb-3" name="uname" placeholder="Introduceti numele de utilizator">
                <input type="text" class="custom-input mb-3" name="email" placeholder="Introduceti adresa de e-mail">
                <input type="password" class="custom-input mb-3" name="upassword" placeholder="Introduceti parola">
                <input type="password" class="custom-input mb-4" name="repassword" placeholder="Reintroduceti parola">
                <button type="submit" class="btn btn-primary w-100 text-white mb-3">Inregistreaza-te</button>
            </form>
        </div>
    </div>
@endsection
