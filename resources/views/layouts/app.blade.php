<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="{{asset('css/test.css')}}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link id="callCss" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" media="screen"/>
    <link href="{{asset('css/base.css')}}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="{{asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="{{asset('js/google-code-prettify/prettify.css')}}" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href={{asset('images/icons/favicon.ico')}}>
    {{-- <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png"> --}}
    <style type="text/css" id="enject"></style>
    <title>{{config('app.name', 'No title why?')}}</title>
</head>

<body>
    
    @yield('content')


    @include('layouts.footer')

    <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/google-code-prettify/prettify.js')}}"></script>
    <script src="{{asset('js/bootshop.js')}}"></script>
    <script src="{{asset('js/jquery.lightbox-0.5.js')}}"></script>

</body>
</html>

