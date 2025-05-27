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
            <form action="{{route('admin.update.general.settings')}}" id="update_general_settings" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12 col-lg-12 mb-2">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title d-flex align-items-center mr-3">
                                    <span class="icon text-info">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                    <span class="ml-2">Website Information</span>
                                </h3>
                                <div class="get-back">
                                    <a href="{{route('admin.settings')}}" class="btn btn-primary">
                                        <i class="far fa-angle-double-left"></i> &nbsp; Go Back
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <div class="info_wrapper form-group">
                                            <label for="icon" class="text-left">Logo <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" name="site_logo" class="input_file d-none @error('site_logo') is-invalid @enderror"
                                                id="main_logo" />
                                            <label for="main_logo" class="preview_wrapper">
                                                <img
                                                {{ @$generalSetting->site_logo ? 'width=200' : 'width=50' }}
                                                src="{{asset(@$generalSetting->site_logo) ?? asset('assets/upload-icon.png')}}"
                                                    class="preview_image">
                                                <div class="logo_text file_name">Choose file</div>
                                            </label>
                                            @error('site_logo')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="info_wrapper form-group">
                                            <label for="icon">Favicon <span class="text-danger">*</span></label>
                                            <input type="file" name="site_favicon" class="input_file d-none @error('site_favicon') is-invalid @enderror"
                                                id="favicon" />
                                            <label for="favicon" class="preview_wrapper">
                                                <img
                                                {{ @$generalSetting->site_favicon ? 'width=200' : 'width=50' }}
                                                src="{{asset(@$generalSetting->site_favicon) ?? asset('assets/upload-icon.png')}}"
                                                    class="preview_image">
                                                <div class="logo_text file_name">Choose file</div>
                                            </label>
                                            @error('site_favicon')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="website_name">Website Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror"
                                                placeholder="Enter website name" value="{{ @$generalSetting->site_name}}">
                                            @error('site_name')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="website_name">Website Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="site_title" class="form-control @error('site_title') is-invalid @enderror"
                                                placeholder="Enter site title"
                                                value="{{ @$generalSetting->site_title}}">
                                            @error('site_title')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
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
                                    <select name="timezone" class="select2 form-control @error('timezone') is-invalid @enderror" id="timezone">
                                        <option value="">Select Timezone</option>
                                        @foreach (timezone_identifiers_list() as $timezone)
                                        <option value="{{ $timezone }}" {{ @$generalSetting->timezone == $timezone ? 'selected' : '' }}>
                                            {{ $timezone }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('timezone')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
                                    <input data-jscolor="{}" name="site_color" value="{{ @$generalSetting->site_color ?? '#FF2020'}}" class="form-control @error('site_color') is-invalid @enderror" />
                                    @error('site_color')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
                                            <label for="currency">Currency Symbol <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="currency" value="{{ @$generalSetting->currency_symbol ?? '$'}}" placeholder="Enter currency"
                                                class="form-control @error('currency') is-invalid @enderror">
                                            @error('currency')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label for="currency">Currency Position <span
                                                    class="text-danger">*</span></label>
                                            <select name="currency_position" class="form-control @error('currency_position') is-invalid @enderror">
                                                <option value="" selected disabled>Select Position</option>
                                                <option value="left" {{ @$generalSetting->currency_position == 'left' ? 'selected' : ''}}>Left</option>
                                                <option value="right" {{ @$generalSetting->currency_position == 'right' ? 'selected' : ''}}>Right</option>
                                            </select>
                                            @error('currency_position')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label for="currency">Currency Text <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="currency_text" value="{{ @$generalSetting->currency_text ?? 'USD'}}"
                                                placeholder="Enter currency text" class="form-control @error('currency_text') is-invalid @enderror">
                                            @error('currency_text')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label for="currency">Currency Text Position <span
                                                    class="text-danger">*</span></label>
                                            <select name="currency_text_position" class="form-control @error('currency_text_position') is-invalid @enderror">
                                                <option value="" selected disabled>Select Position</option>
                                                <option value="left" {{ @$generalSetting->currency_text_position == 'left' ? 'selected' : ''}}>Left</option>
                                                <option value="right" {{ @$generalSetting->currency_text_position == 'right' ? 'selected' : ''}}>Right</option>
                                            </select>
                                            @error('currency_text_position')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
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
                                                <input type="text" name="currency_rate" value="{{ @$generalSetting->currency_rate ?? '1.00'}}"
                                                    placeholder="Enter currency rate" class="form-control @error('currency_rate') is-invalid @enderror">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">USD</span>
                                                </div>
                                                @error('currency_rate')
                                                <div class="invalid-feedback message">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 div text-center col-lg-12 mb-4">
                        <button class="btn btn-primary save_changes" type="submit">
                            Save Changes
                        </button>
                    </div>

                </div>

            </form>
        </div>

</section>
@endsection
