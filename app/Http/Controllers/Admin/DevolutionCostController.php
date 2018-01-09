<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DevolutionCost;

class DevolutionCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_header = 'Biaya Peralihan';
        $devolution_costs = DevolutionCost::all();
        return view('admin.devolution_cost.index', compact('devolution_costs', 'page_header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_header = 'Buat Biaya Peralihan';
        return view ('admin.devolution_cost.create', compact('page_header'));
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
            'cost_devolution' => 'required|numeric'
        ]);  

        DevolutionCost::create([
            'cost' => $request->cost_devolution,
        ]);

        return redirect('admin/devolution_cost')->with('alert-success', 'Berhasil dibuat.');
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
        $page_header = 'Edit Biaya Peralihan';
        $dc = DevolutionCost::find($id);
        return view('admin.devolution_cost.edit', compact('dc', 'page_header'));
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
            'cost_devolution' => 'required|numeric'
        ]);  

        DevolutionCost::find($id)->update([
            'cost' => $request->cost_devolution
        ]);

        return redirect('admin/devolution_cost')->with('alert-success', 'Berhasil diupdate.');
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
