@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px; font-family: Bahnschrift;">Info Bencana</h2>
@stop

@section('content')
<div style="background-color: lightblue; padding: 7px;">
	<a href="/home" class="btn">Beranda</a>|
	<a href="/bencana/list" class="btn active">Info Bencana</a>|
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
	<a href="input" class="btn btn-primary" style="margin-top: 5px;">Input Bencana</a>
	@endif
	<table class="table table-bordered table-responsive" style="margin-top: 10px">
		<thead>
			<tr>
				@if(Session::get('email')=="Admin")
				<th>Kode</th>
				@endif
				<th>Tanggal</th>
				<th>Lokasi</th>
				<th>Jenis Bencana</th>
				<th colspan="3">Aksi</th>
			</tr>
			<tbody>
				@foreach($bencana as $bencana)
				<tr>
					@if(Session::get('email')=="Admin")
					<td>{{$bencana -> id_bencana}}</td>
					@endif
					<td>{{\Carbon\Carbon::parse($bencana->tgl_bencana)->format('d F Y')}}</td>
					<td>{{$bencana -> nama_provinsi}}</td>
					<td>{{$bencana -> jenis_bencana}}</td>
					<td><a href="/bencana/list/{{$bencana->id_bencana}}" class="btn btn-danger">Lihat</a></td>
					@if(Session::get('email')=="Admin")
					<td><a href="/bencana/list/{{$bencana->id_bencana}}/edit" class="btn btn-danger">Edit</a></td>
					<td>
						{!! Form::open(['method'=>'delete', 'url'=>['bencana/list',$bencana->id_bencana]]) !!}
						{!! Form::submit('Hapus', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Apakah Anda yakin?")']) !!}
						{!! Form::close() !!}
					@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</thead>
	</table>
@stop

