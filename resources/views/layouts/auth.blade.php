
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
    <link rel="stylesheet" href="{{ cached_asset('assets/plugins/toolbar/css/prism-toolbar.css') }}">
    <link rel="stylesheet" href="{{ cached_asset('assets/css/prism-okaidia.css') }}">
    <!-- The Main Theme stylesheet (Contains also Bootstrap CSS)-->
    <link rel="stylesheet" href="{{ cached_asset('assets/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" type="text/css" href="{{ cached_asset('assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @yield('page-styles')
  </head>
  <body>
    <!-- navbar-->
    <div class="d-flex">
      	<div class="page-holder align-items-center py-4 bg-gray-100 vh-100">
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript files-->
    <script src="{{ cached_asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ cached_asset('assets/js/js.cookie.min.js') }}"></script>
    <!-- Main Theme JS File-->
    <script src="{{ cached_asset('assets/js/theme.7033a95b.js') }}"></script>
    <!-- Prism for syntax highlighting-->
    <script src="{{ cached_asset('assets/js/prism.js') }}"></script>
    <script src="{{ cached_asset('assets/js/prism-normalize-whitespace.min.js') }}"></script>
    <script src="{{ cached_asset('assets/js/prism-toolbar.min.js') }}"></script>
    <script src="{{ cached_asset('assets/js/prism-copy-to-clipboard.min.js') }}"></script>

    <script src="{{ cached_asset('assets/js/main.js') }}" type="text/javascript"></script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="{{ cached_asset('assets/fontawesome/css/all.css') }}" crossorigin="anonymous">
    <script type="text/javascript">
        @if($errors->any())
            ValidationsMessages({!! json_encode($errors->messages()) !!});
        @endif
    </script>

    @yield('page-scripts')
  </body>
</html>