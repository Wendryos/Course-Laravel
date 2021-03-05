<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> @yield('title') - Zalliant </title> 

	 @stack('styles')
	<link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
</head>
 <body class="bg-gray-50">
	

	<div class="container mx-auto py-8">
		@yield('content')
	</div>


</body>
@stack('scripts')

</html>