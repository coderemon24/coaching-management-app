@extends('layouts.admin')
@section('dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Common Settings</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-3">
                                        <div class="set_card">
                                            <div class="set_card_title d-flex gap-2 align-items-center">
                                                <div class="set_icon mr-3">
                                                    <i class="fas fa-cog"></i>
                                                </div>

                                                <div class="set_title ">
                                                    <a href="{{route('admin.general.settings')}}">General Settings</a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>View and update your general settings and active your license.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-3">
                                        <div class="set_card">
                                            <div class="set_card_title d-flex gap-2 align-items-center">
                                                <div class="set_icon mr-3">
                                                    <i class="fas fa-envelope"></i>
                                                </div>

                                                <div class="set_title ">
                                                    <a href="{{route('admin.email.settings')}}">Email Settings</a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>View and update your email settings.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-3">
                                        <div class="set_card">
                                            <div class="set_card_title d-flex gap-2 align-items-center">
                                                <div class="set_icon mr-3">
                                                    <i class="fas fa-envelope-open"></i>
                                                </div>

                                                <div class="set_title ">
                                                    <a href="{{route('admin.email.templates')}}">Email Templates</a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>View and update your email templates using HTML and variables.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-3">
                                        <div class="set_card">
                                            <div class="set_card_title d-flex gap-2 align-items-center">
                                                <div class="set_icon mr-3">
                                                    <i class="fas fa-plug"></i>
                                                </div>

                                                <div class="set_title ">
                                                    <a href="#">Plugins</a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>View and update your plugin settings.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-3">
                                        <div class="set_card">
                                            <div class="set_card_title d-flex gap-2 align-items-center">
                                                <div class="set_icon mr-3">
                                                    <i class="fas fa-credit-card"></i>
                                                </div>

                                                <div class="set_title ">
                                                    <a href="#">Payment Gateways</a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>View and update your payment gateways and active their license.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-3">
                                        <div class="set_card">
                                            <div class="set_card_title d-flex gap-2 align-items-center">
                                                <div class="set_icon mr-3">
                                                    <i class="fas fa-h1"></i>
                                                </div>

                                                <div class="set_title ">
                                                    <a href="#">Page Heading</a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>View and update your page heading.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-3">
                                        <div class="set_card">
                                            <div class="set_card_title d-flex gap-2 align-items-center">
                                                <div class="set_icon mr-3">
                                                    <i class="fab fa-searchengin"></i>
                                                </div>

                                                <div class="set_title ">
                                                    <a href="#">SEO Settings</a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>View and update your SEO settings and add meta information.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-3">
                                        <div class="set_card">
                                            <div class="set_card_title d-flex gap-2 align-items-center">
                                                <div class="set_icon mr-3">
                                                    <i class="fas fa-phone" style="transform: rotate(90deg)"></i>
                                                </div>

                                                <div class="set_title ">
                                                    <a href="{{route('admin.contact.infos')}}">Contact Information</a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>View and update your contact information.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 mb-3">
                                        <div class="set_card">
                                            <div class="set_card_title d-flex gap-2 align-items-center">
                                                <div class="set_icon mr-3">
                                                    <i class="fas fa-tools"></i>
                                                </div>

                                                <div class="set_title ">
                                                    <a href="{{ route('admin.maintenance.mode') }}">Maintenance Mode</a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>Enable or disable maintenance mode and configure settings for site updates.</p>
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
    </div>
@endsection
