<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReportRequest;

class ReportController extends Controller
{
    public function viewReports() {
        $reports = Reports::where('author', Auth::id())->get();
        return view('pages.reports.app', compact('reports'));
    }

    public function createReport(ReportRequest $request) {
        if($request->validated()) {
            $create = Reports::create($request->except('_token'));
            if($create) {
                toastr()->success("L-ai raportat cu succes pe {$request->reported_player}");
            }
        }
        return redirect()->back();
    }
}
