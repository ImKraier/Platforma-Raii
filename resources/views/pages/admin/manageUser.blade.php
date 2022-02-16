@extends('layouts.main')
@section('main-container')
    <div class="border border-color p-4 rounded-3">
        <h4 class="mb-2 d-flex align-items-center">{{ $getUser->uname }}@if($getUser->vip_level > 0)<i class="ms-2 fs-5 fal fa-crown text-warning"></i>@endif @if($getUser->is_user_online == 1)<span class="ms-2 status-badge bg-success">Online</span>@else<span class="ms-2 status-badge bg-danger">Offline</span>@endif</h4>
        <p class="mb-1">E-mail: {{ $getUser->email }}</p>
        @if($getUser->last_cs_activity != 0)
            <p class="mb-1">Ultima logare pe CS 1.6: {{ gmdate("Y-m-d H:m", $getUser->last_cs_activity) }}</p>
        @endif
        @if($getUser->last_csgo_activity != 0)
            <p class="mb-1">Ultima logare pe CS:GO: {{ gmdate("Y-m-d H:m", $getUser->last_csgo_activity) }}</p>
        @endif
        <p class="mb-1">Timp jucat: {{round($getUser->played_time / 3600, 2, PHP_ROUND_HALF_UP)}}h</p>
        <p class="mb-1">Puncte totale: {{ $getUser->cs_points + $getUser->csgo_points }}</p>
        <p class="mb-1">Puncte CS 1.6: {{ $getUser->cs_points }}</p>
        <p class="m-0">Puncte CS:GO: {{ $getUser->csgo_points }}</p>
        @if($getUser->vip_level > 0)
            <p class="my-1">Vip Level: {{ $getUser->vip_level }}</p>
            <p class="m-0">Vip Tag: {{ $getUser->vip_tag }}</p>
        @endif
    </div>
@endsection
