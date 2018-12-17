@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px; font-family: Bahnschrift;">Presensi Relawan Bencana</h2>
@stop

@section('content')
<div style="background-color: lightblue; padding: 7px;margin-bottom: 10px;">
	<a href="/home" class="btn">Beranda</a>|
	<a href="/bencana/list" class="btn">Info Bencana</a>|
	<a href="/training/list" class="btn">Info Training</a>|
	<a href="/akun/list" class="btn">List Relawan</a>|
	<a href="/akun/list/{{Session::get('id')}}" class="btn btn-warning" style="float: right;">{{Session::get('name')}}</a>
</div>
	{!! Form::open(['url'=>'historib', 'class'=>'form-horizontal']) !!}
		<div class="form-group">
			<label for="lokasi" class="control-label col-md-2">ID - Nama Bencana</label>
			<div class="col-md-10">
				<select name="id_bencana" class="form-control">
					<option value="" disabled selected>Pilih Bencana</option>
					@foreach($bencana as $bencana)
					<option value="{{$bencana->id_bencana}}">{{$bencana->id_bencana}} - {{$bencana->jenis_bencana}}</option>
					@endforeach
				</select>
				{!! $errors->has('id_bencana')?$errors->first('id_bencana'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="lokasi" class="control-label col-md-2">ID - Nama Relawan</label>
			<div class="col-md-10">
				<select name="id_relawan" class="form-control">
					<option value="" disabled selected>Pilih Relawan</option>
					@foreach($akun as $akun)
					<option value="{{$akun->id}}">{{$akun->id}} - {{$akun->nama}}</option>
					@endforeach
				</select>
				{!! $errors->has('id_relawan')?$errors->first('id_relawan'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
				{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
@stop
