<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use App\BusinessField;
use App\Rent;
use App\RentPayment;
use App\Devolution;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_header = 'Profile';
        $tenant = User::find(Auth::user()->id);
        return view('tenant.home', compact('tenant', 'page_header'));
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
        $page_header = 'Edut Profile';
        $business_fields = BusinessField::all();
        return view ('tenant.edit', compact('page_header', 'business_fields'));
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
            'name' => 'required|max:30',
            'email' => 'required|unique:users,email',
            'address' => 'required',
            'identity_card_number' => 'required|numeric|digits_between:10,16',
            'npwp' => 'digits:16',
            'phone_number' => 'required|numeric|digits_between:10,14',
            'business_field_id' => 'required',
        ]);  

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'identity_card_number' => $request->identity_card_number,
            'npwp' => $request->npwp,
            'company' => $request->company,
            'business_field_id' => $request->business_field_id,
        ]);

        return redirect('tenant')->with('alert-success', 'Berhasil dirubah.');
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

    public function edit_password($id){
        return view('tenant.edit_password');
    }

    public function update_password(Request $request, $id){
        $this->validate($request, [
            'new_password' => 'required|min:6',
            'new_confirm_password' => 'required|same:new_password'
        ]);

        $oldpass = Auth::user()->password;
        if (Hash::check($request->old_password, $oldpass)) {
            User::find($id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            Auth::logout();
            return redirect('login')->with('alert-info', 'Password Berhasil dirubah, silahkan login kembali!');
        }else{
            return redirect()->back()->withInput()
            ->withErrors(array('old_password' => 'Password lama tidak sama.'));
        }
    }

    public function invoice(){
        $page_header = 'Riwayat Sewa dan Tagihan';
        $user = Auth::user();
        return view('tenant.invoice', compact('user', 'page_header'));
    }

    public function receipt($id){
        if (Auth::user()->id != Rent::find($id)->user_id) {
            return view()->back();
        }
        $page_header = 'Invoice '.Rent::find($id)->invoice_number;
        $rentpayments = RentPayment::where('rent_id', $id)->get();
        return view('tenant.receipt', compact('rentpayments', 'page_header'));
    }

    public function agreement($id){
        $rent = Rent::find($id);
        return view('tenant.agreement', compact('rent'));
    }

    public function devolution(){
        $page_header = 'Peralihan';
        $devolutions = Devolution::where('from_user', Auth::user()->id)
        ->orWhere('to_user', Auth::user()->id)->get();
        return view('tenant.devolution', compact('devolutions', 'page_header'));
    }

    public function devolution_agreement($id){
        $devolution = Devolution::find($id);
        return view('tenant.devolution_agreement', compact('devolution'));
    }

}
