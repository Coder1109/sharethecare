@extends('layouts.app2')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/ag-grid/ag-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/ag-grid/ag-theme-material.css') }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/app-user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/aggrid.css') }}">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-md-12">
                    <h2 class="col-md-12 content-header-title float-left mb-0">Office ID</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Member Admin
                            </li>
                            <li class="breadcrumb-item">Office ID
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">

        <form action="/member/adminOfficeAdd" method="POST" enctype="multipart/form-data">
            @csrf

            <section class="">
                <div id="basic-examples">
                    <div class="row">
                        <!-- Start Office Info -->
                        <div class="col-xl-7 col-md-12">
                            <div class="card">
                                <!-- Start Office info header -->
                                <div class="card-header">
                                    <h4 class="card-title">Office Information</h4>
                                </div>
                                <!-- End Office info header -->
                                <!-- Start Office info form -->
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="office_id" class="col-md-12 col-form-label">Office
                                                            ID <a class="text-danger font-14">*</a>
                                                            <button type="button"
                                                                    class="btn btn-sm btn-info waves-effect waves-light ml-2">
                                                                Edit
                                                            </button>
                                                        </label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="office_id"
                                                                   class="form-control @error('office_id') is-invalid @enderror"
                                                                   name="office_id" value="{{ old('office_id') }}"
                                                                   required autocomplete="office_id" autofocus>
                                                            @error('office_id')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                            <div class="form-control-position">
                                                                <i class="feather icon-list"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="member_since" class="col-md-12 col-form-label">Member
                                                            Since <a class="text-danger font-14">*</a>
                                                            <button type="button"
                                                                    class="btn btn-sm btn-info waves-effect waves-light ml-2">
                                                                Edit
                                                            </button>
                                                        </label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="member_since"
                                                                   class="form-control @error('member_since') is-invalid @enderror"
                                                                   name="member_since" value="{{ old('member_since') }}"
                                                                   required autocomplete="member_since" autofocus>
                                                            @error('member_since')
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
                                                <!-- Start P's Info name -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="office_name" class="col-md-12 col-form-label">Office
                                                            Name <a class="text-danger font-14">*</a>
                                                            <button type="button"
                                                                    class="btn btn-sm btn-info waves-effect waves-light ml-2">
                                                                Edit
                                                            </button>
                                                        </label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="office_name"
                                                                   class="form-control @error('office_name') is-invalid @enderror"
                                                                   name="office_name" value="{{ old('office_name') }}"
                                                                   required autocomplete="office_name" autofocus>
                                                            @error('office_name')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                            <div class="form-control-position">
                                                                <i class="feather icon-database"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="office_address" class="col-md-12 col-form-label">Office
                                                            Address <a class="text-danger font-14">*</a>
                                                            <button type="button"
                                                                    class="btn btn-sm btn-info waves-effect waves-light ml-2">
                                                                Edit
                                                            </button>
                                                        </label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="office_address"
                                                                   class="form-control @error('office_address') is-invalid @enderror"
                                                                   name="office_address" value="{{ old('office_address') }}"
                                                                   required autocomplete="office_name" autofocus>
                                                            @error('office_address')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                            <div class="form-control-position">
                                                                <i class="feather icon-home"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start P's Info phone -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="office_phone" class="col-md-12 col-form-label">Office
                                                            Phone <a class="text-danger font-14">*</a>
                                                            <button type="button"
                                                                    class="btn btn-sm btn-info waves-effect waves-light ml-2">
                                                                Edit
                                                            </button>
                                                        </label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="number" id="office_phone"
                                                                   class="form-control @error('office_phone') is-invalid @enderror"
                                                                   name="office_phone" value="{{ old('office_phone') }}"
                                                                   required autocomplete="phone"
                                                                   pattern="/^-?\d+\.?\d*$/"
                                                                   onKeyPress="if(this.value.length==10) return false;">
                                                            @error('office_phone')
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
                                                <!-- End P's Info phone -->
                                                <!-- Start P's Info email -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="office_email" class="col-md-12 col-form-label">Office
                                                            Email <a class="text-danger font-14">*</a>
                                                            <button type="button"
                                                                    class="btn btn-sm btn-info waves-effect waves-light ml-2">
                                                                Edit
                                                            </button>
                                                        </label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="email" id="office_email"
                                                                   class="form-control @error('office_email') is-invalid @enderror"
                                                                   name="office_email" value="{{ old('office_email') }}"
                                                                   required autocomplete="office_email">
                                                            @error('office_email')
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
                                                <!-- End P's Info email -->

                                                <!-- Start P's Info action -->
                                                <div class="col-12">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-3 col-md-12">
                                                            <button type="button"
                                                                    class="col-12 btn btn-success waves-effect waves-light px-1"
                                                                    id="clearPage">
                                                                <i class="fa fa-refresh m-r-5"></i>
                                                                Clear
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start P's Info action -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Office info form -->
                            </div>
                        </div>
                        <!-- End Office Info -->
                        <!-- Start QR Generate and SMS, Email -->
                        <div class="col-xl-5 col-md-12">
                            <div class="card">

                                <div class="card-header">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="card-title">Upload Business Logo</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-content">
                                    <div class="card-body py-3">
                                        <div class="row">

                                            <div class="col-12">
                                                @if ($message = Session::get('success'))
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="alert alert-success alert-block">
                                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 d-flex justify-content-center">
                                                            <img class="img-fluid business_logo" src="{{env('APP_URL')}}/images/business_logo/{{ Session::get('file') }}" width="300" height="300">
                                                        </div>
                                                    </div>
                                                @endif

                                                @if (count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        <strong>Whoops!</strong> There were some problems with your input.
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-12 text-center mt-lg-3 mt-md-3">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-center">
                                                        <input type="file" name="file" class="col-lg-6 col-md-12 form-control mb-5">
                                                    </div>
                                                </div>
                                                <button type="submit" id="saveBusiness"
                                                        class="col-6 btn btn-relief-primary waves-effect waves-light px-1 mt-2">
                                                    <i class="fa fa-plus m-r-10"></i>
                                                    Save Business
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End QR Generate and SMS, Email -->
                    </div>
                </div>
            </section>

        </form>

    </div>

@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset('vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
    {{--    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>--}}
@endsection

@section('page-script')
    <script src="{{ asset('js/scripts/popover/popover.js') }}"></script>
    {{-- Page js files --}}
    <script type="text/javascript">

        $('#error').hide()

        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //
        //         reader.onload = function(e) {
        //             $('#business_logo').attr('src', e.target.result);
        //         }
        //
        //         reader.readAsDataURL(input.files[0]); // convert to base64 string
        //     }
        // }
        //
        // $("#office_logo").change(function() {
        //     readURL(this);
        // });

        {{--$('#saveBusiness').click(function () {--}}


        {{--    let office_id = $('#office_id').val();--}}
        {{--    let member_since = $('#member_since').val();--}}
        {{--    let office_name = $('#office_name').val();--}}
        {{--    let office_address = $('#office_address').val();--}}
        {{--    let office_phone = $('#office_phone').val();--}}
        {{--    let office_email = $('#office_email').val();--}}
        {{--    let office_logo = $('#office_logo').val();--}}

        {{--    console.log('office logo type', typeof office_logo)--}}

        {{--    $.ajax({--}}
        {{--        method: 'post',--}}
        {{--        url: '/member/adminOfficeAdd',--}}
        {{--        data: {--}}
        {{--            "_token": "{{ csrf_token() }}",--}}
        {{--            office_id: office_id,--}}
        {{--            member_since: member_since,--}}
        {{--            office_name: office_name,--}}
        {{--            office_address: office_address,--}}
        {{--            office_phone: office_phone,--}}
        {{--            office_email: office_email,--}}
        {{--            office_logo: office_logo,--}}
        {{--        },--}}
        {{--        success: function (response) {--}}
        {{--            console.log('response: >>>> ', JSON.stringify(response, null, 4))--}}
        {{--            if (response.success) {--}}
        {{--                alert('Successfully Save Business.')--}}
        {{--            } else {--}}
        {{--                alert("Unknown Office type and Logo types(not jpeg,png,jpg,gif,svg)")--}}
        {{--            }--}}
        {{--        },--}}
        {{--        error: function (error) {--}}
        {{--            console.log(error)--}}
        {{--        }--}}
        {{--    });--}}

        {{--})--}}

    </script>
@endsection
