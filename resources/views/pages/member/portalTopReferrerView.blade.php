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
    <div class="content-header row mt-2">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-md-12">
                    <h2 class="col-md-12 content-header-title float-left mb-0">View Referrals</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <!-- page users view start -->
        <section class="page-users-view">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title my-2">Referred Patients</div>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="border-bottom"></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Referred By</th>
                                    <th>Notes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($referrers as $referrer)
                                    <tr>
                                        <td>
                                            {{ $referrer->name }}
                                        </td>
                                        <td>
                                            {{ $referrer->email }}
                                        </td>
                                        <td>
                                            {{ $referrer->phone }}
                                        </td>
                                        <td>
                                            {{ $referrer->assisted_by }}
                                        </td>
                                        <td>
                                            <button type="button" id="generateQR"
                                                    class="btn btn-primary waves-effect waves-light px-1">
                                                Generate QR Code
                                            </button>
                                            <button type="button" id="sendSms"
                                                    class="btn btn-relief-info waves-effect waves-light px-1">
                                                SMS
                                            </button>
                                            <button type="button" id="sendQR"
                                                    class="btn btn-relief-success waves-effect waves-light px-1">
                                                Email
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- information start -->

        </section>
        <!-- page users view end -->

        <div class="modal" id="deleteUser" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger white">
                        <h5 class="modal-title" id="myModalLabel120">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete User?
                    </div>
                    <div class="modal-footer">
                        <form method="POST" id="deleteForm" action="">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">OK</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- users edit ends -->
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

        function refreshPage() {
            $('#patient_name').val("");
            $('#patient_email').val("");
            $('#patient_phone').val("");
            $('#patient_dob').val("");
            $('#patient_register').val("");
            $('#patient_description').val("");
            $('#qr_image').attr('src', base_url + 'assets/images/default_image.png');
        }

    </script>
    <!-- End script-->
@endsection

