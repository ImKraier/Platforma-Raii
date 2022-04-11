@extends('layouts.main')
@section('main-container')
    <div class="card">
        <div class="card-header p-3">
            Editezi produsul {{ $item->title }}
        </div>
        <form method="POST" action="{{ route('app.admin.report.edit.post') }}" enctype="multipart/form-data" class="card-body">
            @csrf
            <input type="hidden" name="id" value="{{ $item->id }}">
            <input type="text" class="custom-input" placeholder="Titlu" name="title" value="{{ $item->title }}">
            <input type="text" class="custom-input my-3" placeholder="Descriere" name="description" value="{{ $item->description }}">
            <input type="text" class="custom-input" placeholder="Key" name="product_key" value="{{ $item->product_key }}">
            <input type="number" class="custom-input my-3" placeholder="Price" name="price" value="{{ $item->price }}">
            <input type="file" class="custom-input mb-3" name="image">
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-primary">Salveaza</button>
                <a href="{{ route('app.admin.products') }}" class="btn btn-secondary">Inchide</a>
            </div>
        </form>
    </div>
@endsection
