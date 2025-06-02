@extends('layouts.admin')
@section('title', 'Edit Category')
@section('dashboard')
<section class="content-wrapper pb-5 mb-3">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.categories')}}">Categories</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <form action="{{route('admin.categories.update', @$category->id)}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title d-flex align-items-center mr-3">
                                    <span class="icon text-info">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                    <span class="ml-2">Email Information</span>
                                </h3>
                                <div class="get-back">
                                    <a href="{{route('admin.settings')}}" class="btn btn-primary">
                                        <i class="far fa-angle-double-left"></i> &nbsp; Go Back
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">

                                <x-image-input name="image" />

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

                                <x-status-input name="cat_status" :selected="@$category->cat_status" label="Status" />
                                <x-status-input name="is_featured" :selected="@$category->is_featured" label="Featured" />

                                <div class="form-group">
                                    <label for="name">Serial Number <span class="text-danger">*</span></label>
                                    <input type="text" min="1" name="cat_order" placeholder="Enter serial number"
                                        class="form-control @error('cat_order') is-invalid @enderror">
                                    @error('cat_order')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group  text-center">
                                    <button type="submit" class="btn btn-primary save_changes">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

</section>
@endsection
