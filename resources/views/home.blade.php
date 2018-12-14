@extends('layouts.master')

@section('header')
<a url="/www.bnpb.go.id"><img href="#" src="/BNPB.png" width="77" height="77" style="float: left;"></a>
	
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px; font-family: Bahnschrift;">Sistem Pendataan Relawan</h2>
@stop

@section('content')
<div style="background-color: lightblue; padding: 7px;">
	<a href="/home" class="btn active">Beranda</a>|
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
<div style="display: inline;">
	<div style="display: inline-grid; float: left; width: 250px;">
		<a href="/bencana/list" class="btn btn-default" style="margin: 20px 20px 0px 0px;">
			<h2><span class="label label-default">Bencana Terbaru</span></h2>
			<div class="col-md-4 mb-4">
				<h3 class="card-title">Jenis Bencana</h3>
				<h3 class="card-text">Tanggal</h3>
				<h3 class="card-text">Lokasi</h3>
			</div>
		</a>
		<a href="/training/list" class="btn btn-default" style="margin: 20px 20px 0px 0px;">
			<h2><span class="label label-default">Training Terbaru</span></h2>
			<div class="col-md-4 mb-4">
				<h3 class="card-title">Keterangan</h3>
				<h3 class="card-text">Tanggal</h3>
				<h3 class="card-text">Lokasi</h3>
			</div>
		</a>
	</div>
	<div style="margin: 20px 0px 0px 250px">
		<a href="" class="btn btn-default" style="width: 100%; height: 471.6px;">Bencana 1st</a>
	</div>
</div>

@stop

