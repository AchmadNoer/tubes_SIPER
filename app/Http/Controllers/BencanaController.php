<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinsi;
use App\Bencana;
use DB;

class BencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bencana = DB::table('provinsi')
        ->leftJoin('bencana', 'provinsi.id_provinsi', '=', 'bencana.lokasi')
        ->where('bencana.jenis_bencana', '!=','null')
        ->get();
        return view('bencana/list',compact('bencana'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location=Provinsi::all();
        $bencana=Bencana::all();
        return view('bencana/input', compact('location', 'bencana'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['tgl_bencana'  =>'Required',
                                   'lokasi'       =>'Required',
                                   'jenis_bencana'=>'Required',
                                   'deskripsi'    =>'Required']);

        $bencana=$request->all();
        bencana::create($bencana);
        return redirect('bencana/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_bencana)
    {
        $bencana=Bencana::find($id_bencana);
        $location=Provinsi::find($bencana->lokasi);
        return view('bencana/show', compact('bencana','location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_bencana)
    {
        $location=Provinsi::all();
        $bencana=Bencana::find($id_bencana);
        return view('bencana/edit', compact('location', 'bencana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_bencana)
    {
        $this->validate($request, ['tgl_bencana'=>'Required',
                                   'lokasi'=>'Required',
                                   'jenis_bencana'=>'Required',
                                   'deskripsi'=>'Required']);

        $bencana=Bencana::find($id_bencana);
        $bencanaUpdate=$request->all();
        $bencana->update($bencanaUpdate);
        return redirect('bencana/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_bencana)
    {
        $bencana=Bencana::find($id_bencana);
        $bencana->delete();
        return redirect('bencana/list');
    }

}
