@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px;">Input Training</h2>
@stop

@section('content')
<div style="background-color: lightblue; padding: 7px;margin-bottom: 10px;">
	<a href="/home" class="btn">Beranda</a>|
	<a href="/bencana/list" class="btn">Info Bencana</a>|
	<a href="/training/list" class="btn">Info Training</a>|
	<a href="/akun/list" class="btn">List Relawan</a>|
	<a href="/akun/list/{{Session::get('id')}}" class="btn btn-danger" style="float: right;">{{Session::get('name')}}</a>
</div>
	{!! Form::open(['url'=>'training/list', 'class'=>'form-horizontal']) !!}
		<div class="form-group">
			<label for="tgl_training" class="control-label col-md-2">Tanggal Training</label>
			<div class="col-md-10">
				<input type="date" name="tgl_training" class="form-control" value="<?php echo date('Y-m-d'); ?>">
				{!! $errors->has('tgl_training')?$errors->first('tgl_training'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="lokasi" class="control-label col-md-2">Lokasi</label>
			<div class="col-md-10">
				<select name="lokasi" class="form-control">
					<option value="" disabled selected>Pilih Provinsi</option>
					@foreach($location as $loc)
					<option value="{{$loc->id_provinsi}}">{{$loc->nama_provinsi}}</option>
					@endforeach
				</select>
				{!! $errors->has('lokasi')?$errors->first('lokasi'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="keterangan" class="control-label col-md-2">Keterangan</label>
			<div class="col-md-10">
				{!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
				{!! $errors->has('keterangan')?$errors->first('keterangan'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
@stop

