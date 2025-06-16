@extends('layouts.admin')
@section('title', 'Language | Settings')

@section('dashboard')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __("Home") }}</a></li>
                        <li class="breadcrumb-item active">{{ __("Languages") }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 pb-5 mb-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title d-flex align-items-center mr-3">
                                <span class="icon text-info">
                                    <i class="far fa-info-circle"></i>
                                </span>
                                <span class="ml-2">
                                    {{ __("All Languages") }}
                                </span>
                            </h3>
                            <div class="center_buttons">

                                <a href="javascript:void(0)" class="btn btn-info btn-sm"
                                data-toggle="modal" data-target="#frontModal"
                                >
                                    <i class="far fa-plus"></i> &nbsp;
                                    {{ __("Add Frontend Language") }}
                                </a>

                                <a href="javascript:void(0)" class="btn btn-info btn-sm ml-2"
                                data-toggle="modal" data-target="#dashModal"
                                >
                                    <i class="far fa-plus"></i> &nbsp;

                                    {{ __("Add Dashboard Language") }}
                                </a>

                            </div>
                            <div class="get-back">
                                <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addModal">
                                    <i class="far fa-plus"></i> &nbsp;
                                    {{ __("Add New") }}
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered datatable table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Frontend Default</th>
                                            <th>Backend Default</th>
                                            <th>Direction</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($languages as $key => $lang)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ @$lang->name }}</td>
                                            <td class="text-center">
                                                {{ @$lang->code }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.languages.frontend.default', @$lang->id) }}"
                                                    class=" {{ @$lang->frontend_default === 1 ? 'text-success' : 'text-secondary' }}
                                                frontend_default
                                                " style="font-size: 23px">
                                                    <i class="fas fa-star"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.languages.dashboard.default', @$lang->id) }}"
                                                    class=" {{ @$lang->dashboard_default === 1 ? 'text-success' : 'text-secondary' }}
                                                dashboard_default
                                                " style="font-size: 23px">
                                                    <i class="fas fa-star"></i>
                                                </a>
                                            </td>
                                            <td>
                                                {{ @$lang->direction === 'ltr' ? 'Left to Right' : 'Right to Left' }}
                                            </td>
                                            <td class="text-center d-flex justify-content-center">

                                                <div class="dropdown">
                                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('admin.languages.edit', @$lang->id) }}"
                                                            class="dropdown-item">
                                                            Edit
                                                        </a>
                                                        <a href="{{ route('admin.languages.frontend.keyword.edit', @$lang->id) }}" class="dropdown-item">
                                                            Edit Frontend Keyword
                                                        </a>
                                                        <a href="{{ route('admin.languages.dashboard.keyword.edit', @$lang->id) }}" class="dropdown-item">
                                                            Edit Dashboard Keyword
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.languages.destroy', @$lang->id) }}"
                                                            method="POST" class="show_loader trash">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- add modal -->
<form action="{{ route('admin.languages.store') }}" method="POST" class="show_loader">
    @csrf
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        <i class="far fa-plus-circle text-info"></i>
                        &nbsp;
                        Add Language
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">

                    <x-input type="text" name="name" label="Name" placeholder="Enter language name" />

                    <x-input type="text" name="code" label="Code" placeholder="Enter language code" />

                    <x-select name="direction" label="Direction"
                        :options="['ltr'=>'Left to Right', 'rtl'=>'Right to Left']" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- dashboard keyword modal -->
<form action="{{ route('admin.languages.dashboard.keyword') }}" method="POST" class="show_loader">
    @csrf
    <div class="modal fade" id="dashModal" tabindex="-1" role="dialog" aria-labelledby="dashModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body px-4">

                    <x-input type="text" name="dash_keyword" label="Dashboard Keyword" placeholder="Enter keyword" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- frontend keyword modal -->
<form action="{{ route('admin.languages.frontend.keyword') }}" method="POST" class="show_loader">
    @csrf
    <div class="modal fade" id="frontModal" tabindex="-1" role="dialog" aria-labelledby="frontModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body px-4">

                    <x-input type="text" name="front_keyword" label="Frontend Keyword" placeholder="Enter keyword" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

    //  Delete
    $('body').on('click', '.trash', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.isConfirmed) {
                $this = $(this);
                $this.submit();
            }
        });
    });

    //  frontend default
    $('body').on('click', '.frontend_default', function(e) {
        e.preventDefault();

        let $this = $(this);
        let route = $this.attr('href');

        $this.fadeOut(100, function() {
            $.ajax({
                url: route,
                type: "GET",
                success: function (response) {
                    $('.frontend_default').removeClass('text-success').addClass('text-secondary');
                    $this.removeClass('text-secondary').addClass('text-success');
                    $this.fadeIn(100);
                    window.location.reload();
                }
            });
        });
    });

    //  dashboard default
    $('body').on('click', '.dashboard_default', function(e) {
        e.preventDefault();

        let $this = $(this);
        let route = $this.attr('href');

        $this.fadeOut(100, function() {
            $.ajax({
                url: route,
                type: "GET",
                success: function (response) {
                    $('.dashboard_default').removeClass('text-success').addClass('text-secondary');
                    $this.removeClass('text-secondary').addClass('text-success');
                    $this.fadeIn(100);
                    window.location.reload();
                }
            });
        });
    });

});


</script>
@endpush
