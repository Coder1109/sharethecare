@extends('layouts.app2')


@section('content')

    <section id="dashboard-ecommerce">
        <!-- Start home land header -->
        <!-- End home land header -->
        <!-- Start home land body -->
        <div class="row">
            <div class="col-12">
                <!-- Start new QR generate  -->
                <div class="card">
                    <!-- Start Generate new QR header -->
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="card-title">Patient Info</h4>

                    </div>
                    <!-- End Generate new QR header -->

                    <div class="card-content">
                        <div class="card-body pb-0">
                            <div class="row">
                                <!-- Start Patient Info -->
                                <div class="col-xl-7 col-md-12">
                                    <div class="card">
                                        <!-- Start Patient info header -->
                                        <div class="card-header">
                                            <h4 class="card-title">Patient Information</h4>
                                        </div>
                                        <!-- End Patient info header -->
                                        <!-- Start Patient info form -->
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <!-- Start P's Info name -->
                                                        <div class="col-12">
                                                            <div class="row my-2">
                                                                <div class="col-md-4">
                                                                    <b>Patient Name</b>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    {{$patient->name}}
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-md-4">
                                                                    <b>Patient Email</b>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    {{$patient->email}}
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-md-4">
                                                                    <b>Patient Phone Number</b>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    {{$patient->phone}}
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-md-4">
                                                                    <b>Referred By</b>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    {{$patient->assisted_by}}
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-md-4">
                                                                    <b>Total Referrals</b>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    {{$patient->counter}}
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-md-4">
                                                                    <b>Is Active</b>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    {{$patient->active?"Active":"Not Active"}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Patient info form -->
                                    </div>
                                </div>
                                <!-- End Patient Info -->
                                <!-- Start QR Generate and SMS, Email -->
                                <div class="col-xl-5 col-md-12">
                                    <div class="card">

                                        <div class="card-header">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 class="card-title">QR Code</h4>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="card-content">
                                            <div class="card-body py-3">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12 d-flex justify-content-center">
                                                        <img class="img-fluid qr-image"
                                                             id="qr_image"
                                                             src="{{asset($patient->qr_link)}}" width="300"
                                                             height="300"/>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End QR Generate and SMS, Email -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


