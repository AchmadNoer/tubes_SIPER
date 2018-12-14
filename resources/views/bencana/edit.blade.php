@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px;">Edit Info Bencana</h2>
@stop

@section('content')
<div style="background-color: lightblue; padding: 7px;margin-bottom: 10px;">
	<a href="/home" class="btn">Beranda</a>|
	<a href="/bencana/list" class="btn">Info Bencana</a>|
	<a href="/training/list" class="btn">Info Training</a>|
	<a href="/akun/list" class="btn">List Relawan</a>|
	<a href="/akun/list/{{Session::get('id')}}" class="btn btn-danger" style="float: right;">{{Session::get('name')}}</a>
</div>
	{!! Form::model($bencana,['url'=>['bencana/list',$bencana->id_bencana], 'method'=>'patch', 'class'=>'form-horizontal']) !!}
		<div class="form-group">
			<label for="tgl_bencana" class="control-label col-md-2">Tanggal Kejadian</label>
			<div class="col-md-10">
				{!! Form::date('tgl_bencana', null, ['class'=>'form-control']) !!}
				{!! $errors->has('tgl_bencana')?$errors->first('tgl_bencana'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="lokasi" class="control-label col-md-2">Lokasi</label>
			<div class="col-md-10">
				<select name="lokasi" class="form-control">
					<option value="{{$bencana->lokasi}}" selected>Default</option>
					@foreach($location as $loc)
					<option value="{{$loc->id_provinsi}}">{{$loc->nama_provinsi}}</option>
					@endforeach
				</select>
				{!! $errors->has('lokasi')?$errors->first('lokasi'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="jenis_bencana" class="control-label col-md-2">Jenis Bencana</label>
			<div class="col-md-10">
				{!! Form::text('jenis_bencana', null, ['class'=>'form-control']) !!}
				{!! $errors->has('jenis_bencana')?$errors->first('jenis_bencana'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="deskripsi" class="control-label col-md-2">Deskripsi</label>
			<div class="col-md-10">
				<textarea name="deskripsi" class="form-control" rows="7" maxlength="750">{{$bencana->deskripsi}}</textarea>
				{!! $errors->has('deskripsi')?$errors->first('deskripsi'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
@stop
