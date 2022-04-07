@extends('layouts.main')
@section('main-container')
    <div class="card p-3">
        <div class="card-body">
            <div class="table-responsive">
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
                            <td>@if($report->report_type == 1) Jucator @else Admin @endif</td>
                            <td><a href="{{route('app.admin.user', ['user' => $report->author])}}">{{$report->author_name}}</a></td>
                            <td>{{$report->reported_player}}</td>
                            <td>@if($report->status == 0) Deschis @else Inchis @endif</td>
                            @if($report->answer != null) <td>{{$report->answer}}</td> @else <td>Fara raspuns</td> @endif
                            <td>{{$report->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
