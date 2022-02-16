@extends('layouts.auth')
@section('main-container')
    <div class="d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-4" style="font-size: 38px; color: white;">RAII<b style="color: var(--primary-color);">.RO</b></h3>
            </div>
            <div class="col-md-5 login-form m-auto p-5">
                <h4 class="mb-3">Verifică adresa de e-mail</h4>
                <p class="mb-3">Un e-mail a fost trimis către adresa <strong>{{Auth::user()->email}}</strong>, verifică adresa de e-mail pentru mai multe informații.</p>
                <p class="mb-3">In cazul in care nu ai primit nici un e-mail, apasa pe buton de mai jos pentru a retrimite.</p>
                <button type="submit" class="btn btn-primary w-100 text-white">Retrimite</button>
            </div>
        </div>
    </div>
@endsection
