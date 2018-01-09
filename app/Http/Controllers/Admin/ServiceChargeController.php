<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceCharge;

class ServiceChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_header = 'Biaya Servis';
        $service_charges = ServiceCharge::all();
        return view('admin.service_charge.index', compact('service_charges', 'page_header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_header = 'Buat Biaya Servis';
        return view ('admin.service_charge.create', compact('page_header'));
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
            'cost_service' => 'required|numeric'
        ]);  

        ServiceCharge::create([
            'cost' => $request->cost_service,
        ]);

        return redirect('admin/service_charge')->with('alert-success', 'Berhasil dibuat.');
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
        $page_header = 'Edit Biaya Servis';
        $sc = ServiceCharge::find($id);
        return view('admin.service_charge.edit', compact('sc', 'page_header'));
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
            'cost_service' => 'required|numeric',
        ]);

        ServiceCharge::find($id)->update([
            'cost' => $request->cost_service
        ]);

        return redirect('admin/service_charge')->with('alert-success', 'Berhasil diupdate.');
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
}
