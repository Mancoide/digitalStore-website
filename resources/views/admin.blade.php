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

		{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" /> --}}
		{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" /> --}}
		@inertiaHead
	</head>
	<body>
		@inertia
		@vite('resources/js/app.js')
		@vite('resources/css/app.css')

        <script type="text/javascript">
            @if($errors->any())
                ValidationsMessages({!! json_encode($errors->messages()) !!});
            @endif
        </script>
	</body>
</html>
