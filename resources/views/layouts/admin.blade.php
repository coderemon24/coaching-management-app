@include('layouts.admin.head')
@auth('admin')
    @include('layouts.admin.sidebar-navbar')
@endauth


@yield('dashboard')

@auth('admin')
    @include('layouts.admin.footer')
@endauth

@include('layouts.admin.scripts')
