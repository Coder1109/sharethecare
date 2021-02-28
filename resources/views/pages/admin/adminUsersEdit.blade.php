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
                    <h2 class="col-md-12 content-header-title float-left mb-0">Edit Profile</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Member Admin
                            </li>
                            <li class="breadcrumb-item"><a href="{{url('/member/adminUsers')}}">Team Management</a>
                            </li>
                            <li class="breadcrumb-item">Edit Profile
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
                        <h4 class="card-title">Member Admin Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST"
                                  action="{{route('adminUsers.update', ['adminUser' => $user->id])}}"
                            >
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name" class="col-md-12 col-form-label">Name <a class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                           name="name"
                                                           value="{{ $user->name }}"
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
                                                <label for="email" class="col-md-12 col-form-label">Email <a class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ $user->email }}" required autocomplete="email">
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
                                                           name="phone" value="{{ $user->phone }}" required autocomplete="phone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
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
                                                                   id="dob" name="dob" value="{{ $user->dob }}" required autocomplete="dob"/>
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
                                                        <label for="assisted_day" class="col-md-12 col-form-label">Assisted Day <a class="text-danger font-14">*</a></label>
                                                        <div class="position-relative has-icon-left pl-lg-1 pl-md-0">
                                                            <input type="date" class="form-control pickadate-firstday @error('assisted_day') is-invalid @enderror"
                                                                   id="assisted_day" name="register" value="{{ $user->assisted_day }}" required autocomplete="assisted_day"/>
                                                            @error('assisted_day')
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
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="description" class="col-md-12 col-form-label">Description(Optional)</label>
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
            $('#name').val("");
            $('#email').val("");
            $('#phone').val("");
            $('#dob').val("");
            $('#assisted_day').val("");
            $('#description').val("");
        }

    </script>
    <!-- End script-->
@endsection

