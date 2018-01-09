<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unit;
use App\Floor;
use App\Block;
use App\Type;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_header = 'Unit';
        $units = Unit::all();
        return view('admin.unit.index', compact('units', 'page_header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_header = 'Buat unit baru';
        $floors = Floor::all();
        $blocks = Block::all();
        $types = Type::all();
        return view ('admin.unit.create', compact('floors', 'blocks', 'types', 'page_header'));
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
            'unit_identity' => 'required|max:10',
            'va_number' => 'required|numeric|digits_between:10,16',
            'capacious' => 'required|numeric',
            'floor_id' => 'required',
            'block_id' => 'required',
            'type_id' => 'required',
            'cost_unit' => 'required|numeric',
        ]);  

        Unit::create([
            'unit_identity' => $request->unit_identity,
            'va_number' => $request->va_number,
            'capacious' => $request->capacious,
            'floor_id' => $request->floor_id,
            'block_id' => $request->block_id,
            'type_id' => $request->type_id,
            'cost' => $request->cost_unit,
        ]);

        return redirect('admin/unit')->with('alert-success', 'Berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $page_header = 'Detail Info';
        $unit = Unit::find($id);
        return view('admin.unit.show', compact('unit', 'page_header'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_header = 'Edit Unit';
        $unit = Unit::find($id);
        $floors = Floor::all();
        $blocks = Block::all();
        $types = Type::all();
        return view('admin.unit.edit', compact('floors', 'blocks', 'types', 'unit', 'page_header'));
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
            'unit_identity' => 'required|max:10',
            'va_number' => 'required|numeric|digits_between:10,16',
            'capacious' => 'required|numeric',
            'floor_id' => 'required',
            'block_id' => 'required',
            'type_id' => 'required',
            'cost_unit' => 'required|numeric',
        ]);

        Unit::find($id)->update([
            'unit_identity' => $request->unit_identity,
            'va_number' => $request->va_number,
            'capacious' => $request->capacious,
            'floor_id' => $request->floor_id,
            'block_id' => $request->block_id,
            'type_id' => $request->type_id,
            'cost' => $request->cost_unit,
        ]);

        return redirect('admin/unit')->with('alert-success', 'Berhasil diupdate.');
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
