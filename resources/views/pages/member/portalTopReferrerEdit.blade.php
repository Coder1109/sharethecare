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
                    <h2 class="col-md-12 content-header-title float-left mb-0 text-uppercase">Top Referrer</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Member Portal
                            </li>
                            <li class="breadcrumb-item"><a href="/member/portalTopReferrer">Top Referrer</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="">
            <div class="col-xl-7 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Top Referrer Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST"
                                  action="/member/portalTopReferrer-edit/{{$patient->id}}"
                            >
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name" class="col-md-12 col-form-label">Name <a
                                                        class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" id="name"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           name="name"
                                                           value="{{ $patient->name }}"
                                                           required autocomplete="name" autofocus>
                                                    @error('name')
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
                                                <label for="email" class="col-md-12 col-form-label">Email <a
                                                        class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="email" id="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ $patient->email }}" required
                                                           autocomplete="email" disabled>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="form-control-position">
                                                        <i class="feather icon-mail"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="phone" class="col-md-12 col-form-label">Phone <a
                                                        class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="tel" id="phone"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           name="phone" value="{{ $patient->phone }}" required
                                                           autocomplete="phone" disabled>
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="form-control-position">
                                                        <i class="feather icon-smartphone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="assisted_by" class="col-md-12 col-form-label">Assisted By <a
                                                        class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <select id="assisted_by"
                                                            class="form-control @error('assisted_by') is-invalid @enderror"
                                                            name="assisted_by"
                                                            autocomplete="assisted_by" autofocus>
                                                        <option value="">Select Employee...</option>
                                                        @foreach($users as $user)
                                                            <option
                                                                value="{{ $user->name }}" {{$user->name == $patient->assisted_by  ? 'selected' : ''}}>{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('assisted_by')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </div>
                                                {{--                                                <div class="position-relative has-icon-left">--}}
                                                {{--                                                    <input type="text" id="assisted_by"--}}
                                                {{--                                                           class="form-control"--}}
                                                {{--                                                           name="assisted_by" value="{{ $patient->assisted_by }}"--}}
                                                {{--                                                           autocomplete="assisted_by">--}}
                                                {{--                                                    <div class="form-control-position">--}}
                                                {{--                                                        <i class="feather icon-smartphone"></i>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="counter" class="col-md-12 col-form-label"># of Referrals <a
                                                        class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" id="counter"
                                                           class="form-control"
                                                           name="counter" value="{{ $patient->counter }}"
                                                           autocomplete="counter">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-users"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="notes" class="col-md-12 col-form-label">Notes <a
                                                        class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                <textarea class="form-control" rows="3"
                                                          id="notes" name="notes" autocomplete="notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="button"
                                                    class="btn btn-success waves-effect waves-light mr-1 px-1"
                                                    onclick="refreshPage()">
                                                <i class="fa fa-refresh mr-lg-1 mr-md-0"></i>
                                                Clear
                                            </button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light px-1">
                                                <i class="fa fa-save mr-lg-1 ml-md-0"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    <script
        src="https://unpkg.com/jquery-input-mask-phone-number@1.0.0/dist/jquery-input-mask-phone-number.js"></script>
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

        $('#phone').usPhoneFormat();

    </script>
    <!-- End script-->
@endsection

