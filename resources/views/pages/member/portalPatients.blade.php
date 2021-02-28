@extends('layouts.app2')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{asset('css/pages/app-user.css')}}">
    <style>
        th, td {
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-md-12">
                    <h2 class="col-md-12 content-header-title float-left mb-0 text-uppercase">All Patients</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Member Portal
                            </li>
                            <li class="breadcrumb-item">All Patients
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <div class="float-left">
                                    <h4 class="card-title">Patient History</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        @if($errors->any())
                                            <h4 class="text-danger">Please input correct email</h4>
                                        @endif
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table" id="patientDataTable">
                                        <thead>
                                        <tr>
                                            <th style="width: 5%">Active</th>
                                            <th style="width: 5%">Name</th>
                                            <th style="width: 15%">Email</th>
                                            <th style="width: 15%">Phone Number</th>
                                            <th style="width: 10%">Active Date</th>
                                            <th style="width: 15%">Assisted by</th>
                                            <th style="width: 15%">Total Referred</th>
                                            <th style="width: 15%">action</th>
                                        </tr>
                                        </thead>
                                            <tbody>
                                            @foreach($patients as $patient)
                                                <tr>
                                                    <td>
                                                        <a  href="/member/activePatient/{{ $patient->id }}"
                                                            data-toggle="modal" data-target="@if ($patient->active==0) #activePatient @elseif ($patient->active==1) #inactivePatient @endif">
                                                            @if($patient->active == 1)
                                                                <i class="fa fa-check text-success"></i>
                                                            @else
                                                                <i class="fa fa-times"></i>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $patient -> name }}
                                                    </td>
                                                    <td>
                                                        {{ $patient -> email }}
                                                    </td>
                                                    <td>
                                                        {{ $patient -> phone }}
                                                    </td>
                                                    <td>
                                                        {{ $patient -> created_at }}
                                                    </td>
                                                    <td>
                                                        {{ $patient -> assisted_by }}
                                                    </td>
                                                    <td>
                                                        {{ $patient -> counter }}
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

                <div class="col-12">
                    <a href="/member/activeQR" data-toggle="modal" data-target="#activeQR" class="col-lg-2 col-md-12 mt-2 btn btn-primary text-white">Activate QR</a>
                    <a href="/home" class="col-lg-2 col-md-12 mt-2 btn btn-primary text-white">Generate QR</a>
                    <a href="/member/retrieveQR" data-toggle="modal" data-target="#retrieveQR" class="col-lg-2 col-md-12 mt-2 btn btn-primary text-white">Retrieve QR</a>
                </div>

            </div>
        </section>

        <div class="modal fade text-left" id="activePatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success white">
                        <h5 class="modal-title" id="myModalLabel110">Active Referrer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="activePatientInfo" action="">
                        @csrf
                        <div class="modal-body">
                            <input type="text" class="form-control" name="active_patient" required autofocus>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Accept</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="inactivePatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning white">
                        <h5 class="modal-title" id="myModalLabel110">Inactive Referrer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="inactivePatientInfo" action="">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h1 class="text-warning">Are you sure?</h1>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Remove</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="activeQR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success white">
                        <h5 class="modal-title">Activate QR Code</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="activePatientQR" action="">
                        @csrf
                        <div class="modal-body">
                            <input class="form-control" name="email">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Accept</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="retrieveQR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success white">
                        <h5 class="modal-title" id="myModalLabel110">Retrieve QR Code</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="retrievePatientQR" action="">
                        @csrf
                        <div class="modal-body">
                            <input class="form-control" name="email">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Accept</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset('vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>
    <script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <script>

        $('#activePatient').on('shown.bs.modal', function (event) {
            $('#activePatientInfo').attr('action', $(event.relatedTarget).attr('href'));
            console.log('request action route', $(event.relatedTarget).attr('href'));
        })

        $('#inactivePatient').on('shown.bs.modal', function (event) {
            $('#inactivePatientInfo').attr('action', $(event.relatedTarget).attr('href'));
            console.log('request action route', $(event.relatedTarget).attr('href'));
        })

        $('#activeQR').on('shown.bs.modal', function (event) {
            $('#activePatientQR').attr('action', $(event.relatedTarget).attr('href'));
            console.log('request action route', $(event.relatedTarget).attr('href'));
        })

        $('#retrieveQR').on('shown.bs.modal', function (event) {
            $('#retrievePatientQR').attr('action', $(event.relatedTarget).attr('href'));
            console.log('request action route', $(event.relatedTarget).attr('href'));
        })

        function refreshPage() {
            $('#patient_name').val("");
            $('#patient_email').val("");
            $('#patient_phone').val("");
            $('#patient_dob').val("");
            $('#patient_register').val("");
            $('#patient_description').val("");
            $('#qr_image').attr('src', {{ env('APP_URL') }}+'assets/images/default_image.png');
        }

        let dataTable;
        $(document).ready(function() {
            dataTable = $('#patientDataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "ajax": '{{ route('portalPatients') }}',
                columns: [
                    { data: 'active', name: 'active', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'assisted_by', name: 'assisted_by' },
                    { data: 'action', name: 'action' },
                ]
            });
        });

    </script>
    <!-- End script-->
@endsection

