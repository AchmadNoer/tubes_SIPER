<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Akun;
use App\Training;
use App\HistoriT;

class HistoriTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historit = DB::table('historit')
        ->orderBy('id_training', 'ASC')
        ->get();
        return view('historit',compact('historit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akun = DB::table('akun')
        ->where('akun.id', '!=',0)
        ->where('akun.status', '=',1)
        ->get();
        $training=Training::all();
        return view('training/presensi', compact('akun', 'training'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['id_relawan'  =>'Required',
                                   'id_training'  =>'Required']);

        $data =  new HistoriT();
        $data->id_relawan = $request->id_relawan;
        $data->id_training = $request->id_training;
        $data->save();
        return redirect('/training/list');
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
