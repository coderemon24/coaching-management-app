@extends('layouts.admin')
@section('title', 'Email Settings')
@section('dashboard')
<section class="content-wrapper pb-5 mb-3">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.settings')}}">Settings</a></li>
                        <li class="breadcrumb-item active">Maintenance Mode</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <form action="{{ route('admin.update.maintenance.mode') }}" enctype="multipart/form-data" class="show_loader" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title d-flex align-items-center mr-3">
                                    <span class="icon text-info">
                                        <i class="far fa-tools"></i>
                                    </span>
                                    <span class="ml-2">Maintenance Mode</span>
                                </h3>
                                <div class="get-back">
                                    <a href="{{route('admin.settings')}}" class="btn btn-primary">
                                        <i class="far fa-angle-double-left"></i> &nbsp; Go Back
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="info_wrapper form-group">
                                    <label for="icon" class="text-left">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image"
                                        class="input_file d-none @error('image') is-invalid @enderror"
                                        id="main_logo" />
                                    @php
                                    $image = isset($maintenance->image) && $maintenance->image
                                    ? asset($maintenance->image)
                                    : asset('assets/upload-icon.png');
                                    @endphp

                                    <label for="main_logo" class="preview_wrapper">
                                        <img width="{{ isset($maintenance->image) && $maintenance->image ? 200 : 50 }}"
                                            src="{{ $image }}" class="preview_image">
                                        <div class="logo_text file_name">Choose file</div>
                                    </label>
                                    @error('site_logo')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="icon" class="text-left"> Maintenance Mode <span
                                            class="text-danger">*</span></label>
                                    <div class="radio-list">
                                        <div class="radio-item">
                                            <input name="status" value="activated" {{ @$maintenance->status == 'activated' ? 'checked' : ''
                                            }} id="radio1" type="radio">
                                            <label for="radio1">ACTIVATED</label>
                                        </div>
                                        <div class="radio-item">
                                            <input name="status" value="deactivated" {{ @$maintenance->status == 'deactivated' ? 'checked' :
                                            '' }} id="radio2" type="radio">
                                            <label for="radio2">DEACTIVATED</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="maintenance_message">Maintenance Message <span
                                            class="text-danger">*</span></label>
                                    <textarea name="maintenance_message" rows="5"
                                        class="form-control @error('maintenance_message') is-invalid @enderror"
                                        placeholder="Maintenance Message">{{@$maintenance->message}}</textarea>
                                    @error('maintenance_message')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="by_pass_token">Bypass Token <span class="text-danger">*</span></label>
                                    <input type="text" name="bypass_token" value="{{ @$maintenance->bypass_token }}"
                                        placeholder="Enter by pass token"
                                        class="form-control @error('bypass_token') is-invalid @enderror">

                                    <p class="text-danger h6">Don't use any special characters as bypass token.</p>

                                    @error('bypass_token')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <div class="bypass_token_content mt-3">
                                        <p class="mb-2 text-info">{{request()->root()}}/{bypass_token}</p>
                                        <p class="text-success h6">During maintenance mode, you can use this token to
                                            bypass the maintenance mode.</p>
                                    </div>
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
