<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Devolution;
use App\DevolutionCost;
use App\User;
use App\Rent;

class DevolutionController extends Controller
{
    private function generate_transaction_number(){

        $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $month = date('m') - 1;
        $invoice = 'PRL/PWS/'.$romawi[$month].'/'.date('Y').'/';
        if (Devolution::all()->count() < 1) {
            return $invoice."00001";            
        }else{
            $id = Devolution::all()->last()->id + 1;
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
        $page_header = 'Transaksi Peralihan';
        $devolutions = Devolution::all();
        return view('admin.devolution.index', compact('devolutions', 'page_header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_header = 'Buat Transaksi Peralihan';
        $tenants = User::where([
            'role' => 0,
            'active' => 0
        ])->get();
        $trans_num = $this->generate_transaction_number();
        return view('admin.devolution.create', compact('tenants', 'trans_num', 'page_header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trans_num = $this->generate_transaction_number();

        $this->validate($request, [
            'from_user' => 'required',
            'to_user' => 'required',
        ]);

        if ($request->from_user == $request->to_user) {
            return redirect()->back()->with('alert-danger', 'Penyewa tidak boleh sama.');
        }
        if (Rent::where('user_id', $request->from_user)->count() <= 0) {
            return redirect()->back()->with('alert-danger', 'Penyewa pertama tidak punya Unit yang disewa.');
        }
        if (DevolutionCost::all()->count() <= 0) {
            return redirect()->back()->with('alert-danger', 'Biaya Peralihan masih kosong.');
        }

        $devolution =  Devolution::create([
            'transaction_number' => $trans_num,
            'from_user' => $request->from_user,
            'to_user' => $request->to_user,
        ])->id;

        return redirect('admin/devolution/'.$devolution.'/devolution_detail/create');
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
        Devolution::destroy($id);
        return redirect('admin/devolution');
    }

    public function agreement($id){
        $devolution = Devolution::find($id);
        return view('admin.devolution.agreement', compact('devolution'));
    }

}
