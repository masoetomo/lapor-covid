<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataCovidCollection;
use App\Models\Data_covid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Http\Response;
use SebastianBergmann\Environment\Console;

class DataCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = Auth::id();
        $data = Data_covid::where('id_user', $value)->orderBy('tanggal','desc')->paginate(10);
        return $data;
        // return response()->json(
        //     new DataCovidCollection($data)
        // );
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
            'penambahanKasus'=>'required|numeric|min:0',
            'dalamPerawatan'=>'required|numeric|min:0',
            'penambahanSembuh'=>'required|numeric|min:0',
            'sembuh'=>'required|numeric|min:0',
            'meninggal'=>'required|numeric|min:0',
            'sakitBukanCovid'=>'required|numeric|min:0'
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
        return Data_covid::find($id);
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
            'date'=>'required|date',
            'penambahanKasus'=>'required',
            'dalamPerawatan'=>'required',
            'penambahanSembuh'=>'required',
            'sembuh'=>'required',
            'meninggal'=>'required',
            'sakitBukanCovid'=>'required'
        ]);

        // var_dump($value);
        $dataCovid = Data_covid::find($id);
        $dataCovid->tanggal = $request->date;
        $dataCovid->penambahan_kasus = $request->penambahanKasus;
        $dataCovid->dalam_perawatan = $request->dalamPerawatan;
        $dataCovid->penambahan_sembuh = $request->penambahanSembuh;
        $dataCovid->sembuh = $request->sembuh;
        $dataCovid->meninggal = $request->meninggal;
        $dataCovid->sakit_bukan_covid = $request->sakitBukanCovid;

        $dataCovid->save();
        // return response($value,201);
        return response('Successfully Updated a Data Covid', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Data_covid::find($id)->delete();
        return response('Successfully Deleted a Data Covid', 200);
    }
}
