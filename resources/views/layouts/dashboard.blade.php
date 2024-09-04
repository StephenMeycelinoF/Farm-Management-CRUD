@extends('layouts.template')

@section('page-scripts')
@include('layouts.partials.scripts')
@endsection

@section('content')
<div class="content vh-100">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center">
                                <div class="badge rounded-circle icon-circle icon-color-user">
                                    <i class="fa fa-user icon-size" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Pemiliki Peternakan</p>
                                <p class="card-title" id="total-owners">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Data Pemilik Ternak
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center">
                                <div class="badge rounded-circle icon-circle icon-color-animal">
                                    <i class="bi bi-tencent-qq icon-size" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Hewan Ternak</p>
                                <p class="card-title" id="total-animals">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Data Ternak

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center">
                                <div class="badge rounded-circle icon-circle icon-color-breed">
                                    <i class="bi bi-postcard-heart-fill icon-color-feed icon-size"
                                        aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Pakan Ternak</p>
                                <p class="card-title" id="total-breeds">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Data Pakan Ternak

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center">
                                <div class="badge rounded-circle icon-circle icon-color-medical">
                                    <i class="bi bi-bandaid icon-size" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Rekam Medis Ternak</p>
                                <p class="card-title" id="total-medicalRecords">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Data Rekam Medis

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .icon-circle {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }

    .icon-color-user {
        background-color: #a8d600;
    }

    .icon-color-animal {
        background-color: #F79263;
    }

    .icon-color-breed {
        background-color: #6FB3E0;
    }

    .icon-color-medical {
        background-color: #CB6FD7;
    }

    .icon-size {
        font-size: 24px;
    }

    .number {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        color: #333;
    }
</style>
@endsection