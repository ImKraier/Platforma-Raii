@extends('layouts.main')
@section('main-container')
    <button type="button" class="btn btn-secondary px-4 py-3 mb-4" data-bs-toggle="modal" data-bs-target="#ticket_modal">Creeaza un nou tichet</button>
    <div class="border border-color rounded-3">
        <div class="border-bottom p-4 kraier-header">
            <h6 class="m-0 text-uppercase text-muted fw-bold">Tichetele tale</h6>
        </div>
        <div class="kraier-body">
            @if(count($tickets) > 0)
                @foreach($tickets as $key => $ticket)
                    <div class="kraier-card-section p-4 border-bottom border-color">
                        <div class="d-flex align-items-center justify-content-between kraier-mobile">
                            <div class="d-flex align-items-center">
                                <i class="fal fa-hands-helping me-4 fs-2 icon-style"></i>
                                <div class="server-width">
                                    <h5 class="mb-1"><a class="text-decoration-none" href="{{ route('app.manage.ticket', ['id' => $ticket->id]) }}">Tichet #{{$key+1}}</a></h5>
                                    <p class="m-0 text-second" >Preluat de: {{$ticket->taken_by_name}}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                                @if($ticket->status == 0)
                                    <div class="d-flex align-items-center flex-column">
                                        <i class="fal fa-check-circle icon-style fs-2 mb-2"></i>
                                    </div>
                                    <p class="m-0">Deschis</p>
                                @elseif($ticket->status == 1)
                                    <div class="d-flex align-items-center flex-column">
                                        <i class="fal fa-times-circle icon-style fs-2 mb-2"></i>
                                    </div>
                                    <p class="m-0">Inchis</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="kraier-card-section p-4 border-bottom border-color">
                In acest moment nu ai nici un tichet activ.
                </div>
            @endif
        </div>
    </div>
@endsection
