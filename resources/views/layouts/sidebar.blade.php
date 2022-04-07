<div class="sidebar">
    <button class="mobile-collapse"><i class="fal fa-angle-double-left"></i></button>
    <h4>RAII</h4>
    <ul class="list-unstyled text-center sidebar-list">
        <li data-target="#acasa" class="active"><button type="button"><i class="fal fa-home fs-3"></i>Acasa</button></li>
        <li><a href="{{ route('app.home') }}"><i class="fal fa-server fs-3"></i>Serverele Noastre</a></li>
        <li data-target="#tickets"><button type="button"><i class="fal fa-ticket fs-3"></i>Tichete</button></li>
        <li data-target="#reports"><button type="button"><i class="fal fa-flag fs-3"></i>Rapoarte</button></li>
        @if(Auth::user()->admin_level > 0)
        <li data-target="#admin"><button type="button"><i class="fal fa-user-shield fs-3"></i>Admin</button></li>
        @endif
    </ul>
    <div class="sidebar-bottom">
        <a href="{{ route('app.logout') }}" class="square-btn bg-primary"><i class="fal fa-sign-out"></i></a>
    </div>
</div>
<div class="semi-sidebar d-flex flex-column justify-content-between collapsed">
    <div>
        <a class="square-btn btn-secondary"><i class="fal fa-search"></i></a>
        <div class="mini-profile">
            <div class="d-flex align-items-center">
                <img src="https://www.gravatar.com/avatar/8518559e5d193497ef745e329b2c93d3?s=160">
                <div>
                    <a href="{{ route('app.profile.user', ['userId' => Auth::user()->id]) }}" class="text-muted text-decoration-none">{{ Auth::user()->uname }}</a>
                    @if(Auth::user()->vip_tag != 'NONE')
                        <p class="text-muted profile-tag">{{ Auth::user()->vip_tag }}</p>
                    @endif
                </div>
            </div>
        </div>
        <h4 class="my-4" id="category-name">Acasa</h4>
        <div class="category-list show" id="acasa">
            <ul>
                <li><a href="{{ route('app.home') }}">Acasa</a></li>
                <li><a href="{{ route('app.shop') }}">Magazin</a></li>
                <li><a href="#">Regulament</a></li>
                <li><a href="https://raii.ro/forum" target="_blank">Forum</a></li>
                <li><a href="{{ route('app.bans') }}">Jucatori Banati</a></li>
            </ul>
        </div>
        <div class="category-list" id="tickets">
            <ul>
                <li><a href="{{ route('app.tickets') }}">Tichetele tale</a></li>
                <li><button type="button" data-bs-toggle="modal" data-bs-target="#ticket_modal">Creeaza un nou tichet</button></li>
            </ul>
        </div>
        <div class="category-list" id="reports">
            <ul>
                <li><a href="{{ route('app.reports') }}">Rapoartele tale</a></li>
                <li><button type="button" data-bs-toggle="modal" data-bs-target="#report_modal">Creeaza un nou raport</button></li>
            </ul>
        </div>
        @if(Auth::user()->admin_level > 0)
        <div class="category-list" id="admin">
            <ul>
                <li><a href="{{ route('app.admin.users') }}">Utilizatori</a></li>
                <li><a href="{{ route('app.admin.tickets') }}">Tichete</a></li>
                <li><a href="{{ route('app.admin.reports') }}">Rapoarte</a></li>
                <li><a href="{{ route('app.admin.products') }}">Produse</a></li>
            </ul>
        </div>
        @endif
    </div>
    <div class="text-center">
        <p class="text-secondary">Copyright © Raii.Ro</p>
        <div class="social-media d-flex justify-content-center">
            <a class="square-btn btn-secondary me-3"><i class="fab fa-discord"></i></a>
            <a class="square-btn btn-secondary me-3"><i class="fab fa-youtube"></i></a>
            <a class="square-btn btn-secondary"><i class="fab fa-facebook"></i></a>
        </div>
    </div>
