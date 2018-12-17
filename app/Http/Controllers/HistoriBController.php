<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Akun;
use App\Bencana;
use App\HistoriB;

class HistoriBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historib = DB::table('historib')
        ->orderBy('id_bencana', 'ASC')
        ->get();
        return view('historib',compact('historib'));
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
        $bencana=Bencana::all();
        return view('bencana/presensi', compact('akun', 'bencana'));
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
                                   'id_bencana'  =>'Required']);

        $data =  new HistoriB();
        $data->id_relawan = $request->id_relawan;
        $data->id_bencana = $request->id_bencana;
        $data->save();
        return redirect('/bencana/list');
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
