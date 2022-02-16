@extends('layouts.main')
@section('main-container')
    <button type="button" class="btn btn-primary px-4 py-3 mb-4" data-bs-toggle="modal" data-bs-target="#ticket_modal">Creeaza un nou report</button>
    <div class="border border-color rounded-3">
        <div class="border-bottom border-color p-4">
            <h6 class="m-0">Rapoartele tale</h6>
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
                                    <h5 class="mb-1">Report #{{$key+1}}</h5>
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

    <div class="modal fade" id="ticket_modal" tabindex="-1" aria-labelledby="ticket_modal_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ticket_modal_label">Creeaza un report</h5>
                </div>
                <form method="POST" action="{{ route('app.create.report') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="author" value="{{ Auth::user()->id }}">
                        <select name="report_type" class="custom-input mb-3">
                            <option selected>Selecteaza tipul</option>
                            <option value="1">Report Jucator</option>
                            <option value="2">Report Staff</option>
                        </select>
                        <input class="custom-input mb-3" name="reported_player" placeholder="Numele Jucatorului Raportat">
                        <textarea class="custom-input" name="informations" placeholder="Mai multe informatii"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn border border-color text-light" data-bs-dismiss="modal">Inchide</button>
                        <button type="submit" class="btn btn-primary">Raporteaza</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
