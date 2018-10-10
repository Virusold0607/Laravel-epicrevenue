<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@if(isset($meta->title)){{ $meta->title }} |@endif Epic Revenue</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset($meta->description))<meta name="description" itemprop="description" content="{{ $meta->description }}" />@endif
    @if(isset($meta->keywords))<meta name="keywords" itemprop="keywords" content="{{ $meta->keywords }}" />@endif

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ elixir('assets/css/main.css') }}">
    @yield('styles')
</head>

<body @if(isset($bodyid))id="{{ $bodyid }}"@endif>
<div class="layout home @if(isset($bodyclass))id="{{ $bodyclass }}"@endif">
    @include('shared/header')

    @yield('body')

    @include('shared/footer')
</div>
<script type="text/javascript" src="{{ elixir('assets/js/main.js') }}"></script>
<script>
    $(document).ready(function(e) {
        $(".dashboard-slider").slick({
            centerMode: true,
            centerPadding: '3px',
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '0px',
                        slidesToShow: 2
                    }
                }
            ]

        });
        i = -1;
        $(".tab-pane").each(function(index, element) {
            i++;
            var getCode = $(this).html();
            $(this).parents(".dashboard-tabs").children(".nav-tabs").find("li").eq(i).append(getCode);
        });

    });
</script>
<script>
    $(document).ready(function(e) {
        $(".custom-select select").selectbox();
        $(".custom-select .sbOptions li:first-child").addClass("active");
    });
</script>

@yield('scripts')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-37796498-17', 'auto'); ga('send', 'pageview');
</script>
</body>
</html>
