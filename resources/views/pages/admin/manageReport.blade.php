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
    <div class="border border-color p-4 rounded-3 mt-3">
        @if($getReport->status != 2)
        <form method="POST" action="{{ route('app.admin.report.send-answer') }}">
            @csrf
            <input type="hidden" name="report_id" value="{{ $getReport->id }}">
            <input type="hidden" name="author_name" value="{{ $getReport->author_name }}">
            <p class="mb-2">Trimite-i un raspuns lui <a href="{{ route('app.admin.user', ['user' => $getReport->author]) }}">{{ $getReport->author_name }}</a></p>
            <textarea class="custom-input" name="answer" placeholder="Raspuns"></textarea>
            <button type="submit" class="btn btn-primary py-2 px-3 mt-3">Trimite</button>
        </form>
        @else
            Acest raport a fost rezolvat de catre {{ $getReport->solved_by_name }}
            <p class="mt-3 mb-0 border border-color p-3 rounded-3">Raspuns:<br>{{ $getReport->answer }}</p>
        @endif
    </div>
@endsection
