@extends('layouts.main')
@section('main-container')
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
@endsection
