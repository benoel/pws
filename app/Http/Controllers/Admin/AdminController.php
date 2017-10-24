<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_header = 'Admin Users';
        $admins = User::where('role', 1)->get();

        if (Auth::user()->role == 1) {
            return view('admins.admin.index_regular_admin', compact('page_header'));
        }elseif(Auth::user()->role == 2) {
            return view('admins.admin.index_super_admin', compact('page_header', 'admins'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_header = 'Buat Admin baru';
        return view ('admins.admin.create', compact('page_header'));
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
            'nama' => 'required|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);  

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
        ]);

        return redirect('admin/admin')->with('alert-success', 'Berhasil dibuat.');
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
        $page_header = 'Edit Admin';
        $admin = User::find($id);
        return view('admins.admin.edit', compact('admin', 'page_header'));
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
            'nama' => 'required|max:20',
            'email' => "required|unique:users,email,$id"
        ]);

        User::find($id)->update([
            'name' => $request->nama,
            'email' => $request->email
        ]);

        return redirect('admin/admin')->with('alert-success', 'Berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('admin/admin')->with('alert-success', 'Berhasil dihapus.');
    }

    public function change_password($id){
        $page_header = 'Rubah Password';

        return view('admins.admin.change_password', compact('page_header'));
    }


    public function update_password(Request $request, $id){
        $this->validate($request, [
            'password' => 'required|min:6|confirmed'
        ]);

        $curr_pass = User::find($id)->password;
        if (Hash::check($request->old_password, $curr_pass)) {
            User::find($id)->update([
                'password' => Hash::make($request->password)
            ]);
            Auth::logout();
            return redirect('login')->with('alert-info', 'Silahkan login kembali.');
        }else{
            return redirect()->back()->with('alert-danger', 'Password lama tidak sesuai!');
        }
    }
}
