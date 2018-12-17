@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px; font-family: Bahnschrift;">Lihat Profil {{$akun->nama}}</h2>
@stop

@section('content')
<div style="background-color: lightblue; padding: 7px;margin-bottom: 10px;">
	<a href="/home" class="btn">Beranda</a>|
	<a href="/bencana/list" class="btn">Info Bencana</a>|
	<a href="/training/list" class="btn">Info Training</a>|
	@if(Session::get('email')=="Admin")
	<a href="/akun/list" class="btn">List Relawan</a>|
	@endif
	@if(Session::get('name'))
	<a href="/akun/list/{{Session::get('id')}}" class="btn btn-warning" style="float: right;">{{Session::get('name')}}</a>
	@else
	<a href="/masuk" class="btn btn-success" style="float: right;">Akun</a>
	@endif
</div>
	{!! Form::model($akun,['class'=>'form-horizontal']) !!}
	@if($akun->id==0)
		<div class="form-group">
			<label for="nama" class="control-label col-md-2">Tipe Akun</label>
			<div class="col-md-10">
				<label class="form-control">{{$akun->email}}</label>
			</div>
		</div>
	@else
		<div class="form-group">
			<label for="nama" class="control-label col-md-2">Nama Lengkap</label>
			<div class="col-md-10">
				<label class="form-control">{{$akun->nama}}</label>
			</div>
		</div>
		<div class="form-group">
			<label for="nama" class="control-label col-md-2">Alamat</label>
			<div class="col-md-10">
				<label class="form-control">{{$akun->alamat}}</label>
			</div>
		</div>
		<div class="form-group">
			<label for="tempatlhr tanggallhr" class="control-label col-md-2">Tempat, tanggal lahir</label>
			<div class="col-md-3">
				<label class="form-control">{{$akun->tempatlhr}}</label>
			</div>
			<div class="col-md-7">
				<label class="form-control">{{\Carbon\Carbon::parse($akun->tanggallhr)->format('d F Y')}}</label>
			</div>
		</div>
		<div class="form-group">
			<label for="nama" class="control-label col-md-2">Gender</label>
			<div class="col-md-10">
				<label class="form-control">{{$akun->gender}}</label>
			</div>
		</div>
		<div class="form-group">
			<label for="nama" class="control-label col-md-2">Nomor HP</label>
			<div class="col-md-10">
				<label class="form-control">{{$akun->noHP}}</label>
			</div>
		</div>
		<div class="form-group">
			<label for="nama" class="control-label col-md-2">Email</label>
			<div class="col-md-10">
				<label class="form-control">{{$akun->email}}</label>
			</div>
		</div>
		<div class="form-group">
			<label for="nama" class="control-label col-md-2">Keahlian</label>
			<div class="col-md-10">
				<label class="form-control">{{$akun->keahlian}}</label>
			</div>
		</div>
		<div class="form-group">
			<label for="nama" class="control-label col-md-2">Kompetensi</label>
			<div class="col-md-10">
				@if($akun->kompetensi==1)
				<label class="form-control">Iya</label>
				@else
				<label class="form-control">Tidak</label>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label for="nama" class="control-label col-md-2">Status</label>
			<div class="col-md-10">
				@if($akun->status==1)
				<label class="form-control">Aktif</label>
				@else
				<label class="form-control">Non-Aktif</label>
				@endif
			</div>
		</div>
		@endif
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
				@if(Session::get('email')!="Admin")
				<a href="/akun/list/{{$akun->id}}/edit" class="btn btn-danger">Edit</a>
				@endif
				<a href="/keluar" class="btn btn-danger">Keluar</a>
			</div>
		</div>
	{!! Form::close() !!}
@stop
