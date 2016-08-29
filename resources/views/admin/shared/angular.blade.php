<!DOCTYPE html>
<html ng-app="admin">
<head>
    <meta charset="utf-8" />
    <title>Admin Panel</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('styles')
    <link rel="stylesheet" href="{{ url('/assets/css/admin.css') }}">
</head>
<body>
@include('admin.shared.angular-header')
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

<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.2/angular.min.js"></script>
<script type="text/javascript" src="{{ url('/assets/js/admin.js') }}"></script>
<script type="text/javascript" src="{{ url('/assets/js/admin-angular.js') }}"></script>

@yield('scripts')

</body>
</html>
