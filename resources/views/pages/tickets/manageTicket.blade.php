@extends('layouts.main')
@section('main-container')
    <div class="border border-color bg-secondary p-4 rounded-3 mb-3">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-3 d-flex align-items-center">Tichet #{{ $ticket->id }}</h4>
                <p class="mb-2 bg-second p-3 rounded-3">Subiect: {{ $ticket->title }}</p>
                <p class="mb-2 bg-second p-3 rounded-3">Autor: {{ $ticket->author_name }}</p>
                <p class="m-0 bg-second p-3 rounded-3">Problema: <br>{{ $ticket->content }}</p>
            </div>
            @if($ticket->status == 0)
            <div class="col-md-6 d-flex justify-content-end align-items-start">
                <form method="POST" action="{{ route('app.close.ticket', ['id' => $ticket->id]) }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary text-light">Inchide</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    @foreach($ticket->comments as $comment)
        <div class="d-flex @if($comment->author == $ticket->author) justify-content-end @else justify-content-start @endif mb-3">
            <div class="col-md-6 border border-color p-4 rounded-3 bg-secondary">
                <div class="d-flex justify-content-between mb-3">
                    <p class="m-0">{{ $comment->author_name }} spune:</p>
                    <p class="m-0">{{ $comment->created_at }}</p>
                </div>
                <p class="m-0 border border-color p-3 rounded-3">{{ $comment->content }}</p>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-end">
        <div class="col-md-6 border border-color p-4 rounded-3 bg-secondary">
            @if($ticket->status == 0)
                <form method="POST" action="{{route('app.create.comment')}}">
                    @csrf
                    <input type="hidden" value="{{ $ticket->id }}" name="ticket_id">
                    <input type="hidden" value="{{ Auth::id() }}" name="author">
                    <p class="mb-3 fw-500">Scriei un mesaj lui {{ $ticket->author_name }}</p>
                    <textarea class="custom-input" placeholder="Mesajul tau" name="content"></textarea>
                    <button type="submit" class="btn btn-primary w-100 py-3 mt-3">Trimite</button>
                </form>
            @else
                Acest tichet este inchis nu mai poti primi sau trimite mesaje.
            @endif
        </div>
    </div>
@endsection
