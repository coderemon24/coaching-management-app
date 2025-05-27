<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | {{@$generalSetting->site_name}} | @yield('title', 'Admin Panel')</title>
    <link rel="shortcut icon" href="{{asset('assets/logo/favicon.png')}}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- plugins -->
    <link rel="stylesheet" href="{{asset('backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/plugins/select2/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/dist/css/custom.css">

    <style>
        .loader {
            --c: no-repeat linear-gradient({{@$generalSetting->site_color}} 0 0);
            background:
                var(--c), var(--c), var(--c),
                var(--c), var(--c), var(--c),
                var(--c), var(--c), var(--c);
            background-size: 16px 16px;
            animation:
                l32-1 1s infinite,
                l32-2 1s infinite;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: {{@$generalSetting->site_color}};
        }
        [class$=-primary]{
            background-color: {{@$generalSetting->site_color}} ;
            border-color: {{@$generalSetting->site_color}} ;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="loader-wrapper" id="loader_main">
        <div class="loader"></div>
    </div>
