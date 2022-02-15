@extends('layouts.main')
@section('main-container')
    <table id="app_dataTable" class="table table-bordered border-color text-white" style="width:100%; margin-top: 20px !important; margin-bottom: 20px !important;">
        <thead>
        <tr>
            <th>Id</th>
            <th>Numele sanctionatului</th>
            <th>Tipul sanctiunii</th>
            <th>Motiv</th>
            <th>Numele adminului</th>
        </tr>
        </thead>
        <tbody>
            @foreach($bans as $key => $ban)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$ban->victim_name}}</td>
                <td>{{$ban->unbantime}}</td>
                <td>{{$ban->reason}}</td>
                <td>{{$ban->admin_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
