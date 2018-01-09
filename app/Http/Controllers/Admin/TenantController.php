<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\User;
use App\BusinessField;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $page_header = 'Penyewa';
        $tenants = User::where('role', 0)->get();
        return view('admin.tenant.index', compact('tenants', 'page_header'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_header = 'Daftar penyewa baru';
        $business_fields = BusinessField::all();
        return view ('admin.tenant.create', compact('page_header', 'business_fields'));
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
            'name' => 'required|max:30',
            'email' => 'required|unique:users,email',
            'address' => 'required',
            'identity_card_number' => 'required|numeric|digits_between:10,16',
            'npwp' => 'digits:16',
            'phone_number' => 'required|numeric|digits_between:10,14',
            'business_field_id' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);  

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'identity_card_number' => $request->identity_card_number,
            'npwp' => $request->npwp,
            'company' => $request->company,
            'business_field_id' => $request->business_field_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect('admin/tenant')->with('alert-success', 'Berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_header = 'Detail Penyewa';
        $tenant = User::find($id);
        return view('admin.tenant.show', compact('tenant', 'page_header'));
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

    public function block_user(Request $request){
        User::find($request->id)->update([
            'active' => 1
        ]);
        return redirect('admin/tenant')->with('alert-info', 'Penyewa berhasil di blok!');
    }

    public function active_user(Request $request){
        User::find($request->id)->update([
            'active' => 0
        ]);
        return redirect('admin/tenant')->with('alert-info', 'Penyewa berhasil di aktifkan!');
    }
}
