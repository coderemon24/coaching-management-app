@extends('layouts.admin')
@section('dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang('messages.home')</a></li>
                            <li class="breadcrumb-item active">@lang('messages.settings')</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">@lang('messages.common_settings')</h3>
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
                                                    <a href="{{route('admin.general.settings')}}">
                                                        @lang('messages.general_settings')
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>
                                                    @lang('messages.general_setting_text')
                                                </p>
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
                                                    <a href="{{route('admin.email.settings')}}">
                                                        @lang('messages.email_settings')
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>
                                                    @lang('messages.email_setting_text')
                                                </p>
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
                                                    <a href="{{route('admin.email.templates')}}">
                                                        @lang('messages.email_templates')
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>
                                                    @lang('messages.email_template_text')
                                                </p>
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
                                                    <a href="#">
                                                        @lang('messages.plugins')
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>
                                                    @lang('messages.plugin_text')
                                                </p>
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
                                                    <a href="#">
                                                        @lang('messages.payment_gateways')
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>
                                                    @lang('messages.payment_gateway_text')
                                                </p>
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
                                                    <a href="#">
                                                        @lang('messages.page_heading')
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>
                                                    @lang('messages.page_heading_text')
                                                </p>
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
                                                    <a href="#">
                                                        @lang('messages.seo_settings')
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>
                                                    @lang('messages.seo_setting_text')
                                                </p>
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
                                                    <a href="{{route('admin.contact.infos')}}">
                                                        @lang('messages.contact_infos')
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>
                                                    @lang('messages.contact_info_text')
                                                </p>
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
                                                    <a href="{{ route('admin.maintenance.mode') }}">
                                                        @lang('messages.maintenance_mode')
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="set_card_desc">
                                                <p>
                                                    @lang('messages.maintenance_mode_text')
                                                </p>
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
