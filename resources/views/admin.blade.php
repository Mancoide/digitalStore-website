<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		@csrf
		<title>Digital Store</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex">
		<!-- Prism Syntax Highlighting-->
		<link rel="stylesheet" href="{{ asset('assets/plugins/toolbar/css/prism-toolbar.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/prism-okaidia.css') }}">
		<!-- The Main Theme stylesheet (Contains also Bootstrap CSS)-->
		<link rel="stylesheet" href="{{ asset('assets/css/style.default.css') }}" id="theme-stylesheet">
		<!-- Custom stylesheet - for your changes-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

		@inertiaHead
	</head>
	<body>
		@inertia
		@vite('resources/js/app.js')

        <script type="text/javascript">
            @if($errors->any())
                ValidationsMessages({!! json_encode($errors->messages()) !!});
            @endif
        </script>
	</body>
</html>
