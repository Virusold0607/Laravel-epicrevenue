<!DOCTYPE html>
<html ng-app="admin">
    <head>
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('styles')
        <!--<link rel="stylesheet" href="{{ elixir('assets/css/admin.css') }}">-->
        <link rel="stylesheet" href="https://epicrevenue.com/assets/css/admin.css">
    </head>
    <body>
        @include('admin.shared.header')
        <div class="container">
            @yield('body')

            @include('admin.shared.footer')
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">Your IP Address (<i>{{ $_SERVER['REMOTE_ADDR'] }}</i>) has been logged.</p>
                <p class="text-muted">Copyright &copy; 2015 influencersreach.com All Rights Reserved.</p>
            </div>
        </footer>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
        @yield('scripts')
    </body>
</html>
