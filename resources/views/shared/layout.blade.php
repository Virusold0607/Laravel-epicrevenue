<!DOCTYPE html>
<html lang="en">
<head>
    <title>@if(isset($meta->title)){{ $meta->title }} |@endif Influencers Reach</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    @if(isset($meta->description))<meta name="description" itemprop="description" content="{{ $meta->description }}" />@endif
    @if(isset($meta->keywords))<meta name="keywords" itemprop="keywords" content="{{ $meta->keywords }}" />@endif


    <link href="//fonts.googleapis.com/css?family=Roboto|Montserrat:400,700|Open+Sans:400,300,600,700" rel='stylesheet' type='text/css'>
    {{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ elixir('assets/css/main.css') }}">
    @yield('styles')
</head>
<body @if(isset($bodyid))id="{{ $bodyid }}"@endif>

@include('shared/header')

@yield('body')

@include('shared/footer')

<script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
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
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-55044125-4', 'auto'); ga('send', 'pageview');
</script>
</body>
</html>