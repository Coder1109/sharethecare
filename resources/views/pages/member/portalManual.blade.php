@extends('layouts.app2')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/pickers/pickadate/pickadate.css') }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}

@endsection

@section('content')
    <!-- users edit start -->
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-md-12">
                    <h2 class="col-md-12 content-header-title float-left mb-0">Manual Entry</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Member Portal
                            </li>
                            <li class="breadcrumb-item">Manual Entry
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <!-- end row -->
        <div class="row">
            <div class="col-xl-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manual Entry</h4>
                    </div>
                    <div class="border-bottom mt-2"></div>
                    <div class="card-content">
                        <div class="card-body">
                            {{--                            <form class="form form-vertical" method="POST" id="generateURL">--}}
                            {{--                                @csrf--}}
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-12">
                                        @if(session('message'))
                                            <h4 class="text-danger">Duplicated Patinet Info</h4>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        @if($errors->any())
                                            <h4 class="text-danger">Duplicated Email</h4>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sender" class="col-md-12 col-form-label">Please select Sender <a
                                                    class="text-danger font-14">*</a></label>
                                            <div class="position-relative has-icon-left">
                                                <select id="sender"
                                                        class="form-control @error('sender') is-invalid @enderror"
                                                        name="sender"
                                                        value="{{ old('sender') }}"
                                                        required autocomplete="name" autofocus>
                                                    <option value="">Select Sender...</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sender')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="patient" class="col-md-12 col-form-label">Add patient <a
                                                    class="text-danger font-14">*</a>
                                                <a type="button"
                                                   class="btn btn-sm btn-primary waves-effect waves-light text-white px-1 mr-1"
                                                   data-toggle="modal"
                                                   data-target="#addPatient">Add patient
                                                </a>
                                            </label>
                                            <div class="position-relative has-icon-left">
                                                <select id="patient"
                                                        class="form-control @error('patient') is-invalid @enderror"
                                                        name="patient"
                                                        value="{{ old('patient') }}"
                                                        required autocomplete="patient" autofocus>
                                                    <option value="">Select Patient...</option>
                                                    @foreach($patients as $patient)
                                                        <option
                                                            value="{{ $patient->name }}">{{ $patient->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('patient')
                                                <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label for="referral_date" class="col-md-12 col-form-label">Referral Date <a
                                                    class="text-danger font-14">*</a></label>
                                            <div class="position-relative has-icon-left pr-lg-1 pr-md-0">
                                                <input type="date"
                                                       class="form-control @error('referral_date') is-invalid @enderror"
                                                       id="referral_date" name="referral_date" value="mm/dd/yyyy"
                                                       required autocomplete="referral_date"/>
                                                @error('referral_date')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="feather icon-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <label for="description" class="col-md-12 col-form-label">Description(Optional)</label>
                                                <div class="col-md-12">
                                                        <textarea class="form-control" rows="3"
                                                                  id="description" name="description" required
                                                                  autocomplete="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" id="clearEntry"
                                                class="col-12 btn btn-relief-success waves-effect waves-light px-1 mt-1">
                                            Clear
                                        </button>
                                        <button type="button" id="emailSubmit"
                                                class="col-12 btn btn-relief-info waves-effect waves-light px-1 mt-1">
                                            Email to Referrer
                                        </button>
                                        <button type="button" id="smsSubmit"
                                                class="col-12 btn btn-relief-primary waves-effect waves-light px-1 mt-1">
                                            SMS to Referrer
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{--                            </form>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title">Refferal Patient Message History</h4>
                                </div>
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
                                        <th>Sender</th>
                                        <th>Patient</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Referral Date</th>
                                        {{--                                        <th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sms_histories as $sms_history)
                                        <tr>
                                            <td>
                                                {{ $sms_history->id }}
                                            </td>
                                            <td>
                                                {{ $sms_history->sender }}
                                            </td>
                                            <td>
                                                {{ $sms_history->patient_name }}
                                            </td>
                                            <td>
                                                {{ $sms_history->email }}
                                            </td>
                                            <td>
                                                {{ $sms_history->phone }}
                                            </td>
                                            <td>
                                                {{date('m-d-Y', strtotime($sms_history->referral_date))}}
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
        </div>
    </div>
    <!-- users edit ends -->

    <div class="modal fade" id="addPatient" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title">Add Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/member/registerPatient">
                        @csrf
                        @method('post')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ old('phone') }}"
                                       placeholder="123-456-7890" required
                                       autocomplete="phone"
                                       autofocus
                                >

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="assisted_by" class="col-md-4 col-form-label text-md-right">Assisted By</label>
                            <div class="col-md-6 position-relative has-icon-left">
                                <select id="assisted_by" class="form-control @error('assisted_by') is-invalid @enderror"
                                        name="assisted_by"
                                        {{--                                                           value="{{$user->name}}" --}}
                                        required autocomplete="assisted_by" autofocus>
                                    <option value="">Select Employee...</option>
                                    @foreach($users as $user)
                                        <option>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('assisted_by')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="notes"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Notes') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="3"
                                          id="notes" name="notes" autocomplete="notes"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" id="clearPage" class="btn btn-primary mr-3">
                                    {{ __('Clear') }}
                                </button>
                                <button type="submit" class="btn btn-primary text-right">
                                    {{ __('Register') }}
                                </button>
                            </div>
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
    <script src="https://unpkg.com/jquery-input-mask-phone-number@1.0.0/dist/jquery-input-mask-phone-number.js"></script>
    <script src="{{ asset('js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>
    <script>

        $("#registerPatient").click(function () {

            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let assisted_by = $('#assisted_by').val();
            let notes = $('#notes').val();

            let token;
            token = '{{ csrf_token() }}';

            $.ajax({
                method: 'post',
                url: '/member/registerPatient',
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    assisted_by: assisted_by,
                    notes: notes,
                    _token: token
                },
                success: function (response) {
                    // console.log('response: >>>> ', JSON.stringify(response, null, 4))
                    if (response.success) {
                        alert('Successfully added.') //Message come from controller
                    } else {
                        alert("Duplicated patient types")
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        });

        function generateQR(isTrans = false) {

            let referral_date = $('#referral_date').val();
            let description = $('#description').val();
            let patient = $("#patient option:selected").val();
            let sender = $("#sender option:selected").val();

            let token;
            token = '{{ csrf_token() }}';

            const url = isTrans ? '/member/emailSubmit' : '/member/smsSubmit'
            if (isValidate()) {
                $.ajax({
                    method: 'post',
                    url: url,
                    data: {
                        referral_date: referral_date,
                        description: description,
                        patient: patient,
                        sender: sender,
                        _token: token
                    },
                    success: function (response) {
                        // console.log('response: >>>> ', JSON.stringify(response, null, 4))
                        if (response.success) {

                        } else {
                            alert('Duplicated patient types.')
                        }
                    },
                    error: function (error) {
                        alert('Failed sent QR')
                        console.log(error)
                    }
                });
            }
        }

        $("#emailSubmit").click(function () {
            generateQR(false)
        });

        $("#smsSubmit").click(function () {
            generateQR(true)
        });

        $("#clearEntry").click(function () {

            $('#sender').val("");
            $('#patient').val("");
            $('#date').val("");
            $('#description').val("");

        });

        $("#clearPage").click(function () {

            $('#name').val("");
            $('#email').val("");
            $('#phone').val("");
            $('#assisted_by').val("");
            $('#notes').val("");

        });

        function isValidate() {
            let referral_date = $('#referral_date').val();
            let patient = $("#patient option:selected").val();
            let sender = $("#sender option:selected").val();

            if (sender == '') {
                alert('Please select sender')
                return false
            } else if (patient == '') {
                alert('Please select Patient')
                return false
            } else if (referral_date == '') {
                alert('Please fill out the Date')
                return false
            } else {
                return true
            }
        }

        $('#phone').usPhoneFormat();

    </script>
    <!-- End script-->
@endsection

