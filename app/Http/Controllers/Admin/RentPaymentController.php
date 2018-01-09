<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RentPayment;
use App\Rent;
use Auth;

class RentPaymentController extends Controller
{
    private function generate_receipt_number(){

        $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $month = date('m') - 1;
        $invoice = 'KWT/PWS/'.$romawi[$month].'/'.date('Y').'/';
        if (RentPayment::all()->count() < 1) {
            return $invoice."00001";            
        }else{
            $id = RentPayment::all()->last()->id + 1;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($rent)
    {
        $page_header = 'Input Pembayaran';
        $rec_num = $this->generate_receipt_number();
        $rent_id = $rent;
        return view ('admin.rent_payment.create', compact('rec_num', 'rent_id', 'page_header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $rent)
    {
        $remain_payment = Rent::find($rent)->remain_payment;
        $rec_num = $this->generate_receipt_number();

        $this->validate($request, [
            'payment_amount' => 'required|numeric',
        ]);

        if ($request->payment_amount > $remain_payment) {
            return redirect()->back()->withInput()
            ->withErrors(array('payment_amount' => 'Jumlah Bayar Melibihi Total Sewa.'));
        }

        RentPayment::create([
            'receipt_number' => $rec_num,
            'rent_id' => $rent,
            'payment_amount' => $request->payment_amount,
            'created_by' => Auth::user()->id,
        ]);

        return redirect('admin/rent/'.$rent)->with('alert-success', 'Berhasil dibuat.');
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

    public function receipt($rent ,$id){
        $rp = RentPayment::find($id);
        return view('admin.rent_payment.receipt', compact('rp'));
    }

}
