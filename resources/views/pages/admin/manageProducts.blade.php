@extends('layouts.main')
@section('main-container')
    <button type="button" class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Adauga un produs
    </button>
    <div class="card p-3">
        <div class="card-body">
            <div class="table-responsive">
                <table id="app_dataTable" class="table table-bordered border-color text-white table-responsive" style="width:100%; margin-top: 20px !important; margin-bottom: 20px !important;">
                    <thead>
                    <tr>
                        <th>Titlu</th>
                        <th>Descriere</th>
                        <th>Imagine</th>
                        <th>Product Key</th>
                        <th>Price</th>
                        <th>Creat pe</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->image }}</td>
                            <td>{{ $item->product_key }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('app.admin.report.edit', ['id' => $item->id]) }}" class="btn btn-secondary">Editeaza</a>
                                    <form method="POST" action="{{ route('app.admin.product.remove') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button type="submit" class="btn btn-danger">Sterge</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adauga un nou produs</h5>
                </div>
                <form method="POST" action="{{ route('app.admin.product.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="custom-input mb-3" name="title" placeholder="Titlu...">
                        <input type="text" class="custom-input mb-3" name="description" placeholder="Descriere...">
                        <p class="m-0 text-secondary">Dimensiunea recomandata este <strong>350x500</strong> px</p>
                        <input type="file" class="custom-input mb-3" name="image" placeholder="Upload Image...">
                        <input type="text" class="custom-input mb-3" name="product_key" placeholder="Product Key...">
                        <input type="number" class="custom-input" name="price" placeholder="Pret...">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Inchide</button>
                        <button type="submit" class="btn btn-primary">Salveaza</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
