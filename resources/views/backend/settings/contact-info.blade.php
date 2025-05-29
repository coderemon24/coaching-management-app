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
                        <li class="breadcrumb-item active">Contact Information</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <form action="{{ route('admin.update.contact.info') }}" class="show_loader" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title d-flex align-items-center mr-3">
                                    <span class="icon text-info">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                    <span class="ml-2">Contact Information</span>
                                </h3>
                                <div class="get-back">
                                    <a href="{{route('admin.settings')}}" class="btn btn-primary">
                                        <i class="far fa-angle-double-left"></i> &nbsp; Go Back
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="mail_driver">Email Address <span class="text-danger">*</span> </label>
                                    <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror"
                                        value="{{ @$contactInfo->email }}" placeholder="Email Address">
                                    @error('email')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_driver">Contact Number <span class="text-danger">*</span> </label>
                                    <input type="text" inputmode="tel"  name="phone"  class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ @$contactInfo->phone }}" placeholder="Contact Number">
                                    @error('phone')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_driver">Address <span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" >{{@$contactInfo->address}}</textarea>
                                    @error('address')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_driver">Map Link <span class="text-danger">*</span></label>
                                    <textarea name="map" rows="5" class="form-control @error('map') is-invalid @enderror" placeholder="Map Link" >{{@$contactInfo->map}}</textarea>
                                    @error('map')
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
