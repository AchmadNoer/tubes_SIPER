@extends('layouts.master')

@section('header')
    <img src="/BNPB.png" width="77" height="77" style="float: left;">
    <img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
    <h2 align="center" style="padding: 20px 0px 20px 0px;">Sistem Pendataan Relawan</h2>
@stop

@section('content')
<div style="background-color: lightblue; padding: 7px;">
    <a href="/home" class="btn">Beranda</a>|
    <a href="/bencana/list" class="btn">Info Bencana</a>|
    <a href="/training/list" class="btn">Info Training</a>|
    <a href="/masuk" class="btn btn-success" style="float: right;">Akun</a>
</div>
<section class="main-section">
    <div class="content">
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('/registerPost') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nama" class="control-label col-md-2">Nama Lengkap</label>
                <div class="col-md-10">
                    <input type="text" name="nama" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="control-label col-md-2">Alamat</label>
                <div class="col-md-10">
                    <input type="text" name="alamat" class="form-control" placeholder="Kota, Provinsi">
                </div>
            </div>
            <div class="form-group">
                <label for="tempatlhr tanggallhr" class="control-label col-md-2">Tempat, tanggal lahir</label>
                <div class="col-md-3">
                    <input type="text" name="tempatlhr" class="form-control" placeholder="Kota">
                </div>
                <div class="col-md-7">
                    <input type="date" name="tanggallhr" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="gender" class="control-label col-md-2">Gender</label>
                <div class="col-md-10">
                    <p class="btn"><input type="radio" name="gender" value="Pria" class="form-check-input"> Pria</p>
                    <p class="btn"><input type="radio" name="gender" value="Wanita" class="form-check-input"> Wanita</p>
                </div>
            </div>
            <div class="form-group">
                <label for="noHP" class="control-label col-md-2">Nomor HP</label>
                <div class="col-md-10">
                    <input type="number" name="noHP" class="form-control" pattern="[0-9{12}]">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-md-2">Email</label>
                <div class="col-md-10">
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-md-2">Password</label>
                <div class="col-md-10">
                    <input type="password" name="password" class="form-control" minlength="6">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="control-label col-md-2">Confirm Password</label>
                <div class="col-md-10">
                    <input type="password" name="confirmation" id="confirmation" class="form-control" minlength="6">
                </div>
            </div>
            <div class="form-group">
                <label for="keahlian" class="control-label col-md-2">Keahlian</label>
                <div class="col-md-10">
                    <input type="text" name="keahlian" class="form-control">
                </div>
            </div>
            <input type="boolean" name="kompetensi" value="0" class="form-control hidden">
            <input type="boolean" name="status" value="1" class="form-control hidden">
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-md btn-danger">Reset</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection 
