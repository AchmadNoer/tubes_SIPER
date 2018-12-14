@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px;">Lihat Info Training</h2>
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
	<a href="/akun/list/{{Session::get('id')}}" class="btn btn-danger" style="float: right;">{{Session::get('name')}}</a>
	@else
	<a href="/masuk" class="btn btn-success" style="float: right;">Akun</a>
	@endif
</div>
	{!! Form::model($training,['class'=>'form-horizontal']) !!}
		<div class="form-group">
			{!! Form::label('tgl_training', 'Tanggal Training', ['class'=>'control-label col-md-2']) !!}
			<div class="col-md-10">
				<label class="form-control">{{\Carbon\Carbon::parse($training->tgl_training)->format('d F Y')}}</label>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('lokasi', 'Lokasi', ['class'=>'control-label col-md-2']) !!}
			<div class="col-md-10">
				<label class="form-control">{{$location -> nama_provinsi}}</label>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('keterangan', 'Keterangan', ['class'=>'control-label col-md-2']) !!}
			<div class="col-md-10">
				<label class="form-control" style="height: 1%;text-align: justify;">{{$training -> keterangan}}</label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
			</div>
		</div>
	{!! Form::close() !!}
@stop
