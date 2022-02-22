@extends('layouts.auth')
@section('main-container')
    <div class="d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="text-center">
                <h3 class="mb-4" style="font-size: 38px; color: white;">RAII<b style="color: var(--primary-color);">.RO</b></h3>
            </div>
            <div class="col-md-5 login-form m-auto p-5">
                <h4 class="mb-3">Adresa ta de e-mail a fost confirmata</h4>
                <p class="mb-3">Adresa ta de e-mail a fost confirmata cu succes, apasa pe butonul de mai jos pentru a te redirectiona pe pagina principala</p>
                <a href="{{route('app.home')}}" class="btn btn-primary w-100 text-white py-3 text-uppercase">Acasa</a>
            </div>
        </div>
    </div>
@endsection
