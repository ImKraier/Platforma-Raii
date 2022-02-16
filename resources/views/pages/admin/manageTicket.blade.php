@extends('layouts.main')
@section('main-container')
    <div class="border border-color p-4 rounded-3 mb-3">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-3 d-flex align-items-center">Tichet #{{ $ticket->id }}</h4>
                <p class="mb-2 border border-color p-3 rounded-3">Subiect: {{ $ticket->title }}</p>
                <p class="mb-2 border border-color p-3 rounded-3">Autor: {{ $ticket->author_name }}</p>
                <p class="m-0 border border-color p-3 rounded-3">Problema: <br>{{ $ticket->content }}</p>
            </div>
                <div class="col-md-6 d-flex justify-content-end align-items-start">
                    @if($ticket->status == 0)
                    <form method="POST" action="{{ route('app.close.ticket', ['id' => $ticket->id]) }}">
                        @csrf
                        <button type="submit" class="btn border border-color text-light">Inchide</button>
                    </form>
                    @endif
                    <form method="POST" action="{{ route('app.delete.ticket', ['id' => $ticket->id]) }}">
                        @csrf
                        <button class="btn btn-danger ms-3">Sterge</button>
                    </form>
                </div>
        </div>
    </div>
    @foreach($ticket->comments as $comment)
    <div class="d-flex @if($comment->author == $ticket->author) justify-content-start @else justify-content-end @endif mb-3">
        <div class="col-md-6 border border-color p-4 rounded-3">
            <div class="d-flex justify-content-between mb-3">
                <p class="m-0"><a href="{{ route('app.admin.user', ['user' => $comment->author]) }}" class="text-white">{{ $comment->author_name }}</a> spune:</p>
                <p class="m-0">{{ $comment->created_at }}</p>
            </div>
            <p class="m-0 border border-color p-3 rounded-3">{{ $comment->content }}</p>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-end">
        <div class="col-md-6 border border-color p-4 rounded-3">
            @if($ticket->status == 0)
                <form method="POST" action="{{route('app.create.comment')}}">
                    @csrf
                    <input type="hidden" value="{{ $ticket->id }}" name="ticket_id">
                    <input type="hidden" value="{{ Auth::id() }}" name="author">
                    <p class="mb-3">Scriei un mesaj lui {{ $ticket->author_name }}</p>
                    <textarea class="custom-input" placeholder="Mesajul tau" name="content"></textarea>
                    <button type="submit" class="btn btn-primary w-100 py-3 mt-3">Trimite</button>
                </form>
            @else
                Acest tichet este inchis nu mai poti trimite mesaje.
            @endif
        </div>
    </div>
@endsection
