@extends('layouts.main')
@section('main-container')
    <div class="border border-color rounded-3 p-4">
        <div class="d-flex justify-content-start align-items-end position-relative">
            <div class="profile-cover">
                <img src="{{ asset('assets/images/profile_cover.png') }}">
            </div>
            <div class="d-flex flex-column align-items-center m-4 profile-bg shadow-lg p-4">
                <img class="rounded-3" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="kraier" height="100">
                <h5 class="m-0 mt-3">kraier</h5>
                <p class="m-0 text-second">Developer</p>
            </div>
            <div class="row w-50 py-4">
                <div class="col-md-4">
                    <div class="profile-stats d-flex justify-content-center align-items-center flex-column p-3">
                        <p class="m-0">Puncte</p>
                        <h5 class="m-0">100</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-stats d-flex justify-content-center align-items-center flex-column p-3">
                        <p class="m-0">Kills</p>
                        <h5 class="m-0">100</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-stats d-flex justify-content-center align-items-center flex-column p-3">
                        <p class="m-0">Deaths</p>
                        <h5 class="m-0">100</h5>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 settings-btn m-4">
                <div class="dropdown">
                    <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fal fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Baneaza</a></li>
                        <li><a class="dropdown-item" href="#">Adauga puncte</a></li>
                        <li><a class="dropdown-item" href="#">Schimba nume</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <p class="mb-2">Nume cont: kraier</p>
                <p class="mb-2">SteamID: kraier</p>
                <p class="mb-2">E-mail: kraier</p>
                <p class="mb-2">Puncte: kraier</p>
                <p class="m-0">Timp jucat: kraier</p>
            </div>
            <div class="col-md-6">
                <p class="mb-2">Ultima logare pe CS 1.6: kraier</p>
                <p class="mb-2">Ultima logare pe CS:GO: kraier</p>
                <p class="mb-2">Vip Level: kraier</p>
            </div>
        </div>
    </div>
@endsection
