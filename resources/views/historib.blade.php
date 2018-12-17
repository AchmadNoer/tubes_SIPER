@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px; font-family: Bahnschrift;">Info Bencana</h2>
@stop

@section('content')
<div style="background-color: lightblue; padding: 7px;">
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
	@if(Session::get('email')=="Admin")
	<a href="/histori/create" class="btn btn-primary" style="margin-top: 5px;">Tambah Presensi</a>
	@endif
	<table class="table table-bordered table-responsive" style="margin-top: 10px">
		<thead>
			<tr>
				<th>ID Bencana</th>
				<th>ID Relawan</th>
			</tr>
			<tbody>
				@foreach($historib as $historib)
				<tr>
					<td><a href="/bencana/list/{{$historib -> id_bencana}}">{{$historib->id_bencana}}</a></td>
					<td>{{$historib->id_relawan}}</td>
				</tr>
				@endforeach
			</tbody>
		</thead>
	</table>
@stop

