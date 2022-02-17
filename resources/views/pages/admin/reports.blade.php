@extends('layouts.main')
@section('main-container')
    <table id="app_dataTable" class="table table-bordered border-color text-white" style="width:100%; margin-top: 20px !important; margin-bottom: 20px !important;">
        <thead>
        <tr>
            <th>#</th>
            <th>Tip</th>
            <th>Autor</th>
            <th>Jucator raportat</th>
            <th>Status</th>
            <th>Raspuns</th>
            <th>Creat pe</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reports as $key => $report)
            <tr>
                <td><a href="{{ route('app.admin.report', ['report' => $report->id]) }}">{{$key+1}}</a></td>
                <td>{{$report->report_type}}</td>
                <td>{{$report->author_name}}</td>
                <td>{{$report->reported_player}}</td>
                <td>@if($report->status == 0) Deschis @else Inchis @endif</td>
                <td>{{$report->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
