<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rent;
use App\User;
use App\Unit;
use App\ServiceCharge;
use App\RentPayment;
use Auth;

class RentController extends Controller
{

    private function generate_invoice_number(){

        $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $month = date('m') - 1;
        $invoice = 'INV/PWS/'.$romawi[$month].'/'.date('Y').'/';
        if (Rent::all()->count() < 1) {
            return $invoice."00001";            
        }else{
            $id = Rent::all()->last()->id + 1;
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
        $page_header = 'Transaksi Sewa';
        $rents = Rent::all();
        return view('admin.rent.index', compact('rents', 'page_header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_header = 'Buat Transaksi';
        $users = User::where('role', 0)->get();
        $units = Unit::all();
        $inv_num = $this->generate_invoice_number();
        return view ('admin.rent.create', compact('inv_num', 'users', 'units', 'page_header'));
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
            'user_id' => 'required',
            'unit_id' => 'required',
            'rent_length' => 'required|numeric|max:36',
        ]);
        $sc = ServiceCharge::first()->cost * $request->rent_length;
        $uc = Unit::find($request->unit_id)->cost * $request->rent_length;
        $total_cost = $uc + $sc;
        $inv_num = $this->generate_invoice_number();

        // jika user sudah menyewa
        if (Rent::where([
            'user_id' => $request->user_id,
            'unit_id' => $request->unit_id
        ])->count() == 1) {
            return redirect()->back()->with('alert-danger', 'Unit sudah disewa Penyewa.');
        }

        $rent = Rent::create([
            'invoice_number' => $inv_num,
            'user_id' => $request->user_id,
            'unit_id' => $request->unit_id,
            'service_charge' => $sc,
            'rent_length' => $request->rent_length,
            'total_cost' => $total_cost,
            'created_by' => Auth::user()->id,
        ])->id;

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
        $page_header = 'Detail Transaksi';
        $rent = Rent::find($id);
        return view('admin.rent.show', compact('rent', 'page_header'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_header = 'Edit Transaksi Sewa';
        $users = User::where('role', 0)->get();
        $units = Unit::all();
        $rent = Rent::find($id);
        return view('admin.rent.edit', compact('rent', 'units', 'users', 'page_header'));
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
        $this->validate($request, [
            'user_id' => 'required',
            'unit_id' => 'required',
            'rent_length' => 'required|numeric|max:36',
        ]);

        if (Rent::where([
            'user_id' => $request->user_id,
            'unit_id' => $request->unit_id
        ])->count() == 1) {
            return redirect()->back()->with('alert-danger', 'Unit sudah disewa Penyewa.');
        }

        $sc = ServiceCharge::first()->cost * $request->rent_length;
        $uc = Unit::find($request->unit_id)->cost * $request->rent_length;
        $total_cost = $uc + $sc;

        $rent = Rent::find($id)->update([
            'user_id' => $request->user_id,
            'unit_id' => $request->unit_id,
            'service_charge' => $sc,
            'rent_length' => $request->rent_length,
            'total_cost' => $total_cost,
            'created_by' => Auth::user()->id,
        ])->id;

        return redirect('admin/rent/'.$rent)->with('alert-success', 'Berhasil diubah.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Rent::destroy($id);
        if ($delete) {
            RentPayment::where('rent_id', $id)->delete();
            return redirect('admin/rent')->with('alert-success', 'Berhasil dihapus.');
        }
        return redirect()->back()->with('alert-danger', 'Gagal dihapus.');
    }

    public function agreement($id){
        $rent = Rent::find($id);
        return view('admin.rent.agreement', compact('rent'));
    }

    public function invoice($id){
        $rent = Rent::find($id);
        return view('admin.rent.invoice', compact('rent'));
    }
}
