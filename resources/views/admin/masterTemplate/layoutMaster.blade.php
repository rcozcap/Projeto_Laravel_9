<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/personalized/format.css') }}" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/permissions.js') }}"></script>
    
    <title>Site</title>
</head>
<body style="background-color:#eff7f2;">

    <div class="container_body">

        @include('admin/masterTemplate/navigation')

        @yield('content')
            
        @include('admin/masterTemplate/footer')

    </div>
    
</body>
</html>