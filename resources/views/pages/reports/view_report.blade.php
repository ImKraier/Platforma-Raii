@extends('layouts.main')
@section('main-container')
    <div class="border border-color bg-secondary p-4 rounded-3">
        @if($getReport->report_type == 1)
            <h3 class="m-0 text-muted">Raport Jucator</h3>
        @else
            <h3 class="m-0 text-muted">Raport Admin</h3>
        @endif
        <hr style="background: #404c68;">
        <p class="m-0 text-muted">Numele autorului: {{ $getReport->author_name }}</p>
        <p class="mb-3 text-muted">Numele celui raportat: {{ $getReport->reported_player }}</p>
        <p class="m-0 p-3 border border-color rounded-3 bg-second text-muted">Mai multe informatii:<br>{{ $getReport->informations }}</p>
    </div>
    @if($getReport->status == 2)
        <div class="border border-color mt-3 p-4 rounded-3 bg-secondary">
            <p class="mb-3 text-muted fw-500">Admin-ul {{ $getReport->solved_by_name }} ti-a raspuns la raportul pe care l-ai trimis</p>
            <p class="border border-color p-3 rounded-3 m-0 bg-second">Raspuns:<br>{{ $getReport->answer }}</p>
        </div>
    @else
        <div class="border border-color mt-3 p-4 rounded-3 bg-secondary">
            Nu ti-a raspuns nici un admin la acest raport.
        </div>
    @endif
@endsection
