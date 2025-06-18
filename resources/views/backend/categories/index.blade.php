@extends('layouts.admin')
@section('title', 'Email Templates')
@section('dashboard')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __("Home") }}</a></li>
                        <li class="breadcrumb-item active">{{ __("Categories") }}</li>
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
                                    {{ __("All Categories") }}
                                </span>
                            </h3>
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
                                            <th>{{ __("Image") }}</th>
                                            <th>{{ __("Name") }}</th>
                                            <th>{{ __("Status") }}</th>
                                            <th>
                                                {{ __("Featured Status") }}
                                            </th>
                                            <th>
                                                {{ __("Serial Number") }}
                                            </th>
                                            <th>{{ __("Action") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>
                                                <img width="50" src="{{ asset(@$category->cat_image) }}"
                                                    alt="{{ @$category->name }}">
                                            </td>
                                            <td>{{ @$category->cat_name }}</td>
                                            <td class="text-center">
                                                @if (@$category->cat_status == 'active')
                                                <a href="{{route("admin.categories.status", $category->id)}}" class="badge badge-success status st_active px-4 py-2">
                                                    {{ __("Active") }}
                                                </a>
                                                @else
                                                <a href="{{route("admin.categories.status", $category->id)}}" class="badge badge-danger status st_inactive px-4 py-2">
                                                    {{ __("Inactive") }}
                                                </a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (@$category->is_featured == 'active')
                                                <a href="{{route("admin.categories.featured", $category->id)}}" data-id="{{ @$category->id }}" class="badge badge-success featured px-4 py-2">
                                                    {{ __("Active") }}
                                                </a>
                                                @else
                                                <a href="{{route("admin.categories.featured", $category->id)}}" data-id="{{ @$category->id }}" class="badge badge-danger featured px-4 py-2">
                                                    {{ __("Inactive") }}
                                                </a>
                                                @endif
                                            </td>
                                            <td>{{ @$category->cat_order }}</td>
                                            <td class="text-center d-flex">
                                                <a href="{{ route('admin.categories.edit', @$category->id) }}"
                                                    class="btn btn-primary edit btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('admin.categories.destroy', @$category->id) }}" method="POST" class="show_loader trash">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" ml-2 btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>

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
<form action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" method="POST" class="show_loader">
    @csrf
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        <i class="far fa-plus-circle text-info"></i>
                        &nbsp;
                        {{ __("Add Category") }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">

                    <x-image-input name="image" :label="__('Image')" />

                    @foreach($languages as $language)
                        <div class="form-group">
                            <label for="name">{{ __("Name") }} ({{ $language->name }}) <span class="text-danger">*</span></label>
                            <input type="text" name="{{$language->code}}_name" placeholder="Enter category name"
                                class="form-control @error('cat_name') is-invalid @enderror">
                            @error('cat_name')
                            <div class="invalid-feedback message">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    @endforeach

                    <x-status-input name="cat_status" selected="active" :label="__('Status')" />

                    <div class="form-group">
                        <label for="name">{{ __("Serial Number")}} <span class="text-danger">*</span></label>
                        <input type="text" min="1"  name="cat_order" placeholder="Enter serial number"
                            class="form-control @error('cat_order') is-invalid @enderror">
                        @error('cat_order')
                        <div class="invalid-feedback message">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close")}}</button>
                    <button type="submit" class="btn btn-primary">{{ __("Create")}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    //  Status
    $('body').on('click', '.status', function(e) {
        e.preventDefault();

        let $this = $(this);
        let route = $this.attr('href');

        $this.fadeOut(100, function() {
            $.ajax({
                url: route,
                type: "GET",
                success: function (response) {
                    // Update text and classes
                    if (response.status === 'active') {
                        $this
                            .removeClass('badge-danger st_inactive')
                            .addClass('badge-success st_active')
                            .text("{{__('Active')}}");
                    } else {
                        $this
                            .removeClass('badge-success st_active')
                            .addClass('badge-danger st_inactive')
                            .text("{{__('Inactive')}}");
                    }

                    $this.fadeIn(100);
                }
            });
        });
    });

    //  Featured
    $('body').on('click', '.featured', function(e) {
        e.preventDefault();

        let $this = $(this);
        let route = $this.attr('href');

        $this.fadeOut(100, function() {
            $.ajax({
                url: route,
                type: "GET",
                success: function (response) {
                    // Update text and classes
                    if (response.featured === 'active') {
                        $this
                            .removeClass('badge-danger')
                            .addClass('badge-success')
                            .text("{{__('Active')}}");
                    } else {
                        $this
                            .removeClass('badge-success')
                            .addClass('badge-danger')
                            .text("{{__('Inactive')}}");
                    }

                    $this.fadeIn(100);
                }
            });
        });
    });

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

});


</script>
@endpush

