@extends('layouts.main')
@section('main-container')
    <div class="border border-color rounded-3 p-4">
        <div class="d-flex justify-content-start align-items-end position-relative">
            <div class="profile-cover">
                <img src="{{ asset('assets/images/profile_cover.png') }}">
            </div>
            <div class="d-flex flex-column align-items-center m-4 profile-bg shadow-lg p-4">
                <img class="rounded-3" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="kraier" height="100">
                <h5 class="m-0 mt-3">{{ $getUser->uname }}</h5>
                <p class="m-0 text-second">{{ $getUser->vip_tag }}</p>
            </div>
            <div class="row w-50 py-4">
                <div class="col-md-4">
                    <div class="profile-stats d-flex justify-content-center align-items-center flex-column p-3">
                        <p class="m-0">Puncte</p>
                        <h5 class="m-0">{{ $getUser->cs_points + $getUser->csgo_points }}</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-stats d-flex justify-content-center align-items-center flex-column p-3">
                        <p class="m-0">K/D</p>
                        <h5 class="m-0">100</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-stats d-flex justify-content-center align-items-center flex-column p-3">
                        <p class="m-0">Rating</p>
                        <h5 class="m-0">100</h5>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 settings-btn m-4">
                <div class="d-flex">
                    <button class="btn bg-success border-success me-2"><i class="fas fa-thumbs-up"></i></button>
                    <button class="btn bg-danger border-danger me-2"><i class="fas fa-thumbs-down"></i></button>
                    @if(Auth::user()->admin_level > 0)
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fal fa-cog"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Baneaza</a></li>
                            @if(Auth::user()->admin_level > 1)
                            <li><a class="dropdown-item" href="#">Adauga puncte</a></li>
                            <li><a class="dropdown-item" href="#">Schimba nume</a></li>
                            @endif
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="profile-left text-center">
                    <h6 class="m-0 border border-color p-3 profile-left-header">Despre {{ $getUser->uname }}</h6>
                    <div class="text-start p-2 pb-0">
                        <p class="profile-left-header mb-2 mt-2">Nume cont: {{ $getUser->uname }}</p>
                        <p class="profile-left-header mb-2">SteamID: {{ $getUser->last_authid }}</p>
                        <p class="profile-left-header mb-2">E-mail: {{ $getUser->email }}</p>
                        <p class="profile-left-header mb-2">Puncte: {{ $getUser->cs_points + $getUser->csgo_points }}</p>
                        <p class="profile-left-header mb-2">Timp jucat: {{round($getUser->played_time / 3600, 2, PHP_ROUND_HALF_UP)}}h</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="border border-color rounded-3">
                    <div class="border-bottom border-color p-4">
                        <h6 class="m-0">Rapoartele lui {{ $getUser->uname }}</h6>
                    </div>
                    <div class="kraier-body">
                        @if(count($reports) > 0)
                        @foreach($reports as $report)
                        <div class="kraier-card-section p-4 border-bottom border-color">
                            <div class="d-flex align-items-center justify-content-between kraier-mobile">
                                <div class="d-flex align-items-center">
                                    <i class="fal fa-user me-4 fs-2 icon-style"></i>
                                    <div class="server-width">
                                        <h5 class="mb-1">Report #{{$report->id}}</h5>
                                        <p class="m-0 text-second" >Rezolvat de: {{$report->solved_by_name}}</p>
                                    </div>
                                </div>
                                @if($report->status == 0)
                                <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                                    <div class="d-flex align-items-center flex-column">
                                        <i class="fal fa-check-circle icon-style fs-2 mb-2"></i>
                                    </div>
                                    <p class="m-0">Deschis</p>
                                </div>
                                @elseif($report->status == 1)
                                <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                                    <div class="d-flex align-items-center flex-column">
                                        <i class="fal fa-times-circle icon-style fs-2 mb-2"></i>
                                    </div>
                                    <p class="m-0">Inchis</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @else
                            <div class="kraier-card-section p-4 border-bottom border-color">
                                {{ $getUser->uname }} nu are nici un report.
                            </div
                        @endif
                    </div>
                </div>
                <div class="border border-color rounded-3 mt-3">
                    <div class="border-bottom border-color p-4">
                        <h6 class="m-0">Tichetele lui {{ $getUser->uname }}</h6>
                    </div>
                    <div class="kraier-body">
                        @if(count($tickets) > 0)
                        @foreach($tickets as $ticket)
                            <div class="kraier-card-section p-4 border-bottom border-color">
                                <div class="d-flex align-items-center justify-content-between kraier-mobile">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-user me-4 fs-2 icon-style"></i>
                                        <div class="server-width">
                                            <h5 class="mb-1">Tichet #{{$ticket->id}}</h5>
                                            <p class="m-0 text-second" >Rezolvat de: {{$ticket->solved_by_name}}</p>
                                        </div>
                                    </div>
                                    @if($ticket->status == 0)
                                        <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                                            <div class="d-flex align-items-center flex-column">
                                                <i class="fal fa-check-circle icon-style fs-2 mb-2"></i>
                                            </div>
                                            <p class="m-0">Deschis</p>
                                        </div>
                                    @elseif($ticket->status == 1)
                                        <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                                            <div class="d-flex align-items-center flex-column">
                                                <i class="fal fa-times-circle icon-style fs-2 mb-2"></i>
                                            </div>
                                            <p class="m-0">Inchis</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        @else
                            <div class="kraier-card-section p-4 border-bottom border-color">
                                {{ $getUser->uname }} nu are nici un tichet.
                            </div
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
