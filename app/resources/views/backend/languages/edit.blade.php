@extends('layouts.admin')
@section('title', 'Edit Language')
@section('dashboard')
<section class="content-wrapper pb-5 mb-3">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.languages')}}">Languages</a></li>
                        <li class="breadcrumb-item active">Edit Language</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <form action="{{route('admin.languages.update', @$lang->id)}}" method="POST" class="show_loader">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title d-flex align-items-center mr-3">
                                    <span class="icon text-info">
                                        <i class="far fa-info-circle"></i>
                                    </span>
                                    <span class="ml-2">Edit Language</span>
                                </h3>
                                <div class="get-back">
                                    <a href="{{route('admin.languages')}}" class="btn btn-primary">
                                        <i class="far fa-angle-double-left"></i> &nbsp; Go Back
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">

                                <x-input type="text" value="{{@$lang->name}}" name="name" label="Name" placeholder="Enter language name" />

                                <x-input type="text" value="{{@$lang->code}}" name="code" label="Code" placeholder="Enter language code" />

                                <x-select name="direction" :selected="@$lang->direction" label="Direction"
                                    :options="['ltr'=>'Left to Right', 'rtl'=>'Right to Left']" />

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
