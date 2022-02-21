<!DOCTYPE html>
<html lang="ro">
@include('layouts.head')
<body>
<div class="d-flex">
    @include('layouts.sidebar')
    <div class="content collapsed">
        @yield('main-container')
    </div>
</div>
@include('layouts.scripts')
</body>
</html>
