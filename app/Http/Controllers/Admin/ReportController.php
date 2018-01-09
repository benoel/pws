<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rent;
use App\RentPayment;
use App\Devolution;
use App\OtherTransaction;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_header = 'Laporan';
        return view('admin.report.index', compact('page_header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function result(Request $request){
        // date('d-m-Y', strtotime($request->from))

        switch ($request->report) {
            case 'rent':
            if ($request->from == '' && $request->to == '') {
                $rents = Rent::all();
                $from = '-';
                $to = '-';
            }else{
                $rents = Rent::whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();

                $from = $request->from;
                $to = $request->to;
            }
            return view('admin.report.result_rent', compact('rents', 'from', 'to'));

            break;
            case 'rent_payment':
            if ($request->from == '' && $request->to == '') {
                $rent_payments = RentPayment::all();
                $from = '-';
                $to = '-';
            }else{
                $rent_payments = RentPayment::whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();

                $from = $request->from;
                $to = $request->to;
            }
            return view('admin.report.result_rent_payment', compact('rent_payments', 'from', 'to'));

            break;
            case 'devolution':
            if ($request->from == '' && $request->to == '') {
                $devolutions = Devolution::all();
                $from = '-';
                $to = '-';
            }else{
                $devolutions = Devolution::whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();

                $from = $request->from;
                $to = $request->to;
            }
            return view('admin.report.result_devolution', compact('devolutions', 'from', 'to'));

            break;
            case 'other':
            if ($request->from == '' && $request->to == '') {
                $others = OtherTransaction::all();
                $from = '-';
                $to = '-';
            }else{
                $others = OtherTransaction::whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59'])->get();

                $from = $request->from;
                $to = $request->to;
            }
            return view('admin.report.result_other', compact('others', 'from', 'to'));

            break;
        }
    }
}
