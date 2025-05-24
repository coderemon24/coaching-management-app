@include('layouts.admin.head')
@auth
    @include('layouts.admin.sidebar-navbar')
@endauth


@yield('dashboard')

@auth
    @include('layouts.admin.footer')
@endauth

@include('layouts.admin.scripts')
