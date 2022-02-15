@extends('layouts.main')
@section('main-container')
<div class="row">
    <div class="col-md-3">
        <div class="border border-color p-4 rounded-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="m-0">{{$onlinePlayers}}</h4>
                    <p class="m-0">Jucatori Online</p>
                </div>
                <i class="fal fa-users fs-3 icon-style"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="border border-color p-4 rounded-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="m-0">{{$bansCount}}</h4>
                    <p class="m-0">Toate ban-urile</p>
                </div>
                <i class="fal fa-ban fs-3 icon-style"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="border border-color p-4 rounded-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="m-0">{{$usersCount}}</h4>
                    <p class="m-0">Utilizatori înregistrați</p>
                </div>
                <i class="fal fa-user-check fs-3 icon-style"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="border border-color p-4 rounded-3 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="m-0">12</h4>
                    <p class="m-0">Total administratori</p>
                </div>
                <i class="fal fa-user-crown fs-3 icon-style"></i>
            </div>
        </div>
    </div>
</div>
<h5 class="mt-1 mb-4">Welcome back, {{ Auth::user()->uname }}</h5>
<div class="border border-color rounded-3">
    <div class="border-bottom border-color p-4">
        <h6 class="m-0">Serverele Noastre</h6>
    </div>
    <div class="kraier-body">
        @foreach($servers as $server)
        <div class="kraier-card-section p-4 border-bottom border-color">
            <div class="d-flex align-items-center justify-content-between kraier-mobile">
                <div class="d-flex align-items-center">
                    <i class="fal fa-server me-4 fs-2 icon-style"></i>
                    <div class="server-width">
                        <h5 class="mb-1">{{$server->hostname}}</h5>
                        <p role="button" class="m-0 text-second serverip" >{{$server->ipaddress}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                    <div class="d-flex align-items-center flex-column">
                        <i class="fal fa-users icon-style fs-2 mb-2"></i>
                    </div>
                    <p class="m-0">{{$server->onlineplayers}}/{{$server->maxplayers}}</p>
                </div>
                <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                    <div class="d-flex align-items-center flex-column">
                        <i class="fal fa-map-marked-alt icon-style fs-2 mb-2"></i>
                    </div>
                    <p class="m-0">{{$server->currentmap}}</p>
                </div>
                <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                    <div class="d-flex align-items-center flex-column">
                        <i class="fal fa-map icon-style fs-2 mb-2"></i>
                    </div>
                    <p class="m-0">{{$server->nextmap}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="border border-color rounded-3">
            <div class="border-bottom border-color p-4">
                <h6 class="m-0">Topul jucatorilor</h6>
            </div>
            <div class="kraier-body">
                @foreach($topPlayers as $topPlayer)
                <div class="kraier-card-section p-4 border-bottom border-color">
                    <div class="d-flex align-items-center justify-content-between kraier-mobile">
                        <div class="d-flex align-items-center">
                            <i class="fal fa-user me-4 fs-2 icon-style"></i>
                            <div>
                                <h5 class="mb-1">{{$topPlayer->uname}}</h5>
                                <p class="m-0 text-second" >{{$topPlayer->authid}}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                            <div class="d-flex align-items-center flex-column">
                                <i class="fal fa-clock icon-style fs-2 mb-2"></i>
                            </div>
                            <p class="m-0">{{round($topPlayer->played_time / 3600, 2, PHP_ROUND_HALF_UP)}}h</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="border border-color rounded-3">
            <div class="border-bottom border-color p-4">
                <h6 class="m-0">Ultimele sanctiuni</h6>
            </div>
            <div class="kraier-body">
                @foreach($lastBans as $lastBan)
                <div class="kraier-card-section p-4 border-bottom border-color">
                    <div class="d-flex align-items-center justify-content-between kraier-mobile">
                        <div class="d-flex align-items-center">
                            <i class="fal fa-ban me-4 fs-2 icon-style"></i>
                            <div>
                                <h5 class="mb-1">{{$lastBan->victim_name}}</h5>
                                <p class="m-0 text-second" >Administrator: {{$lastBan->admin_name}}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                            <div class="d-flex align-items-center flex-column">
                                <i class="fal fa-clock icon-style fs-2 mb-2"></i>
                            </div>
                            <p class="m-0 text-center">{{gmdate("Y-m-d H:m", $lastBan->bantime)}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
