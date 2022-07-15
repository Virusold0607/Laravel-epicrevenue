<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Epic Revenue</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}" data-hs-appearance="default"as="style">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/app.css') }}" data-hs-appearance="default"as="style">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.1.0/ui/trumbowyg.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
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

<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular.min.js"></script>
<script type="text/javascript" src="{{ url('/assets/js/admin.js') }}"></script>
<script type="text/javascript" src="{{ url('/assets/js/admin-angular.js') }}"></script>

<!-- JS Global Compulsory  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.0/jquery-migrate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js"></script>


<!-- JS Front -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.1.0/trumbowyg.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

@yield('scripts')

</body>
</html>
