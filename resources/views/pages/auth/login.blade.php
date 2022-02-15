@extends('layouts.auth')
@section('main-container')
    <div class="d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-4" style="font-size: 38px; color: white;">RAII<b style="color: var(--primary-color);">.RO</b></h3>
            </div>
            <form method="POST" action="/login/validate" class="col-md-5 login-form m-auto p-5">
                @csrf
                <h4 class="mb-4">Autentificare</h4>
                <input type="text" class="custom-input mb-3" name="email" placeholder="Introduceti adresa de e-mail">
                <input type="password" class="custom-input mb-4" name="password" placeholder="Introduceti parola">
                <button type="submit" class="btn btn-primary w-100 text-white mb-3">Logheaza-te</button>
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-start align-items-center">
                        <a class="text-second" href="#">Am uitat parola</a>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <a class="text-second" href="/register">Nu am un cont</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
