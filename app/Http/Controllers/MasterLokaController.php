<?php

namespace App\Http\Controllers;

use App\Models\Master_loka;
use Illuminate\Http\Request;

class MasterLokaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Master_loka::paginate(5);
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
            'nama'=>'required',
            'jumlahPegawai'=>'required',

        ]);

        $masterLoka = new Master_loka();
        $masterLoka->nama = $request->nama;
        $masterLoka->jumlah_pegawai = $request->jumlahPegawai;
        $masterLoka->save();
        return response('Successfully Created a new Master Loka', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Master_loka::find($id);
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
            'nama'=>'required',
            'jumlahPegawai'=>'required',

        ]);

        $masterLoka = Master_loka::find($id);
        $masterLoka->nama = $request->nama;
        $masterLoka->jumlah_pegawai = $request->jumlahPegawai;
        $masterLoka->save();

        return response('Successfully Updated a Master Loka', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Master_loka::find($id)->delete();
        return response('Successfully Deleted a Master Loka', 200);
    }
}