</div>

<div class="modal fade" id="ticket_modal" tabindex="-1" aria-labelledby="ticket_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ticket_modal_label">Creeaza un tichet</h5>
            </div>
            <form method="POST" action="{{route('app.create.ticket')}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="author" value="{{Auth::user()->id}}">
                    <input class="custom-input mb-3" name="title" placeholder="Subiect" autocomplete="off">
                    <textarea class="custom-input" name="content" placeholder="Descrie problema"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn border border-color text-light" data-bs-dismiss="modal">Inchide</button>
                    <button type="submit" class="btn btn-primary">Creeaza</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="report_modal" tabindex="-1" aria-labelledby="report_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="report_modal_label">Creeaza un report</h5>
            </div>
            <form method="POST" action="{{ route('app.create.report') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="author" value="{{ Auth::user()->id }}">
                    <select name="report_type" class="custom-input mb-3">
                        <option selected>Selecteaza tipul</option>
                        <option value="1">Report Jucator</option>
                        <option value="2">Report Staff</option>
                    </select>
                    <input class="custom-input mb-3" name="reported_player" placeholder="Numele Jucatorului Raportat" autocomplete="off">
                    <textarea class="custom-input" name="informations" placeholder="Mai multe informatii"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn border border-color text-light" data-bs-dismiss="modal">Inchide</button>
                    <button type="submit" class="btn btn-primary">Raporteaza</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--<div class="sidebar">--}}
{{--    <div class="p-4 text-center border-bottom" style="border-color: var(--border-color) !important;">--}}
{{--        <h3 class="m-0" style="font-size: 28px; color: white;">RAII<b id="website_name" style="color: var(--primary-color);">.RO</b></h3>--}}
{{--    </div>--}}
{{--    <div class="p-4">--}}
{{--        <div class="mini-profile">--}}
{{--            <div class="d-flex align-items-center justify-content-between kraier-mobile">--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                    <img class="mini-profile-image" src="https://www.gravatar.com/avatar/8518559e5d193497ef745e329b2c93d3?s=160" alt="{{ $user->uname }}">--}}
{{--                    <div id="mini-profile-right">--}}
{{--                        <h5 class="m-0">{{ $user->uname }}</h5>--}}
{{--                        @if($user->vip_tag != 'NONE')--}}
{{--                            <p class="m-0">{{ $user->vip_tag }}</p>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <a id="settings_btn" href="#" class="fs-4"><i class="fal fa-cog"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <ul class="list-unstyled mt-4">--}}
{{--            <li>--}}
{{--                <a href="{{route('app.home')}}" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-home-lg-alt icon-style"></i><span class="sidebar-text">Acasa</span></a>--}}
{{--                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-store icon-style"></i><span class="sidebar-text">Magazin</span></a>--}}
{{--                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-bullhorn icon-style"></i><span class="sidebar-text">Anunturi</span></a>--}}
{{--                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-book-open icon-style"></i><span class="sidebar-text">Regulament</span></a>--}}
{{--                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-comment-alt icon-style"></i><span class="sidebar-text">Forum</span></a>--}}
{{--                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-server icon-style"></i><span class="sidebar-text">Serverele Comunitatii</span></a>--}}
{{--                <a href="{{route('app.bans')}}" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-ban icon-style"></i><span class="sidebar-text">Jucatori Banati</span></a>--}}
{{--                <a href="{{route('app.reports')}}" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-file-chart-line icon-style"></i><span class="sidebar-text">Raport Jucatori/Staff</span></a>--}}
{{--                <a href="{{route('app.tickets')}}" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-life-ring icon-style"></i><span class="sidebar-text">Tichete Suport</span></a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="sidebar-toggle">--}}
{{--        <button id="toggle_sidebar"><i id="toggle_sidebar_icon" class="fal fa-arrow-alt-left"></i></button>--}}
{{--    </div>--}}
{{--</div>--}}
