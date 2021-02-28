@extends('layouts.app2')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/pickers/pickadate/pickadate.css') }}">
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-md-12">
                    <h2 class="col-md-12 content-header-title float-left mb-0">Business - QR Generate</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">QR Generate
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
            <div class="col-xl-7 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Patient Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name" class="col-md-12 col-form-label">Please select Patient <a class="text-danger font-14">*</a>
                                                    <a type="button" class="btn btn-sm btn-primary waves-effect waves-light text-white px-1 mr-1" data-toggle="modal"
                                                       data-target="#addPatient">Add patient
                                                    </a>
                                                </label>
                                                <div class="position-relative has-icon-left">
                                                    <select id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                                            {{--                                                           value="{{$user->name}}" --}}
                                                            required autocomplete="name" autofocus>
                                                        <option value="">Select Patient...</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
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
                                                <label for="email" class="col-md-12 col-form-label">Email <a class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                                <label for="phone" class="col-md-12 col-form-label">Phone <a class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                                           name="phone" value="{{ old('phone') }}" required autocomplete="phone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
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
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-6 pr-md-0">
                                                        <label for="dob" class="col-md-12 col-form-label">DOB <a class="text-danger font-14">*</a></label>
                                                        <div class="position-relative has-icon-left pr-lg-1 pr-md-0">
                                                            <input type="date" class="form-control pickadate-firstday @error('dob') is-invalid @enderror"
                                                                   id="dob" name="dob" value="{{ old('dob') }}" required autocomplete="dob"/>
                                                            @error('dob')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            <div class="form-control-position">
                                                                <i class="feather icon-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pl-md-0">
                                                        <label for="assisted_by" class="col-md-12 col-form-label">Referred By <a class="text-danger font-14">*</a></label>
                                                        <div class="position-relative has-icon-left pl-lg-1 pl-md-0">
                                                            <select id="assisted_by" class="form-control @error('assisted_by') is-invalid @enderror" name="assisted_by"
                                                                    {{--                                                           value="{{$user->name}}" --}}
                                                                    required autocomplete="assisted_by" autofocus>
                                                                <option value="">Select Employee...</option>
                                                                @foreach($users as $user)
                                                                    @if($user->hasRole('member'))
                                                                        <option>{{ $user->name }}</option>
                                                                    @endif
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="description" class="col-md-12 col-form-label">Reason for Referral</label>
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" rows="3"
                                                          id="description" name="register" required autocomplete="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="button" class="btn btn-success waves-effect waves-light mr-1 px-1"
                                                    onclick="refreshPage()">
                                                <i class="fa fa-refresh mr-lg-1 mr-md-0"></i>
                                                Clear
                                            </button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light px-1">
                                                <i class="fa fa-qrcode mr-lg-1 ml-md-0"></i> Generate QR Code
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title">QR Code Image</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="font-12 mt-2">
                                        At first please fill the product information. <br>
                                        And you can generate the QR code.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                        <div class="row justify-content-center align-items-center py-5">
                            <img src="{{asset('images/default_image.png')}}"
                                 class="col-lg-6 col-md-12 img-fluid qr-image"
                                 id="qr_image" name="qr_image"
                            />
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <button type="submit" class="col-lg-6 col-md-12 btn btn-relief-primary waves-effect waves-light mb-1">
                                SMS
                            </button>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <button type="submit" class="col-lg-6 col-md-12 btn btn-relief-success waves-effect waves-light mb-1">
                                Email
                            </button>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <button type="button" id="sendQR" class="col-lg-6 col-md-12 btn btn-relief-info waves-effect waves-light mb-3">
                                Google Review Request
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <form method="POST" action="{{ route('home') }}">
                        @csrf

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
                                <input id="phone" type="number"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ old('phone') }}" required
                                       autocomplete="phone"
                                       autofocus
                                       pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"
                                >

                                @error('phone')
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
                                <textarea class="form-control @error('notes') is-invalid @enderror" rows="3"
                                          id="notes" name="notes" required autocomplete="notes"></textarea>
                                @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
    {{-- vendor files --}}
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
            $('#qr_image').attr('src', base_url+'assets/images/default_image.png');
        }

    </script>
    <!-- End script-->
@endsection
