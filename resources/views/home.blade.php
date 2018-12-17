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
	<a href="/akun/list/{{Session::get('id')}}" class="btn btn-warning" style="float: right;">{{Session::get('name')}}</a>
	@else
	<a href="/masuk" class="btn btn-success" style="float: right;">Akun</a>
	@endif
</div>
<div style="display: inline;">
	<div style="display: inline-grid; float: left; width: 220px;">
	<table class="table table-bordered" style="margin: 20px 20px 0px 0px;">
		<thead>
			<tr>
				<th style="text-align: center;">Training Terbaru</th>
			</tr>
			<tbody>
				@foreach($training as $training)
				<tr>
					<td><a href="/training/list/{{$training->id_training}}">{{$training -> keterangan}}<br>{{\Carbon\Carbon::parse($training->tgl_training)->format('d F Y')}}<br>{{$training -> nama_provinsi}}</a></td>
				</tr>
				@endforeach
			</tbody>
		</thead>
	</table>
	</div>
</div>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<script type="text/javascript" src="{{asset('js/home.js')}}" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"  style="height: 370px; margin-left:250px; margin-top: 20px">
			<!-- Indicators -->
			<ol class="carousel-indicators hidden">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="/home1.jpg" alt="gempa" style="height: 370px; width: 890px;">
				</div>
				<div class="item">
					<img src="/home2.png" alt="puting beliung" style="height: 370px; width: 890px;">
				</div>
				<div class="item">
					<img src="/home3.jpg" alt="peta" style="height: 370px; width: 890px;">
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			</a>
		</div>
	</body>
</html>
@stop

