<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoriB;
use App\Provinsi;
use App\Training;
use App\Akun;
use DB;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training = DB::table('provinsi')
        ->leftJoin('training', 'provinsi.id_provinsi', '=', 'training.lokasi')
        ->where('training.keterangan', '!=','null')
        ->get();
        return view('training/list',compact('training'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location=Provinsi::all();
        $training=Training::all();
        return view('training/input', compact('location', 'training'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['tgl_training'  =>'Required',
                                   'lokasi'       =>'Required',
                                   'keterangan'=>'Required']);

        $training=$request->all();
        training::create($training);
        return redirect('training/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_training)
    {
        $training=Training::find($id_training);
        $location=Provinsi::find($training->lokasi);
        $historit = DB::table('training')
        ->leftJoin('historit', 'training.id_training', '=', 'historit.id_training')
        ->get();
        $akun=Akun::all();
        return view('training/show', compact('training','location','akun','historit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_training)
    {
        $location=Provinsi::all();
        $training=Training::find($id_training);
        return view('training/edit', compact('location', 'training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_training)
    {
        $this->validate($request, ['tgl_training'=>'Required',
                                   'lokasi'=>'Required',
                                   'keterangan'=>'Required']);

        $training=Training::find($id_training);
        $trainingUpdate=$request->all();
        $training->update($trainingUpdate);
        return redirect('training/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_training)
    {
        $training=Bencana::find($id_training);
        $training->delete();
        return redirect('training/list');
    }

}
