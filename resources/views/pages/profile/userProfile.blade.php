@extends('layouts.main')
@section('main-container')
<section class="profile">
    <div class="profile-header" style="background-image: url('https://raii.ro/forum/uploads/set_resources_67/84c1e40ea0e759e3f1505eb1788ddf3c_pattern.png')">
        <div class="profile-badges">
            @if($user->admin_level > 0)
            <div class="profile-badge">Admin</div>
            @endif
            @if($isUserBanned)
            <div class="profile-badge">Banat</div>
            @endif
            @if($user->vip_level > 0)
            <div class="profile-badge">VIP</div>
            @endif
        </div>
        <div class="profile-image d-flex flex-column justify-content-center align-items-center">
            <img src="https://www.gravatar.com/avatar/8518559e5d193497ef745e329b2c93d3?s=160">
            <h4 class="text-center mt-4 fw-bold text-uppercase">{{ $user->uname }}</h4>
            <p class="m-0 text-positive text-uppercase fw-bolder text-center"><i class="fas fa-thumbs-up me-2"></i> 25% Positive Rating</p>
            <div class="d-flex mt-3">
                <button type="button" class="square-btn btn-secondary me-2"><i class="fas fa-thumbs-up"></i></button>
                <button type="button" class="square-btn btn-secondary"><i class="fas fa-thumbs-down"></i></button>
            </div>
        </div>
    </div>
    <div class="profile-body">
        <div class="profile-stats">
            <div class="row">
                <div class="col-md-3 d-flex flex-row align-items-center justify-content-center">
                    <i class="fas fa-fire fs-1 me-3 text-muted"></i>
                    <div class="d-flex flex-column">
                        <h3 class="m-0 text-muted fw-bold">100</h3>
                        <p class="m-0 text-uppercase fw-bold text-secondary">Ucideri Totale</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-row align-items-center justify-content-center">
                    <i class="fas fa-fire fs-1 me-3 text-muted"></i>
                    <div class="d-flex flex-column">
                        <h3 class="m-0 text-muted fw-bold">100</h3>
                        <p class="m-0 text-uppercase fw-bold text-secondary">Decese Totale</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-row align-items-center justify-content-center">
                    <i class="fas fa-fire fs-1 me-3 text-muted"></i>
                    <div class="d-flex flex-column">
                        <h3 class="m-0 text-muted fw-bold">{{ $user->cs_points + $user->csgo_points }}</h3>
                        <p class="m-0 text-uppercase fw-bold text-secondary">Puncte Totale</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-row align-items-center justify-content-center">
                    <i class="fas fa-fire fs-1 me-3 text-muted"></i>
                    <div class="d-flex flex-column">
                        <h3 class="m-0 text-muted fw-bold">23</h3>
                        <p class="m-0 text-uppercase fw-bold text-secondary">K/D</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-about">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="m-0 fw-bold text-uppercase">Despre</h5>
                    @if($user->profile_description != 'NONE')
                    <p class="text-muted mt-2 mb-3">{{ $user->profile_description }}</p>
                    @else
                        <p class="text-muted mt-2 mb-3"><span class="text-capitalize">{{ $user->uname }}</span> nu are nici o descriere pusa.</p>
                    @endif
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary px-3 me-3">Adauga descriere</button>
                        <button type="button" class="btn btn-secondary px-3">Sterge descrierea</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled profile-desc">
                        <li class="text-secondary d-flex flex-row align-items-center mb-2"><i class="fal fa-map-marked-alt text-muted me-2 fs-5"></i>Din <strong class="ms-2 text-muted">{{ $user->ip_location }}</strong></li>
                        @if($user->last_login < 19000)
                            @if($user->last_login == 0)
                                <li class="text-secondary d-flex flex-row align-items-center mb-2"><i class="fal fa-plus-circle text-muted me-2 fs-5"></i> A intrat <strong class="mx-2 text-muted">astazi</strong></li>
                            @else
                                @if($user->last_login == 1)
                                    <li class="text-secondary d-flex flex-row align-items-center mb-2"><i class="fal fa-plus-circle text-muted me-2 fs-5"></i> A intrat acum <strong class="mx-2 text-muted">o</strong> zi</li>
                                @elseif($user->last_login < 20)
                                    <li class="text-secondary d-flex flex-row align-items-center mb-2"><i class="fal fa-plus-circle text-muted me-2 fs-5"></i> A intrat acum <strong class="mx-2 text-muted">{{ $user->last_login }}</strong> zile</li>
                                @else
                                    <li class="text-secondary d-flex flex-row align-items-center mb-2"><i class="fal fa-plus-circle text-muted me-2 fs-5"></i> A intrat acum <strong class="mx-2 text-muted">{{ $user->last_login }}</strong> de zile</li>
                                @endif
                            @endif
                        @else
                            <li class="text-secondary d-flex flex-row align-items-center mb-2"><i class="fal fa-plus-circle text-muted me-2 fs-5"></i> Nu a intrat pe nici un server</li>
                        @endif
                        @if($user->is_user_online > 0)
                            <li class="text-secondary d-flex flex-row align-items-center mb-2"><i class="fal fa-signal text-muted me-2 fs-5"></i>Status <strong class="ms-2 text-muted">Online</strong></li>
                        @else
                            <li class="text-secondary d-flex flex-row align-items-center mb-2"><i class="fal fa-signal text-muted me-2 fs-5"></i>Status <strong class="ms-2 text-muted">Offline</strong></li>
                        @endif
                        <li class="text-secondary d-flex flex-row align-items-center"><i class="fal fa-at text-muted me-2 fs-5"></i> E-mail <strong class="ms-2 text-muted">{{ $user->email }}</strong></li>
                    </ul>
                </div>
            </div>
            <hr style="background: #404c68;">
            <h5 class="m-0 fw-bold text-uppercase">Serverele pe care a jucat</h5>
            <div class="played-server">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="m-0 fw-bold text-uppercase text-muted">CS.RAII.RO # CASTIGA 500RON!! ...</h6>
                        <p class="m-0 text-secondary text-uppercase fw-bold">Jucatori Online <span class="text-muted">12/32</span></p>
                    </div>
                    <button type="button" class="btn btn-primary px-4 text-uppercase fw-bold">Joaca</button>
                </div>
            </div>
            <div class="played-server">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="m-0 fw-bold text-uppercase text-muted">CS.RAII.RO # CASTIGA 500RON!! ...</h6>
                        <p class="m-0 text-secondary text-uppercase fw-bold">Jucatori Online <span class="text-muted">12/32</span></p>
                    </div>
                    <button type="button" class="btn btn-primary px-4 text-uppercase fw-bold">Joaca</button>
                </div>
            </div>
            <div class="played-server">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="m-0 fw-bold text-uppercase text-muted">CS.RAII.RO # CASTIGA 500RON!! ...</h6>
                        <p class="m-0 text-secondary text-uppercase fw-bold">Jucatori Online <span class="text-muted">12/32</span></p>
                    </div>
                    <button type="button" class="btn btn-primary px-4 text-uppercase fw-bold">Joaca</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
