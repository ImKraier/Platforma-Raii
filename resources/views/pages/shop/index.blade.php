@extends('layouts.main')
@section('main-container')
    @if(count($items) > 0)
    <div class="row">
        @foreach($items as $item)
        <div class="col-lg-2">
            <div class="bg-secondary shop-card mb-3">
                <div class="card-image mb-3">
                    <img src="{{ asset('items/'.$item->image) }}">
                </div>
                <form method="POST" action="{{ route('app.shop.buy', ['id' => $item->id]) }}" class="m-3">
                    @csrf
                    <div class="d-flex justify-content-center flex-column">
                        <h5 class="m-0 text-center">{{ $item->title }}</h5>
                        <p class="mb-2 text-center text-secondary">{{ $item->description }}</p>
                        <h5 class="text-center mb-3">{{ $item->price }} Puncte</h5>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Cumpara</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <div class="bg-second p-3 rounded-3">
            <div class="d-flex justify-content-start align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <h4 class="m-0">Whoops!</h4>
            </div>
            <p class="my-2">Ne pare rau dar momentan nu avem nici un produs adaugat in magazinul nostru!</p>
            <hr>
            <p class="mb-0">Pentru orice fel de bug puteti sa deschideti un tichet apasand <a class="text-decoration-none text-white" type="button" data-bs-toggle="modal" data-bs-target="#ticket_modal">aici</a>.</p>
        </div>
    @endif
@endsection
