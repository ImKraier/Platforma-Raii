<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReportRequest;
use App\Http\Requests\AdminReportRequest;
use App\Models\User;
use Mail;
Use App\Mail\VerificationMail;

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
                $admins = User::where('admin_level', '>', 0)->get();
                foreach ($admins as $admin) {
                    $details = [
                        'admin_name' => $admin->uname,
                        'author_name' => $create->author_name,
                        'reported_name' => $create->reported_player,
                        'link' => route('app.admin.report', ['report' => $create->id]),
                    ];
                    Mail::to($admin->email)->send(new VerificationMail($details, "Un nou jucator a fost raportat", "emails.new_report"));
                }
                toastr()->success("L-ai raportat cu succes pe {$create->reported_player}");
            }
        }
        return redirect()->back();
    }

    public function sendAnswer(AdminReportRequest $request) {
        if($request->validated()) {
            $report = Reports::where('id', $request->report_id)->first();
            $report->answer = $request->answer;
            $report->status = 2;
            $report->solved_by = Auth::id();
            $report->save();
            $admin_name = Auth::user()->uname;
            $details = [
                'admin_name' => $admin_name,
                'author_name' => $report->author_name,
                'reported_name' => $report->reported_player,
                'link' => route('app.manage.report', ['report' => $report->id]),
            ];
            $author = User::where('id', $report->author)->first();
            Mail::to($author->email)->send(new VerificationMail($details, "Administratorul {$admin_name} ti-a raspuns la raport", "emails.report_answer"));
            toastr()->success("I-ai raspuns cu succes lui {$request->author_name}");
        }
        return redirect()->back();
    }

    public function manageReport($report) {
        $getReport = Reports::where('id', $report)->first();
        if($getReport->author == Auth::id()) {
            return view('pages.reports.view_report', compact('getReport'));
        }
        return redirect()->route('app.home');
    }
}
