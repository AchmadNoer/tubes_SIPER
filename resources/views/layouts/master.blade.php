<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="http://1.bp.blogspot.com/-vGwfUEcu2kk/UPLGcZJ4SSI/AAAAAAAALYw/bmllfIVBuQs/s1600/LOGO+BADAN+NASIONAL+PENANGGULANGAN+BENCANA.png">
	<title>SIPER</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="css/home.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/home.js"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			@yield('header')
		</div>
		@yield('content')
	</div>
</body>
</html>