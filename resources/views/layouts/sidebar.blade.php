<div class="sidebar">
    <button class="mobile-collapse"><i class="fal fa-angle-double-left"></i></button>
    <h4>RAII</h4>
    <ul class="list-unstyled text-center sidebar-list">
        <li data-target="#acasa" class="active"><button type="button"><i class="fal fa-home fs-3"></i>Acasa</button></li>
        <li data-target="#test2"><button type="button"><i class="fal fa-home fs-3"></i>Test2</button></li>
        <li data-target="#test3"><button type="button"><i class="fal fa-home fs-3"></i>Test3</button></li>
        <li data-target="#test4"><button type="button"><i class="fal fa-home fs-3"></i>Test4</button></li>
        <li data-target="#test5"><button type="button"><i class="fal fa-home fs-3"></i>Test5</button></li>
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
                    <p class="text-muted">{{ Auth::user()->uname }}</p>
                    @if(Auth::user()->vip_tag != 'NONE')
                        <p class="text-muted profile-tag">{{ Auth::user()->vip_tag }}</p>
                    @endif
                </div>
            </div>
        </div>
        <h4 class="my-4" id="category-name">Acasa</h4>
        <div class="category-list show" id="acasa">
            <ul>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
            </ul>
        </div>
        <div class="category-list" id="test2">
            <ul>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
            </ul>
        </div>
        <div class="category-list" id="test3">
            <ul>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
            </ul>
        </div>
        <div class="category-list" id="test4">
            <ul>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
            </ul>
        </div>
        <div class="category-list" id="test5">
            <ul>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
            </ul>
        </div>
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
{{--<div class="sidebar">--}}
{{--    <div class="p-4 text-center border-bottom" style="border-color: var(--border-color) !important;">--}}
{{--        <h3 class="m-0" style="font-size: 28px; color: white;">RAII<b id="website_name" style="color: var(--primary-color);">.RO</b></h3>--}}
{{--    </div>--}}
{{--    <div class="p-4">--}}
{{--        <div class="mini-profile">--}}
{{--            <div class="d-flex align-items-center justify-content-between kraier-mobile">--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                    <img class="mini-profile-image" src="https://www.gravatar.com/avatar/8518559e5d193497ef745e329b2c93d3?s=160" alt="{{ Auth::user()->uname }}">--}}
{{--                    <div id="mini-profile-right">--}}
{{--                        <h5 class="m-0">{{ Auth::user()->uname }}</h5>--}}
{{--                        @if(Auth::user()->vip_tag != 'NONE')--}}
{{--                            <p class="m-0">{{ Auth::user()->vip_tag }}</p>--}}
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
