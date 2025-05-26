@extends('layouts.admin')
@section('title', 'General Settings')
@section('dashboard')
<section class="content-wrapper pb-5 mb-3">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.settings')}}">Settings</a></li>
                        <li class="breadcrumb-item active">General Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-lg-12 mb-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title d-flex align-items-center mr-3">
                                <span class="icon text-info">
                                    <i class="far fa-info-circle"></i>
                                </span>
                                <span class="ml-2">Website Information</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <div class="info_wrapper form-group">
                                        <label for="icon" class="text-left">Logo <span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="site_logo" class="input_file d-none" id="main_logo" />
                                        <label for="main_logo" class="preview_wrapper">
                                            <img width="50" src="{{asset('assets/upload-icon.png')}}" class="preview_image">
                                            <div class="logo_text file_name">Choose file</div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="info_wrapper form-group">
                                        <label for="icon">Favicon <span class="text-danger">*</span></label>
                                        <input type="file" name="site_favicon" class="input_file d-none" id="favicon" />
                                        <label for="favicon" class="preview_wrapper">
                                            <img width="50" src="{{asset('assets/upload-icon.png')}}"  class="preview_image">
                                            <div class="logo_text file_name">Choose file</div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="website_name">Website Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="site_name" class="form-control"
                                            placeholder="Enter website name" value="">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="website_name">Website Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="site_title" class="form-control"
                                            placeholder="Enter site title" value="{{ $settings->site_title ?? '' }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 mb-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title d-flex align-items-center mr-3">
                                <span class="icon text-info">
                                    <i class="far fa-clock"></i>
                                </span>
                                <span class="ml-2">Timezone</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="timezone">Select Timezone <span class="text-danger">*</span></label>
                                <select name="timezone" class="select2 form-control" id="timezone">
                                    <option value="">Select Timezone</option>
                                    @foreach (timezone_identifiers_list() as $timezone)
                                    <option value="{{ $timezone }}">
                                        {{ $timezone }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 mb-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title d-flex align-items-center mr-3">
                                <span class="icon text-info">
                                    <i class="far fa-palette"></i>
                                </span>
                                <span class="ml-2">Color Scheme</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="color_scheme">Website Color <span class="text-danger">*</span></label>
                                <input data-jscolor="{}" name="site_color" value="#FF2020" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 mb-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title d-flex align-items-center mr-3">
                                <span class="icon text-info">
                                    <i class="far fa-usd-circle"></i>
                                </span>
                                <span class="ml-2">Currency Information</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row ">

                                <div class="col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="currency">Currency Symbol <span class="text-danger">*</span></label>
                                        <input type="text" name="currency" value="$" placeholder="Enter currency"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="currency">Currency Position <span
                                                class="text-danger">*</span></label>
                                        <select name="currency_position" class="form-control">
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="currency">Currency Text <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="currency_text" value="USD"
                                            placeholder="Enter currency text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="currency">Currency Text Position <span
                                                class="text-danger">*</span></label>
                                        <select name="currency_position" class="form-control">
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-12 mb-2">
                                    <div class="form-group">
                                        <label for="currency">Currency Rate<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">1 USD = </span>
                                            </div>
                                            <input type="text" name="currency_rate" value="1"
                                                placeholder="Enter currency rate" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">USD</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

</section>
@endsection
