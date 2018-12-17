@extends('layouts.master')

@section('header')
	<img src="/BNPB.png" width="77" height="77" style="float: left;">
	<img src="/HINT.png" width="136.6" height="76.8" style="float: right;">
	<h2 align="center" style="padding: 20px 0px 20px 0px; font-family: Bahnschrift;">Lihat Info Training</h2>
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
				@if(Session::get('name'))
				<a class="btn btn-primary" onclick="histori()">Partisipan</a>
				@endif
			</div>
		</div>
	{!! Form::close() !!}
	<div id="myDIV" class="form-group" style="display: none;">
		@if(Session::get('email')=="Admin")
		<br><br><a href="/training/presensi" class="btn btn-primary" style="margin-top: 5px;">Tambah Presensi</a>
		@endif
		<h2>Relawan Training</h2>
		<table class="table table-bordered table-responsive" style="margin-top: 10px">
			<thead>
				<tr>
					<th>ID Relawan</th>
					<th>Nama Relawan</th>
				</tr>
				<tbody>
					@foreach($historit as $historit)
					@if($historit->id_training == $training->id_training)
					<tr>
						<td>{{$historit -> id_relawan}}</td>
						<td>{{$akun[$historit->id_relawan]->nama}}</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</thead>
		</table>
	</div>
	<script type="text/javascript">
		function histori() {
		  var x = document.getElementById("myDIV");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		}
	</script>
@stop