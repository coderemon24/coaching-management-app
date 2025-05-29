<!-- jQuery -->
<script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
<script src="{{asset('backend')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{asset('backend')}}/plugins/select2/js/select2.min.js"></script>
<script src="{{asset('backend')}}/plugins/jscolor/jscolor.js"></script>
<script src="{{asset('backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.1/tinymce.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{asset('backend')}}/dist/js/adminlte.js"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('backend')}}/plugins/chart.js/Chart.min.js"></script>
<script src="{{asset('backend')}}/dist/js/pages/dashboard3.js"></script>
<!------ custom js -------->
<script src="{{asset('backend')}}/dist/js/custom.js"></script>

@if($errors->any())
    @foreach($errors->all() as $error)
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1800,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: 'error',
            title: '{{ $error }}'
        });
    </script>
    @endforeach
@endif
@if(Session::has('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1800,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: 'error',
            title: '{{ Session::get("error") }}'
        });
    </script>
@endif
@if(Session::has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1800,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ Session::get("success") }}"
        });
    </script>
@endif
@if(Session::has('info'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1800,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "info",
            title: "{{ Session::get("info") }}"
        });
    </script>
@endif
@if(Session::has('warning'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1800,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "info",
            title: "{{ Session::get("warning") }}"
        });
    </script>
@endif

<script src="{{asset('backend/custom-js/ajax-request.js')}}"></script>

@stack('scripts')

</body>
</html>
