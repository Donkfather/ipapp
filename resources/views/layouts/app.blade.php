<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.IPAPP = <?= json_encode([
            'csrfToken' => csrf_token(),
            'user' => $user = auth()->user() ?? null,
            'userId' => $user->id ?? null,
            'usesApi' => false,
        ]); ?>
    </script>
    @yield('css')
    @yield('head-scripts')
</head>
<body>
<div id="ipapp">
    @include('navbar.nav')
    <div class="container content">
        <div class="row">
            @yield('structure')
        </div>
    </div>
    @if(Auth::check())
        <ipapp-notifications
                :notifications="notifications"
                :has-unread-announcements="hasUnreadAnnouncements"
                :loading-notifications="loadingNotifications"
        ></ipapp-notifications>
    @endif
</div>
{{--<div id="footer">
    <div id="colorfooter">
        <p>&copy; All right reserved to Smart Ask team. <a style="color:white"
                                                           href="https://docs.google.com/document/d/1bLAzkcCbQLpd1Jjb90k1EPG1pWY414T_VeoYR8ajbsM/edit?usp=sharing ">Privacy
                Policy</a></p>
    </div>
</div>--}}
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" async></script>
@yield('end-scripts','<script src="/js/app.js"></script>')
<script>
    $(document).ready(function () {
        setTimeout(() => {
            $('[data-toggle="tooltip"]').tooltip();
        }, 500);
    });
</script>
</body>
</html>