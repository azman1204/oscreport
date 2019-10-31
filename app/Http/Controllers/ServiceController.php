<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServiceController extends Controller {
    function report1() {
        // panggil view di resources/views/service/report1.blade.php

        // teknik ini tidak guna model. nama teknik ini QUERY BUILDER
        //$rs = DB::table('egov_service')->where('result_tx', '=', 'batal')->get();
        $rs = DB::table('egov_service')
        ->select(DB::raw('COUNT(*) as bil, result_tx'))
        ->groupBy('result_tx')
        ->get();
        return view('service.report1', ['arr' => $rs]);
    }

    // form carian projek dan hasil carian
    function report2(Request $req) {
        if (! empty($req->tajuk)) {
            // user submit form carian
            $tajuk = $req->tajuk;
            $rs = DB::table('egov_service')
            ->select(DB::raw("CONCAT(projectid_int, '-', serviceno_tx) AS id_permohonan, servicename_tx"))
            ->where('servicename_tx', 'LIKE', "%$tajuk%")
            // ->orWhere(DB::raw("CONCAT(projectid_int, '-', serviceno_tx)"), 'LIKE', '%$tajuk%')
            ->orWhereRaw("CONCAT(projectid_int, '-', serviceno_tx) LIKE '%$tajuk%'")
            ->paginate(20);
        } else {
            $rs = [];
        }
        return view('service.report2', ['rs' => $rs]);
    }

    function report2Details($id) {
        $rs = DB::table('egov_service')
        ->select(DB::raw("departmentname_tx, DATEDIFF(completiondate_ts, crateddate_ts) AS hari,
        b.crateddate_ts, b.completiondate_ts, b.servicestage_tx"))
        ->join('egov_servicestage', 'egov_service.serviceid_int', '=', 'egov_servicestage.serviceid_int')
        ->join('department', 'department.departmentid_int', '=', 'egov_servicestage.processedby_int')
        ->whereIn('servicestage_tx', ['3', '3b'])
        ->get();

        return view('service.report2_details', ['rs' => $rs]);
    }
}
