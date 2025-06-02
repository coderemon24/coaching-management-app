@extends('layouts.admin')
@section('title', 'Email Templates')
@section('dashboard')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
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
                                <span class="ml-2">All Categories</span>
                            </h3>
                            <div class="get-back">
                                <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addModal">
                                    <i class="far fa-plus"></i> &nbsp; Add New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered datatable table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Featured</th>
                                            <th>Serial Number</th>
                                            <th>Action</th>
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
                                            <td>{{ @$category->cat_status }}</td>
                                            <td>{{ @$category->is_featured }}</td>
                                            <td>{{ @$category->cat_order }}</td>
                                            <td class="text-center d-flex">
                                                <a href="{{ route('admin.edit.email.template', @$category->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="#" method="POST">
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


{{-- add modal --}}
<!-- Button trigger modal -->

<!-- Modal -->
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
                        Add Category
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <div class="info_wrapper form-group">
                        <label for="icon" class="text-left">Image <span class="text-danger">*</span></label>
                        <input type="file" name="image"
                            class="input_file d-none @error('image') is-invalid @enderror" id="main_logo" />
                        <label for="main_logo" class="preview_wrapper">
                            <img width="50"
                            src="{{asset('assets/upload-icon.png')}}"
                            class="preview_image">
                            <div class="logo_text file_name">Choose file</div>
                        </label>
                        @error('image')
                        <div class="invalid-feedback message">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="cat_name" placeholder="Enter category name"
                            class="form-control @error('cat_name') is-invalid @enderror">
                        @error('cat_name')
                        <div class="invalid-feedback message">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Status <span class="text-danger">*</span></label>
                        <select name="cat_status" class="form-control pe-4 @error('cat_status') is-invalid @enderror">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('cat_status')
                        <div class="invalid-feedback message">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Serial Number <span class="text-danger">*</span></label>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
