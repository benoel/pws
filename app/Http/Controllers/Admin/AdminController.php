<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;

class AdminController extends Controller
{

    protected function isSuperAdmin(){
        if (Auth::user()->role == 1) {
            return false;
        }
        return true;
    }

    protected function isCurrentUser($id){
        if (Auth::user()->id != $id) {
            return false;
        }
        return true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_header = 'Admin';
        $admins = User::where('role', 1)->get();
        if (Auth::user()->role == 1) {
            return view('admin.admin.index_regular_admin', compact('page_header'));
        }elseif(Auth::user()->role == 2) {
            return view('admin.admin.index_super_admin', compact('page_header', 'admins'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!$this->isSuperAdmin()) {
            return redirect()->back()->with('alert-danger', "Anda tidak punya hak akses!");
        }

        $page_header = 'Buat Admin baru';
        return view ('admin.admin.create', compact('page_header'));
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
            'name' => 'required|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);  

        User::create([
            'name' => $request->name,
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
        if (!$this->isCurrentUser($id)) {
            return redirect('admin/admin')->with('alert-danger', 'Anda tidak punya hak akses!');
        }
        $page_header = 'Edit Admin';
        $admin = User::find($id);
        return view('admin.admin.edit', compact('admin', 'page_header'));
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
            'name' => 'required|max:20',
            'email' => "required|unique:users,email,$id"
        ]);

        User::find($id)->update([
            'name' => $request->name,
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

        return view('admin.admin.change_password', compact('page_header'));
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
            return redirect('login')->with('alert-info', 'Password Berhasil dirubah, silahkan login kembali!');
        }else{
            return redirect()->back()->with('alert-danger', 'Password lama tidak sesuai!');
        }
    }

    public function block_user(Request $request){
        User::find($request->id)->update([
            'active' => 1
        ]);
        return redirect('admin/admin')->with('alert-info', 'User berhasil di blok!');
    }

    public function active_user(Request $request){
        User::find($request->id)->update([
            'active' => 0
        ]);
        return redirect('admin/admin')->with('alert-info', 'User berhasil di aktifkan!');
    }
}
