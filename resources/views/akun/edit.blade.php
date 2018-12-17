@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px; font-family: Bahnschrift;">Edit Profil {{$akun->nama}}({{$akun->id}})</h2>
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
	{!! Form::model($akun,['url'=>['akun/list',$akun->id], 'method'=>'patch', 'class'=>'form-horizontal']) !!}
		{!! Form::text('nama', null, ['class'=>'form-control hidden']) !!}
		{!! Form::text('tempatlhr', null, ['class'=>'form-control hidden']) !!}
		{!! Form::date('tanggallhr', null, ['class'=>'form-control hidden']) !!}
		<p class="form-control hidden"><input type="radio" name="gender" value="Pria" class="form-check-input" <?php if($akun->gender=="Pria"){?> checked <?php } ?>> Pria</p>
		<p class="form-control hidden"><input type="radio" name="gender" value="Wanita" class="form-check-input" <?php if($akun->gender=="Wanita"){?> checked <?php } ?>> Wanita</p>
		{!! Form::text('noHP', null, ['class'=>'form-control hidden']) !!}
		{!! Form::email('email', null, ['class'=>'form-control hidden']) !!}

		@if(Session::get('email')=="Admin")
			{!! Form::text('alamat', null, ['class'=>'form-control hidden']) !!}
			{!! Form::text('password', null, ['class'=>'form-control hidden']) !!}
			<input type="text" name="confirmation" id="confirmation" class="form-control hidden" minlength="6" value="{{$akun->password}}">
			{!! Form::text('keahlian', null, ['class'=>'form-control hidden']) !!}
			<div class="form-group">
				<label for="tempatlhr tanggallhr" class="control-label col-md-2">ID - Nama Relawan</label>
				<div class="col-md-3">
					<label class="form-control">{{$akun->id}}</label>
				</div>
				<div class="col-md-7">
					<label class="form-control">{{$akun->nama}}</label>
				</div>
			</div>
			<div class="form-group">
				<label for="keahlian" class="control-label col-md-2">Kompetensi</label>
				<div class="col-md-10">
					<select name="kompetensi" class="form-control">
						<option value="1" <?php if($akun->kompetensi==1){?> selected <?php } ?>>Iya</option>
						<option value="0" <?php if($akun->kompetensi==0){?> selected <?php } ?>>Tidak</option>
					</select>
					{!! $errors->has('kompetensi')?$errors->first('kompetensi'):'' !!}
				</div>
			</div>
			<div class="form-group">
				<label for="status" class="control-label col-md-2">Status</label>
				<div class="col-md-10">
					<select name="status" class="form-control">
						<option value="1" <?php if($akun->status==1){?> selected <?php } ?>>Aktif</option>
						<option value="0" <?php if($akun->status==0){?> selected <?php } ?>>Non-Aktif</option>
					</select>
					{!! $errors->has('status')?$errors->first('status'):'' !!}
				</div>
			</div>
		@else
		{!! Form::number('kompetensi', null, ['class'=>'form-control hidden']) !!}
		<div class="form-group">
			<label for="alamat" class="control-label col-md-2">Alamat</label>
			<div class="col-md-10">
				{!! Form::text('alamat', null, ['class'=>'form-control']) !!}
				{!! $errors->has('alamat')?$errors->first('alamat'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="control-label col-md-2">Password</label>
			<div class="col-md-10">
				<input type="password" name="password" class="form-control">
				{!! $errors->has('password')?$errors->first('password'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="alamat" class="control-label col-md-2">Confirm Password</label>
			<div class="col-md-10">
				<input type="password" name="confirmation" id="confirmation" class="form-control" minlength="6">
				{!! $errors->has('confirmation')?$errors->first('confirmation'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="keahlian" class="control-label col-md-2">Keahlian</label>
			<div class="col-md-10">
				{!! Form::text('keahlian', null, ['class'=>'form-control']) !!}
				{!! $errors->has('keahlian')?$errors->first('keahlian'):'' !!}
			</div>
		</div>
		<div class="form-group">
			<label for="status" class="control-label col-md-2">Status</label>
			<div class="col-md-10">
				<select name="status" class="form-control">
					<option value="1" <?php if($akun->status==1){?> selected <?php } ?>>Aktif</option>
					<option value="0" <?php if($akun->status==0){?> selected <?php } ?>>Non-Aktif</option>
				</select>
				{!! $errors->has('status')?$errors->first('status'):'' !!}
			</div>
		</div>
		@endif
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
				<button type="submit" class="btn btn-md btn-primary">Simpan</button>
				<button type="reset" class="btn btn-md btn-danger">Reset</button>
			</div>
		</div>
	{!! Form::close() !!}
@stop
