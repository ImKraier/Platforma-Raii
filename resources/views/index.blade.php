@extends('layouts.main')
@section('main-container')
<section class="our-servers">
    <h4 class="fw-ligher mb-4"><span class="unusual-text">SERVERELE</span> NOASTRE</h4>
    <div class="row">
        @foreach($servers as $server)
        <div class="col-lg-3">
            <div class="server">
                <div class="server-content">
                    <div class="server-map">{{ $server->currentmap }}</div>
                    <img src="/assets/images/cs_maps/de_dust2.png">
                </div>
                <h6 class="my-3 text-muted">{{ Str::limit($server->hostname, 32) }}</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="m-0 text-muted">Jucatori Online</p>
                        <h6 class="m-0">{{ $server->onlineplayers }}/{{ $server->maxplayers }}</h6>
                    </div>
                    <div class="col-md-6">
                        <p class="m-0 text-muted">Admini Online</p>
                        <h6 class="m-0">{{ $server->onlineadmins }}</h6>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary w-100">Detalii</a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary w-100">Joaca</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section class="statistics mt-4">
    <h4 class="fw-ligher mb-4"><span class="unusual-text">STATISTICI</span> SI CONCURENTA</h4>
    <div class="statistic p-3 pb-0 mb-3">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="statistic-bg">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <i class="fal fa-user statistic-icon"></i>
                        <h6 class="mb-2 text-muted text-center">Jucatori Online</h6>
                        <h5 class="m-0 statistic-number">{{$onlinePlayers}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="statistic-bg">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <i class="fal fa-ban statistic-icon"></i>
                        <h6 class="mb-2 text-muted text-center">Interdictii</h6>
                        <h5 class="m-0 statistic-number">{{$bansCount}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="statistic-bg">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <i class="fal fa-users statistic-icon"></i>
                        <h6 class="mb-2 text-muted text-center">Utilizatori</h6>
                        <h5 class="m-0 statistic-number">{{ $usersCount }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="statistic-bg">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <i class="fal fa-user-shield statistic-icon"></i>
                        <h6 class="mb-2 text-muted text-center">Administratori</h6>
                        <h5 class="m-0 statistic-number">20</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="data-table mb-3">
                <div class="data-header">
                    <h6 class="text-muted">TOP Jucatori</h6>
                </div>
                <div class="data-content">
                    <div class="data-content-header d-flex align-items-center">
                        <p class="m-0 text-muted me-3">Rank</p>
                        <p class="m-0 text-muted">Jucator</p>
                    </div>
                    @foreach($topPlayers as $key => $topPlayer)
                        <div class="data-column">
                            <p class="m-3 fw-bold text-muted">{{ $key+1 }}</p>
                            <div class="d-flex justify-content-between w-100 m-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img class="mx-2" src="https://www.gravatar.com/avatar/8518559e5d193497ef745e329b2c93d3?s=160">
                                    <p class="m-0 text-muted fw-bold">{{ Str::limit($topPlayer->uname, 10) }}</p>
                                </div>
                                @if($key+1 <= 3)
                                    <i class="fas fa-trophy @if($key+1 == 1) gold @elseif($key+1 == 2) silver @elseif($key+1 == 3) bronze @endif d-flex justify-content-center align-items-center fs-4"></i>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="data-table table-responsive">
                <div class="data-header">
                    <h6 class="text-muted">Ultimele sanctiuni</h6>
                </div>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jucator</th>
                        <th scope="col">Administrator</th>
                        <th scope="col">Motiv</th>
                        <th scope="col">Timp Ramas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lastBans as $key => $lastBan)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ Str::limit($lastBan->victim_name, 5) }}</td>
                        <td>{{ Str::limit($lastBan->admin_name, 10) }}</td>
                        <td>{{ Str::limit($lastBan->reason, 10) }}</td>
                        @if($lastBan->banlength != 0)
                            <td><span class="badge bg-success">{{ round($lastBan->banlength / 60) }}h</span></td>
                        @else
                        <td><span class="badge bg-primary">Permanent</span></td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                    {{--            <div class="data-table mb-3">--}}
{{--                <div class="data-header">--}}
{{--                    <h6 class="text-muted">Ultimele sanctiuni</h6>--}}
{{--                </div>--}}
{{--                <div class="data-content">--}}
{{--                    <div class="data-content-header d-flex align-items-center">--}}
{{--                        <p class="m-0 text-muted me-4">#</p>--}}
{{--                        <p class="m-0 text-muted me-3">Jucator</p>--}}
{{--                        <p class="m-0 text-muted">Administrator</p>--}}
{{--                    </div>--}}
{{--                    @foreach($lastBans as $key => $lastBan)--}}
{{--                        <div class="data-column">--}}
{{--                            <div class="d-flex align-items-center py-2">--}}
{{--                                <p class="m-3 fw-bold text-muted">{{ $key+1 }}</p>--}}
{{--                                <div class="d-flex justify-content-center align-items-center me-5">--}}
{{--                                    <img class="mx-2" src="https://www.gravatar.com/avatar/8518559e5d193497ef745e329b2c93d3?s=160">--}}
{{--                                    <p class="m-0 text-muted fw-bold">{{ Str::limit($lastBan->victim_name, 5) }}</p>--}}
{{--                                </div>--}}
{{--                                <p class="m-0 text-muted fw-bold">{{ Str::limit($lastBan->admin_name, 10) }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</section>
@endsection
