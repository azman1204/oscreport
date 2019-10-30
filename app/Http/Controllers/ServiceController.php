<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

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
}
