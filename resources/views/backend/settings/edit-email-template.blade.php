@extends('layouts.admin')
@section('title', 'Edit Email Template')
@section('dashboard')
<section class="content-wrapper pb-5 mb-3">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.settings')}}">Settings</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.email.templates')}}">Email Templates</a></li>
                        <li class="breadcrumb-item active">Edit Email Template</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit Email Template</h3>
                            <div>
                                <a href="{{route('admin.email.templates')}}" class="btn btn-primary">
                                    <i class="far fa-angle-double-left"></i> &nbsp; Go Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-lg-8">
                                    <form action="{{route('admin.update.email.template', $template->id)}}" method="POST" >
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="type">Type <span class="text-danger">*</span></label>
                                            <input type="text" disabled name="type" value="{{ $template->type }}" class="form-control @error('type') is-invalid @enderror" />
                                            @error('type')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="id" value="{{ $template->id }}">
                                        <div class="form-group">
                                            <label for="subject">Subject <span class="text-danger">*</span></label>
                                            <input type="text" name="subject" value="{{ $template->subject }}" class="form-control @error('subject') is-invalid @enderror" />
                                            @error('subject')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="body">Body <span class="text-danger">*</span></label>
                                            <textarea name="body" class="form-control tinyeditor @error('body') is-invalid @enderror" rows="10">{{ $template->body }}</textarea>
                                            @error('body')
                                            <div class="invalid-feedback message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary save_changes">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <x-mail-template-preview :template="$template" />
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
