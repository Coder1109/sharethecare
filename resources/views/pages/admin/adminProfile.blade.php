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
                    <h2 class="col-md-12 content-header-title float-left mb-0 text-uppercase">Profile & Settings</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Member Admin
                            </li>
                            <li class="breadcrumb-item">Profile & Settings
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
                        {{--                        <form method="post" action="/member/sendWebapp">--}}
                        {{--                            @csrf--}}
                        <div class="card-header">
                            <div class="d-flex justify-content-start">
                                <h4 class="card-title mr-1">Web App Notifications</h4>
                            </div>
{{--                            <div class="d-flex justify-content-end">--}}
{{--                                <button type="submit" class="btn btn-primary">Send to Team Members</button>--}}
{{--                            </div>--}}
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
{{--                                            <th><input type="checkbox" class="check_all" id="selectedAll"></th>--}}
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Referral Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
{{--                                                <td>--}}
{{--                                                    <input type="checkbox" name="selectedItems[]" value="{{ $user->id }}" id="{{$user->id}}" onclick="selectedItem({{ $user->id }})">--}}
{{--                                                </td>--}}
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->phone }}
                                                </td>
                                                <td>
                                                    {{date('m-d-Y H:00', strtotime($user->created_at))}}
                                                </td>
                                            </tr>
                                            <tr class="text-right">
                                                {{--                                        {{ $users->links() }}--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        {{--                        </form>--}}
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title mr-1">Email Notifications
                                        {{--                                        <span class="badge badge-pill badge-success badge-lg badge-up cart-item-count"><i class="feather icon-message-square"></i></span>--}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Referral Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    1234567890
                                                </td>
                                                <td>
                                                    11/21/2020
                                                </td>
                                            </tr>
                                            <tr class="text-right">
                                                {{--                                        {{ $users->links() }}--}}
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title mr-1">SMS Notifications
                                        {{--                                        <span class="badge badge-pill badge-success badge-lg badge-up cart-item-count"><i class="feather icon-message-square"></i></span>--}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Referral Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    1234567890
                                                </td>
                                                <td>
                                                    11/21/2020
                                                </td>
                                            </tr>
                                            <tr class="text-right">
                                                {{--                                        {{ $users->links() }}--}}
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
        </section>
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

        function selectedItem(id){
            alert(id);
        }

        $("#sendSms").click(function(){

            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let assisted_by = $('#assisted_by').val();
            let notes = $('#notes').val();

            if (isValidate()) {
                $.ajax({
                    method: 'post',
                    url: '/api/smsSend',
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        assisted_by: assisted_by,
                        notes: notes,
                    },
                    success: function (response) {
                        // console.log('response: >>>> ', JSON.stringify(response, null, 4))
                        if (response.success) {
                            alert('Successfully sent.') //Message come from controller
                        } else {
                            alert("Unknown patient types")
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            }
        });

        function refreshPage() {
            $('#patient_name').val("");
            $('#patient_email').val("");
            $('#patient_phone').val("");
            $('#patient_dob').val("");
            $('#patient_register').val("");
            $('#patient_description').val("");
            $('#qr_image').attr('src', base_url+'assets/images/default_image.png');
        }

    </script>
    <!-- End script-->
@endsection

