@extends('layouts.main')
@section('main-container')
    <button type="button" class="btn btn-secondary px-4 py-3 mb-4" data-bs-toggle="modal" data-bs-target="#report_modal">Creeaza un nou report</button>
    <div class="border border-color rounded-3">
        <div class="border-bottom p-4 kraier-header">
            <h6 class="m-0 text-uppercase text-muted fw-bold">Rapoartele tale</h6>
        </div>
        <div class="kraier-body">
            @if(count($reports) > 0)
                @foreach($reports as $key => $report)
                    <div class="kraier-card-section p-4 border-bottom border-color">
                        <div class="d-flex align-items-center justify-content-between kraier-mobile">
                            <div class="d-flex align-items-center">
                                @if($report->report_type == 1)
                                <i class="fal fa-user me-4 fs-2 icon-style"></i>
                                @else
                                <i class="fal fa-user-shield me-4 fs-2 icon-style"></i>
                                @endif
                                <div class="server-width">
                                    <h5 class="mb-1"><a class="text-decoration-none" href="{{ route('app.manage.report', ['report' => $report->id]) }}">Report #{{$key+1}}</a></h5>
                                    <p class="m-0 text-second" >Rezolvat de: {{$report->solved_by_name}}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-column kraier-stats-mobile">
                                @if($report->status == 0)
                                    <div class="d-flex align-items-center flex-column">
                                        <i class="fal fa-check-circle icon-style fs-2 mb-2"></i>
                                    </div>
                                    <p class="m-0">Deschis</p>
                                @elseif($report->status == 1)
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
                    In acest moment nu ai nici un report.
                </div>
            @endif
        </div>
    </div>
@endsection
