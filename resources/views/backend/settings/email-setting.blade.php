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
                        <li class="breadcrumb-item active">Email Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <form action="{{route('admin.update.email.settings')}}" method="POST" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label for="mail_driver">Mail Driver</label>
                                    <input type="text" name="mail_driver" id="mail_driver" class="form-control @error('mail_driver') is-invalid @enderror"
                                        value="{{ @$emailSetting->mail_driver }}" placeholder="Mail Driver">
                                    @error('mail_driver')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_host">Mail Host</label>
                                    <input type="text" name="mail_host" id="mail_host" class="form-control @error('mail_host') is-invalid @enderror"
                                        value="{{ @$emailSetting->mail_host }}" placeholder="Mail Host">
                                    @error('mail_host')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_port">Mail Port</label>
                                    <input type="number" name="mail_port" id="mail_port" class="form-control @error('mail_port') is-invalid @enderror"
                                        value="{{ @$emailSetting->mail_port }}" placeholder="Mail Port">

                                    @error('mail_port')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_username">Mail Username</label>
                                    <input type="text" name="mail_username" id="mail_username" class="form-control @error('mail_username') is-invalid @enderror"
                                        value="{{ @$emailSetting->mail_username }}" placeholder="Mail Username">
                                    @error('mail_username')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_password">Mail Password</label>
                                    <input type="text" name="mail_password" id="mail_password" class="form-control @error('mail_password') is-invalid @enderror"
                                        value="{{ base64_decode(@$emailSetting->mail_password) }}" placeholder="Mail Password">
                                    @error('mail_password')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_encryption">Mail Encryption</label>
                                    <input type="text" name="mail_encryption" id="mail_encryption"
                                        class="form-control @error('mail_encryption') is-invalid @enderror"
                                        value="{{ @$emailSetting->mail_encryption }}"
                                        placeholder="Mail Encryption">
                                    @error('mail_encryption')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_from_address">Mail From Address</label>
                                    <input type="email" name="mail_from_address" id="mail_from_address"
                                        class="form-control @error('mail_from_address') is-invalid @enderror"
                                        value="{{ @$emailSetting->mail_from_address }}"
                                        placeholder="Mail From Address">
                                    @error('mail_from_address')
                                    <div class="invalid-feedback message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_from_name">Mail From Name</label>
                                    <input type="text" name="mail_from_name" id="mail_from_name" class="form-control @error('mail_from_name') is-invalid @enderror"
                                        value="{{ @$emailSetting->mail_from_name }}" placeholder="Mail From Name">
                                    @error('mail_from_name')
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
