<?php

namespace App\Http\Controllers;

use App\Models\Master_tipe_akun;
use App\Models\Master_unit;
use Illuminate\Http\Request;

class MasterUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Master_unit::with('wilayah')->paginate(5);
        return $data;
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
        $this->validate($request,[
            'deputi'=>'required',
            'unit'=>'required',
            'jumlahPegawai'=>'required',

        ]);

        $masterPusat = new Master_unit();
        $masterPusat->deputi = $request->deputi;
        $masterPusat->unit = $request->unit;
        $masterPusat->jumlah_pegawai = $request->jumlahPegawai;
        $masterPusat->save();
        // return response($value,201);
        return response('Successfully Created a new Master Pusat', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Master_unit::find($id);
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
        $this->validate($request,[
            'deputi'=>'required',
            'unit'=>'required',
            'jumlahPegawai'=>'required',
        ]);

        $masterPusat = Master_unit::find($id);
        $masterPusat->deputi = $request->deputi;
        $masterPusat->unit = $request->unit;
        $masterPusat->jumlah_pegawai = $request->jumlahPegawai;
        $masterPusat->save();
        // return response($value,201);
        return response('Successfully Updated a Master Pusat', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Master_unit::find($id)->delete();
        return response('Successfully Deleted a Master Pusat', 200);
    }

    public function getUnit(int $wilayah)
    {
        $data = Master_unit::where('id_wilayah', $wilayah)->get();
        return $data;
    }
}
