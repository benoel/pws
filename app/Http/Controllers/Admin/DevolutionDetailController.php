<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rent;
use App\Devolution;
use App\DevolutionDetail;
use App\DevolutionCost;

class DevolutionDetailController extends Controller
{
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
    public function create($devolution)
    {

        $page_header = 'Detail Peralihan';
        $devolution_id = $devolution;
        $devolution_user = Devolution::find($devolution)->from_user;
        $units_user = Rent::where('user_id', $devolution_user)->get();

        return view ('admin.devolution_detail.create', compact('units_user', 'devolution_id', 'page_header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $devolution_id)
    {

        $units = $request->unit_id;
        $devolution = Devolution::find($devolution_id);
        
        foreach($units as $unit) {
            // DevolutionDetail::create([
            //     'devolution_id' => $devolution_id,
            //     'unit_id' => $unit,
            // ]);
            $devolution->devolution_details()->attach($unit);
        }

        $devolution_cost = count($units) * DevolutionCost::first()->cost;

        $rents = Rent::where('user_id', $devolution->from_user)->whereIn('unit_id', $units)->get();
        
        foreach ($rents as $rent) {
            Rent::find($rent->id)->update([
                'user_id' => $devolution->to_user
            ]);
        }

        $devolution->update([
            'cost' => $devolution_cost
        ]);

        return redirect('admin/devolution')->with('alert-success', 'Berhasil dibuat!');

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
}
