<?php

namespace App\Http\Controllers;

use App\Models\Data_covid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;

class DataCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('DataCovid');
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
            'date'=>'required|date',
            'penambahanKasus'=>'required',
            'dalamPerawatan'=>'required',
            'penambahanSembuh'=>'required',
            'sembuh'=>'required',
            'meninggal'=>'required',
            'sakitBukanCovid'=>'required'
        ]);
        // $value = Auth::id();
        $value = $request->session()->get('id');

        // var_dump($value);
        $dataCovid = new Data_covid();
        $dataCovid->tanggal = $request->date;
        $dataCovid->penambahan_kasus = $request->penambahanKasus;
        $dataCovid->dalam_perawatan = $request->dalamPerawatan;
        $dataCovid->penambahan_sembuh = $request->penambahanSembuh;
        $dataCovid->sembuh = $request->sembuh;
        $dataCovid->meninggal = $request->meninggal;
        $dataCovid->sakit_bukan_covid = $request->sakitBukanCovid;
        $dataCovid->id_user = $value;

        $dataCovid->save();
        // return response($value,201);
        return response('Successfully Created a new Data Covid', 201);
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
