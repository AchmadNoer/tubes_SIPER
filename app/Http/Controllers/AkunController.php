<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Akun;
use App\HistoriB;
use DB;

class AkunController extends Controller
{
    //

    public function index()
    {
        $akun = DB::table('akun')
        ->where('akun.id', '!=','0')
        ->get();
        return view('akun/list',compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama' => 'required',
                                   'alamat' => 'required',
                                   'tempatlhr' => 'required',
                                   'tanggallhr' => 'required',
                                   'gender' => 'required',
                                   'noHP' => 'required|unique:akun',
                                   'email' => 'required|min:4|email|unique:akun',
                                   'password' => 'required|min:6',
                                   'confirmation' => 'required|same:password',
                                   'keahlian' => 'required',
                                   'kompetensi' => 'required',
                                   'status' => 'required']);
        $data =  new Akun();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tempatlhr = $request->tempatlhr;
        $data->tanggallhr = $request->tanggallhr;
        $data->gender = $request->gender;
        $data->noHP = $request->noHP;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->keahlian = $request->keahlian;
        $data->kompetensi = $request->kompetensi;
        $data->status = $request->status;
        $data->save();
        return redirect('/masuk')->with('alert-success','Selamat, kamu telah terdaftar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $akun=Akun::find($id);
        return view('akun/show', compact('akun'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun=Akun::find($id);
        return view('akun/edit', compact('akun'));
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
        $this->validate($request, ['nama' => 'required',
                                   'alamat' => 'required',
                                   'tempatlhr' => 'required',
                                   'tanggallhr' => 'required',
                                   'gender' => 'required',
                                   'noHP' => 'required',
                                   'email' => 'required|min:4|email',
                                   'password' => 'required|min:6',
                                   'confirmation' => 'required|same:password',
                                   'keahlian' => 'required',
                                   'kompetensi' => 'required',
                                   'status' => 'required']);
        $data = Akun::find($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tempatlhr = $request->tempatlhr;
        $data->tanggallhr = $request->tanggallhr;
        $data->gender = $request->gender;
        $data->noHP = $request->noHP;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->keahlian = $request->keahlian;
        $data->kompetensi = $request->kompetensi;
        $data->status = $request->status;
        $data->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akun=Akun::find($id);
        $akun->delete();
        return redirect('akun/list');
    }

    public function login()
    {
        return view('akun/masuk');
    }

    public function loginPost(Request $request)
    {
        $noHP = $request->noHP;
        $password = $request->password;
        $data = Akun::where('noHP',$noHP)->first();
        if(count((array)$data) > 0){
            if($password==$data->password){
                Session::put('id',$data->id);
                Session::put('name',$data->nama);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('/home');
            }else{
                return redirect('/masuk')->with('alert','Password atau Nomor HP, Salah !');
            }
        }else{
            return redirect('/masuk')->with('alert','Akun tidak ditemukan !');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/home')->with('alert','Anda sudah logout');
    }

    public function beranda()
    {
        $training = DB::table('provinsi')
        ->leftJoin('training', 'provinsi.id_provinsi', '=', 'training.lokasi')
        ->where('training.keterangan', '!=','null')
        ->orderBy('tgl_training','DESC')
        ->limit(4)
        ->get();
        return view('/home',compact('training'));
    }

}