@extends('layouts.admin')
@section('title', 'Edit Frontend Keyword')
@section('dashboard')
<section class="content-wrapper pb-5 mb-3">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __("Home") }}</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.languages')}}">{{ __("Languages") }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ @$language->name }}</li>
                        <li class="breadcrumb-item active">{{ __("Edit Keyword") }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <form action="#" method="POST" class="show_loader">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title d-flex align-items-center mr-3">
                                    <span class="icon text-info">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                    <span class="ml-2">{{ __("Frontend keywords of") }} {{ @$language->name }} {{
                                        __("Language")}} </span>
                                </h3>
                                <div class="get-back">
                                    <a href="{{route('admin.languages')}}" class="btn btn-primary">
                                        <i class="far fa-angle-double-left"></i> &nbsp; {{ __("Go Back") }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    @foreach($keywords as $key => $value)
                                    <div class="col-md-4">
                                        <x-input type="text" value="{{@$value}}" name="keyvalues[{{@$key}}]"
                                            label="{{@$key}}" placeholder="Enter keyword" />
                                    </div>
                                    @endforeach
                                </div>

                                <div class="form-group  text-center">
                                    <button type="submit" class="btn btn-primary save_changes">{{ __("Save Changes")
                                        }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

</section>
@endsection
