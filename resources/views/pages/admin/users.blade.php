@extends('layouts.main')
@section('main-container')
    <div class="card p-3">
        <div class="card-body">
            <div class="table-responsive">
                <table id="app_dataTable" class="table table-bordered border-color text-white table-responsive" style="width:100%; margin-top: 20px !important; margin-bottom: 20px !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nume</th>
                        <th>E-mail</th>
                        <th>IP</th>
                        <th>Puncte</th>
                        <th>Puncte CS 1.6</th>
                        <th>Puncte CS:GO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a class="text-decoration-none" href="{{ route('app.profile.user', ['userId' => $user->id]) }}">{{ Str::limit($user->uname, 10) }}</a>@if($user->vip_level > 0)<i class="ms-2 fs-6 fal fa-crown text-warning"></i>@endif</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->ip}}</td>
                            <td>{{$user->cs_points + $user->csgo_points}}</td>
                            <td>{{$user->cs_points}}</td>
                            <td>{{$user->csgo_points}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
