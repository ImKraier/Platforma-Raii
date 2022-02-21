@extends('layouts.auth')
@section('main-container')
    <div class="d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-4" style="font-size: 38px; color: white;">RAII<b style="color: var(--primary-color);">.RO</b></h3>
            </div>
            <form method="POST" action="/register/validate" class="col-md-5 login-form m-auto">
                @csrf
                <h4>Inregistreaza-te</h4>
                <p class="m-0 text-muted mb-4">Ai deja un cont? <a class="text-decoration-none" href="{{ route('app.login') }}">Logheaza-te</a></p>
                <input type="text" class="custom-input mb-3" name="uname" placeholder="Introduceti numele de utilizator" autocomplete="off">
                <input type="text" class="custom-input mb-3" name="email" placeholder="Introduceti adresa de e-mail" autocomplete="off">
                <input type="password" class="custom-input mb-3" name="upassword" placeholder="Introduceti parola" autocomplete="off">
                <input type="password" class="custom-input mb-4" name="repassword" placeholder="Reintroduceti parola" autocomplete="off">
                <button type="submit" class="btn btn-primary w-100 text-white mb-3 py-3 text-uppercase">Inregistreaza-te</button>
                <button type="button" class="btn btn-secondary w-100 text-white mb-3 py-3 text-uppercase">Logheaza-te</button>
            </form>
        </div>
    </div>
@endsection
