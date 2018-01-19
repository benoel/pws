<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherTransaction;
use App\Unit;

class OtherTransactionController extends Controller
{
    private function generate_transaction_number(){

        $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $month = date('m') - 1;
        $invoice = 'OTH/PWS/'.$romawi[$month].'/'.date('Y').'/';
        if (OtherTransaction::all()->count() < 1) {
            return $invoice."00001";            
        }else{
            $id = OtherTransaction::all()->last()->id + 1;
            if ($id < 10) {
                return $invoice."0000".$id;            
            }elseif ($id < 100) {
                return $invoice."000".$id;
            }elseif ($id < 1000) {
                return $invoice."00".$id;
            }elseif ($id < 10000) {
                return $invoice."0".$id;
            }else{
                return $invoice.$id;
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_header = 'Transaksi Lain-Lain';
        $other_transactions = OtherTransaction::all();
        return view('admin.other_transaction.index', compact('other_transactions', 'page_header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_header = 'Buat Transaksi Baru';
        $units = Unit::all();
        $trans_num = $this->generate_transaction_number();

        return view ('admin.other_transaction.create', compact('units', 'trans_num', 'page_header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'unit_id' => 'required',
            'note' => 'required',
            'cost_other' => 'required|numeric',
        ]);

        $trans_num = $this->generate_transaction_number();

        OtherTransaction::create([
            'transaction_number' => $trans_num,
            'unit_id' => $request->unit_id,
            'note' => $request->note,
            'cost' => $request->cost_other,
        ]);

        return redirect('admin/other_transaction')->with('alert-success', 'Berhasil dibuat.');
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
        $delete = OtherTransaction::destroy($id);
        if ($delete) {
            return redirect()->back()->with('alert-success', 'Berhasil dihapus.');
        }
        return redirect()->back()->with('alert-danger', 'Gagal dihapus.');
    }

    public function receipt($id){
        $ot = OtherTransaction::find($id);
        return view('admin.other_transaction.receipt', compact('ot'));
    }

}
