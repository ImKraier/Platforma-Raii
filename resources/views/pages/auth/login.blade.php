@extends('layouts.auth')
@section('main-container')
    <div class="d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-4" style="font-size: 38px; color: white;">RAII<b style="color: var(--primary-color);">.RO</b></h3>
            </div>
            <form method="POST" action="/login/validate" class="col-md-5 login-form m-auto">
                @csrf
                <h4>Logheaza-te</h4>
                <p class="m-0 text-muted mb-4">Nu ai un cont? <a class="text-decoration-none" href="{{ route('app.register') }}">Inregistreaza-te</a></p>
                <input type="text" class="custom-input mb-3" name="email" placeholder="Introduceti adresa de e-mail" autocomplete="off">
                <input type="password" class="custom-input mb-3" name="password" placeholder="Introduceti parola" autocomplete="off">
                <button type="submit" class="btn btn-primary w-100 text-white mb-3 py-3 text-uppercase">Logheaza-te</button>
                <a href="{{ route('app.register') }}" class="btn btn-secondary w-100 text-white mb-3 py-3 text-uppercase">Inregistreaza-te</a>
            </form>
        </div>
    </div>
@endsection
