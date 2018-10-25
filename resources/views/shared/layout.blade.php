<!DOCTYPE html>
<html lang="en">
<head>
    <title>@if(isset($meta->title)){{ $meta->title }} |@endif Epic Revenue</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon.png">
    <link rel="icon" type="image/png" href="/images/favicon.png" sizes="32x32">
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="{{url('/images/favicon.png')}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset($meta->description))<meta name="description" itemprop="description" content="{{ $meta->description }}" />@endif
    @if(isset($meta->keywords))<meta name="keywords" itemprop="keywords" content="{{ $meta->keywords }}" />@endif

    <link rel="stylesheet" href="https://use.typekit.net/wyt0fsl.css">
    {{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ elixir('assets/css/main.css') }}">
    @yield('styles')
</head>
<body @if(isset($bodyid))id="{{ $bodyid }}"@endif>


    @include('shared/header')


    @yield('body')


    @include('shared/footer')


<script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
<script type="text/javascript" src="{{ elixir('assets/js/main.js') }}"></script>
<script>
    @if($navbar_inverse)
    $(function(){
        var shrinked = false;
        var collapsed = false;
        var shrinkHeader = 100;
        $(window).scroll(function() {
            var scroll = getCurrentScroll();
            if(!collapsed) {
                if ( scroll >= shrinkHeader ) {
                    $('#navbar-header').removeClass('transparent-header');
                    $('#navbar').removeClass('non-sticky');
                    shrinked = true;
                }
                else {
                    $('#navbar-header').addClass('transparent-header');
                    $('#navbar').addClass('non-sticky');
                    shrinked = false;
                }
            }
        });
        $('.navbar-toggle').on('click', function(){
            var scroll = getCurrentScroll();
            if(scroll <= shrinkHeader) {
                if ( !shrinked ) {
                    $('#navbar-header').removeClass('transparent-header');
                    $('#navbar').removeClass('non-sticky');
                    shrinked = collapsed = true;
                } else {
                    $('#navbar-header').addClass('transparent-header');
                    $('#navbar').addClass('non-sticky');
                    shrinked = collapsed = false;
                }
            }
        });

        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }
    });
    @endif
    $(window).scroll(function() {
        $('#pop-up-message').each(function(){
            var imagePos = $(this).offset().top;

            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow+400) {
                $(this).addClass("slideRight");
            }
        });
    });
    $(window).scroll(function() {
        $('#pop-up-message2').each(function(){
            var imagePos = $(this).offset().top;

            var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow+400) {
                $(this).addClass("slideLeft");
            }
        });
    });
</script>
@yield('scripts')

</body>
</html>