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
                            <li class="breadcrumb-item"><a href="{{ route('admin.settings') }}">Settings</a></li>
                            <li class="breadcrumb-item active">Email Templates</li>
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
                                    <span class="ml-2">Email Templates</span>
                                </h3>
                                <div class="get-back">
                                    <a href="{{route('admin.settings')}}" class="btn btn-primary">
                                        <i class="far fa-angle-double-left"></i> &nbsp; Go Back
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered datatable table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Template</th>
                                                <th>Subject</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($emailTemplates as $key => $template)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $template->type }}</td>
                                                    <td>{{ $template->subject }}</td>
                                                    <td class="text-center">
                                                        <a href=""
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
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
@endsection
