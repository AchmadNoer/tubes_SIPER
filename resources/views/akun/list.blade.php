@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px;">List Relawan</h2>
@stop

@section('content')
<div style="background-color: lightblue; padding: 7px;">
	<a href="/home" class="btn">Beranda</a>|
	<a href="/bencana/list" class="btn">Info Bencana</a>|
	<a href="/training/list" class="btn">Info Training</a>|
	@if(Session::get('email')=="Admin")
	<a href="/akun/list" class="btn active">List Relawan</a>|
	@endif
	@if(Session::get('name'))
	<a href="/akun/list/{{Session::get('id')}}" class="btn btn-danger" style="float: right;">{{Session::get('name')}}</a>
	@else
	<a href="/masuk" class="btn btn-success" style="float: right;">Akun</a>
	@endif
</div>
	<table class="table table-bordered table-responsive" style="margin-top: 10px">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama Lengkap</th>
				<th>Berkompetensi</th>
				<th>Status</th>
				<th colspan="3">Aksi</th>
			</tr>
			<tbody>
				@foreach($akun as $akun)
				<tr>
					<td>{{$akun->id}}</td>
					<td>{{$akun->nama}}</td>
					@if($akun->kompetensi==1)
					<td>Iya</td>
					@else
					<td>Tidak</td>
					@endif
					@if($akun->status==1)
					<td>Aktif</td>
					@else
					<td>Non-Aktif</td>
					@endif
					<td><a href="/akun/list/{{$akun->id}}" class="btn btn-danger">Lihat</a></td>
					<td><a href="/akun/list/{{$akun->id}}/edit" class="btn btn-danger">Edit</a></td>
					<td>
						{!! Form::open(['method'=>'delete', 'url'=>['akun/list',$akun->id]]) !!}
						{!! Form::submit('Hapus', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Apakah Anda yakin?")']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</thead>
	</table>
@stop

