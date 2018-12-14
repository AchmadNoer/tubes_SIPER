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
	<br><br><br>
	<div align="center">
            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
		<form action="{{ url('/loginPost') }}" method="post" class="form-horizontal" style="max-width: 25%;">
			<img class="mb-4" src="HINT.png" alt="" width="192" height="108">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="alamat" class="control-label col-md-2">NomorHP</label>
				<input type="text" class="form-control" name="noHP">
			</div>
			<div class="form-group">
				<label for="alamat" class="control-label col-md-2">Password</label>
				<input type="password" class="form-control" id="password" name="password"></input>
			</div>
			<div class="form-group">
					<button type="submit" class="btn btn-md btn-primary">Masuk</button>
					<a href="{{url('daftar')}}" class="btn btn-md btn-warning">Daftar</a>
			</div>
			<br><br>
			<p class="mt-5 mb-3 text-muted">© SIPER 2018-2019</p>
		</form>
	</div>
@stop