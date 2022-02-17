@extends('layouts.main')
@section('main-container')
    <div class="border border-color p-4 rounded-3">
        @if($getReport->report_type == 1)
            <h3 class="m-0">Raport Jucator</h3>
        @else
            <h3 class="m-0">Raport Admin</h3>
        @endif
        <hr>
        <p class="m-0">Numele autorului: {{ $getReport->author_name }}</p>
        <p class="mb-3">Numele celui raportat: {{ $getReport->reported_player }}</p>
        <p class="m-0 p-3 border border-color rounded-3">Mai multe informatii:<br>{{ $getReport->informations }}</p>
    </div>
    @if($getReport->status == 2)
        <div class="border border-color mt-3 p-4 rounded-3">
            <p class="mb-3">Admin-ul {{ $getReport->solved_by_name }} ti-a raspuns la raportul pe care l-ai trimis</p>
            <p class="border border-color p-3 rounded-3 m-0">Raspuns:<br>{{ $getReport->answer }}</p>
        </div>
    @else
        <div class="border border-color mt-3 p-4 rounded-3">
            Nu ti-a raspuns nici un admin la acest raport.
        </div>
    @endif
@endsection
