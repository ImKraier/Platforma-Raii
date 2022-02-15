<div class="sidebar">
    <div class="p-4 text-center border-bottom" style="border-color: var(--border-color) !important;">
        <h3 class="m-0" style="font-size: 28px; color: white;">RAII<b id="website_name" style="color: var(--primary-color);">.RO</b></h3>
    </div>
    <div class="p-4">
        <div class="mini-profile">
            <div class="d-flex align-items-center justify-content-between kraier-mobile">
                <div class="d-flex align-items-center">
                    <img class="mini-profile-image" src="https://www.gravatar.com/avatar/8518559e5d193497ef745e329b2c93d3?s=160" alt="{{ Auth::user()->uname }}">
                    <div id="mini-profile-right">
                        <h5 class="m-0">{{ Auth::user()->uname }}</h5>
                        @if(Auth::user()->vip_tag != 'NONE')
                            <p class="m-0">{{ Auth::user()->vip_tag }}</p>
                        @endif
                    </div>
                </div>
                <a id="settings_btn" href="#" class="fs-4"><i class="fal fa-cog"></i></a>
            </div>
        </div>
        <ul class="list-unstyled mt-4">
            <li>
                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-home-lg-alt icon-style"></i><span class="sidebar-text">Acasa</span></a>
                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-store icon-style"></i><span class="sidebar-text">Magazin</span></a>
                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-bullhorn icon-style"></i><span class="sidebar-text">Anuntui</span></a>
                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-book-open icon-style"></i><span class="sidebar-text">Regulament</span></a>
                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-comment-alt icon-style"></i><span class="sidebar-text">Forum</span></a>
                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-server icon-style"></i><span class="sidebar-text">Servere Comunitatii</span></a>
                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-ban icon-style"></i><span class="sidebar-text">Jucatori Banati</span></a>
                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-file-chart-line icon-style"></i><span class="sidebar-text">Raport Jucatori/Staff</span></a>
                <a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="far fa-life-ring icon-style"></i><span class="sidebar-text">Tichete Suport</span></a>
            </li>
        </ul>
    </div>
    <div class="sidebar-toggle">
        <button id="toggle_sidebar"><i id="toggle_sidebar_icon" class="fal fa-arrow-alt-left"></i></button>
    </div>
</div>
