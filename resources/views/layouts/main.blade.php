<!DOCTYPE html>
<html lang="ro">
@include('layouts.head')
<body>
<div class="d-flex">
    @include('layouts.sidebar')
    <div class="content">
        <header class="border-bottom border-color header px-5">
            <p class="m-0">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </header>
        <div class="p-5">
            @yield('main-container')
        </div>
    </div>
</div>
@include('layouts.scripts')
</body>
</html>
