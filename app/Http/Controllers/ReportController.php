<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReportRequest;
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
}
