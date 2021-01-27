<?php

namespace App\Http\Controllers;

use App\Models\Master_wilayah;
use Illuminate\Http\Request;

class MasterWilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Master_wilayah::paginate(10);
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
            'namaWilayah'=>'required',
        ]);

        $masterWilayah = new Master_wilayah();
        $masterWilayah->nama_wilayah = $request->namaWilayah;
        $masterWilayah->save();
        // return response($value,201);
        return response('Successfully Created a new Wilayah Kerja', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Master_wilayah::find($id);
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
            'namaWilayah'=>'required',
        ]);

        $masterWilayah = Master_wilayah::find($id);
        $masterWilayah->nama_wilayah = $request->namaWilayah;
        $masterWilayah->save();
        // return response($value,201);
        return response('Successfully Updated a Wilayah Kerja', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Master_wilayah::find($id)->delete();
        return response('Successfully Deleted a Wilayah Kerja', 200);
    }
}
