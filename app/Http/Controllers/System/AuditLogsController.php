<?php

namespace App\Http\Controllers\System;

use App\Models\AuditLog;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AuditLogsController extends Controller
{

    function __construct() {
        $this->middleware( 'permission:list_activity_log', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:show_log', [ 'only' => [ 'show'] ] );
        $this->middleware( 'permission:delete_log', [ 'only' => [ 'destroy' ] ] );
    }

    public function index(Request $request)
    {
        $logs = AuditLog::with('user','loggable')->latest()->get();
        return view('dashboard.logs.index',compact('logs'));
    }

    public function show($id)
    {
        // abort_if(Gate::denies('audit_log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $log = AuditLog::findOrFail($id);
        return view('dashboard.logs.show', compact('log'));
    }


      public function destroy($id)
    {
        $log= AuditLog::findOrFail($id);
        $log->delete();
        toast(__('back.Log has been deleted successfully'),'success');
        return redirect(route('system.logs.index'));
    }
}
