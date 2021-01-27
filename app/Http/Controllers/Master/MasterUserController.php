<?php

namespace App\Http\Controllers\Master;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('idUnit')->with('tipeAkun')->with('wilayah')->paginate(5);
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
            'email'=>'required',
            'username' =>'required',
            'password'=>'required',
            'tipeAkun'=>'required',
            'idWilayah'=>'required',
            'idUnit'=>'required',
        ]);

        $masterUser = new User();
        $masterUser->name = $request->nama;
        $masterUser->username = $request->username;
        $masterUser->email = $request->email;
        $masterUser->password = Hash::make($request->password);
        $masterUser->tipe_akun = $request->tipeAkun;
        $masterUser->id_wilayah = $request->idWilayah;
        $masterUser->id_unit = $request->idUnit;
        $masterUser->save();
        return response('Successfully Created a new User', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit  = User::find($id);
        return $unit;
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
            'email'=>'required',
            'username' =>'required',
            'tipeAkun'=>'required',
            'idWilayah'=>'required',
            'idUnit'=>'required',
        ]);

        $masterUser = User::find($id);
        $masterUser->name = $request->nama;
        $masterUser->username = $request->username;
        $masterUser->email = $request->email;
        if($request->password != null){
            $masterUser->password = Hash::make($request->password);
        }
        $masterUser->tipe_akun = $request->tipeAkun;
        $masterUser->id_wilayah = $request->idWilayah;
        $masterUser->id_unit = $request->idUnit;
        $masterUser->save();
        return response('Successfully Updated a User', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response('Successfully Deleted a Data User', 200);
    }
}
