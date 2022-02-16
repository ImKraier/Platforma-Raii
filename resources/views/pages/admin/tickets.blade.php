@extends('layouts.main')
@section('main-container')
    <table id="app_dataTable" class="table table-bordered border-color text-white" style="width:100%; margin-top: 20px !important; margin-bottom: 20px !important;">
        <thead>
        <tr>
            <th>#</th>
            <th>Subiect</th>
            <th>Autor</th>
            <th>Preluat de</th>
            <th>Status</th>
            <th>Creat pe</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tickets as $key => $ticket)
            <tr>
                <td><a href="{{ route('app.admin.ticket', ['ticket' => $ticket->id]) }}">{{$key+1}}</a></td>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->author_name}}</td>
                <td>{{$ticket->taken_by}}</td>
                <td>@if($ticket->status == 0) Deschis @else Inchis @endif</td>
                <td>{{$ticket->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
