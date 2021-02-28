@extends('layouts.app2')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/pickers/pickadate/pickadate.css') }}">
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
    <!-- users edit start -->
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-md-12">
                    <h2 class="col-md-12 content-header-title float-left mb-0 text-uppercase">Top Referrers</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Member Portal
                            </li>
                            <li class="breadcrumb-item">Top Referrers
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
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title"></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                {{--                                <div class="row">--}}
                                {{--                                    <div class="col-lg-3 col-sm-12">--}}
                                {{--                                        <div class="form-group">--}}
                                {{--                                            <p>Analytics</p>--}}
                                {{--                                            <select id="role" class="form-control">--}}
                                {{--                                                <option value="">Select Analytics...</option>--}}
                                {{--                                                <option value="Team Analytics">Team Analytics</option>--}}
                                {{--                                                <option value="Office Analytics">Office Analytics</option>--}}
                                {{--                                                <option value="Review Request Analytics">Review Request Analytics</option>--}}
                                {{--                                                <option value="Referring Analytics">Referring Analytics</option>--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                @if(Session::has('message'))--}}
                                {{--                                {{ Session::get('message') }}--}}
                                {{--                                @endif--}}
                                <div class="row">
                                    <div class="col-lg-3 col-sm-12 mb-3">
                                        <a href="{{route('activation')}}" type="button"
                                           class="btn btn-primary text-white" data-toggle="modal" data-target="#scan">Scan
                                            QR</a>
                                    </div>
                                </div>

                                @if($errors->any())
                                    <h4 class="text-danger">Please input correct email</h4>
                                @endif

                                <div class="table-responsive">
                                    <table class="table" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th>Active</th>
                                            <th>Name</th>
                                            <th># of Referrals</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Referred By</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                        @foreach($patients as $patient)--}}
                                        {{--                                            @if($patient->counter>0)--}}
                                        {{--                                                <tr class="">--}}
                                        {{--                                                    <td class="">--}}
                                        {{--                                                        <a  href="/member/activeReferrer/{{ $patient->id }}"--}}
                                        {{--                                                            data-toggle="modal" data-target="#active">--}}
                                        {{--                                                            @if($patient->active == 1)--}}
                                        {{--                                                                <i class="fa fa-check text-success"></i>--}}
                                        {{--                                                            @else--}}
                                        {{--                                                                <i class="fa fa-times"></i>--}}
                                        {{--                                                            @endif--}}
                                        {{--                                                        </a>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        {{ $patient->name }}--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        {{ $patient->counter }}--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        {{ $patient->phone }}--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        {{ $patient->email }}--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        {{ $patient->assisted_by }}--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="text-right">--}}
                                        {{--                                                    --}}{{--                                            {{ $users->links() }}--}}
                                        {{--                                                </tr>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        @endforeach--}}
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- users edit ends -->

    <div class="modal fade text-left" id="scan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success white">
                    <h5 class="modal-title" id="myModalLabel110">Scan QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="activePatient" action="">
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

    <div class="modal fade text-left" id="activeTopPatient" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success white">
                    <h5 class="modal-title" id="myModalLabel110">Active Referrer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="activeTopPatientInfo" action="">
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

    <div class="modal fade text-left" id="inactiveTopPatient" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning white">
                    <h5 class="modal-title" id="myModalLabel110">Inactive Referrer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="inactiveTopPatientInfo" action="">
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
    <script>

        $('#scan').on('shown.bs.modal', function (event) {
            $('#activePatient').attr('action', $(event.relatedTarget).attr('href'));
            console.log('request action route', $(event.relatedTarget).attr('href'));
        })

        $('#activeTopPatient').on('shown.bs.modal', function (event) {
            $('#activeTopPatientInfo').attr('action', $(event.relatedTarget).attr('href'));
            console.log('request action route', $(event.relatedTarget).attr('href'));
        })

        $('#inactiveTopPatient').on('shown.bs.modal', function (event) {
            $('#inactiveTopPatientInfo').attr('action', $(event.relatedTarget).attr('href'));
            console.log('request action route', $(event.relatedTarget).attr('href'));
        })

        function refreshPage() {
            $('#patient_name').val("");
            $('#patient_email').val("");
            $('#patient_phone').val("");
            $('#patient_dob').val("");
            $('#patient_register').val("");
            $('#patient_description').val("");
            $('#qr_image').attr('src', base_url + 'assets/images/default_image.png');
        }

        let dataTable;
        $(document).ready(function () {
            dataTable = $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "ajax": '{{ route('portalTopReferrer') }}',
                columns: [
                    {data: 'active', name: 'active', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'counter', name: 'counter'},
                    {data: 'phone', name: 'phone'},
                    {data: 'email', name: 'email'},
                    {data: 'assisted_by', name: 'assisted_by'},

                ]
            });
        });

    </script>
    <!-- End script-->
@endsection

