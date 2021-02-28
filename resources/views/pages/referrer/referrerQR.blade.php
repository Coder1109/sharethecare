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
                    <h2 class="col-md-12 content-header-title float-left mb-0">QR Generate</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Business Referrer
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
                            <div class="form-body">
                                <div class="row">
                                    <!-- Start P's Info name -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-md-12 col-form-label">Name <a
                                                    class="text-danger font-14">*</a></label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="name"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name"
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
                                    <!-- End P's Info name -->
                                    <!-- Start P's Info email -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email" class="col-md-12 col-form-label">Email <a
                                                    class="text-danger font-14">*</a></label>
                                            <div class="position-relative has-icon-left">
                                                <input type="email" id="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{ old('email') }}" required
                                                       autocomplete="email">
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
                                    <!-- End P's Info email -->
                                    <!-- Start P's Info phone -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="phone" class="col-md-12 col-form-label">Phone <a
                                                    class="text-danger font-14">*</a></label>
                                            <div class="position-relative has-icon-left">
                                                <input id="phone"
                                                       class="form-control @error('phone') is-invalid @enderror"
                                                       name="phone" placeholder="123-456-7890"
                                                       value="{{ old('phone') }}" required
                                                >
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
                                    <!-- End P's Info phone -->
                                    <!-- Start P's Info assisted_by -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="assisted_by" class="col-md-12 col-form-label">Assisted By
                                                Employee</label>
                                            <div class="position-relative has-icon-left">
                                                <select id="assisted_by"
                                                        class="form-control @error('assisted_by') is-invalid @enderror"
                                                        name="assisted_by"
                                                        {{--                                                           value="{{$user->name}}" --}}
                                                        required autocomplete="assisted_by" autofocus>
                                                    <option value="">Select Employee...</option>
                                                    @foreach($roles as $role)
                                                        <option>{{ $role->name }}</option>
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
                                    <!-- End P's Info assisted_by -->
                                    <!-- Start P's Info notes -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="notes" class="col-md-12 col-form-label">Notes </label>
                                            <textarea class="form-control @error('notes') is-invalid @enderror" rows="3"
                                                      id="notes" name="notes" required autocomplete="notes"></textarea>
                                            @error('notes')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End P's Info notes -->
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
                                            <div class="p-t-10 d-lg-none d-sm-flex">&nbsp;</div>
                                            <div class="col-lg-3 col-md-12">
                                                <button id="generateQR" type="button"
                                                        class="col-12 btn btn-primary waves-effect waves-light px-1">
                                                    <i class="fa fa-qrcode m-r-5"></i> Generate QR Code
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start P's Info action -->
                                </div>
                            </div>
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

                            <div class="row justify-content-center align-items-center py-1">
                                <img src="{{asset('images/default_image.png')}}"
                                     class="col-lg-6 col-md-12 img-fluid qr-image"
                                     id="qr_image" name="qr_image"
                                />
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="phone_number" class="col-md-8 col-form-label">Send To <a
                                                class="text-danger font-14">*</a></label>
                                        <div class="position-relative has-icon-left">
                                            <input id="phone_number"
                                                   class="form-control @error('phone_number') is-invalid @enderror"
                                                   name="phone_number"
                                                   value="{{ old('phone_number') }}" required
                                            >
                                            <div class="form-control-position">
                                                <i class="feather icon-smartphone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <button type="button" id="sendSms"
                                        class="col-lg-6 col-md-12 btn btn-relief-primary waves-effect waves-light mb-1">
                                    SMS
                                </button>

                            </div>
                            <div class="row justify-content-center align-items-center">
                                <button type="button" id="sendMms"
                                        class="col-lg-6 col-md-12 btn btn-relief-danger waves-effect waves-light mb-1">
                                    MMS
                                </button>

                            </div>
                            <div class="row justify-content-center align-items-center">
                                <button type="submit"
                                        class="col-lg-6 col-md-12 btn btn-relief-success waves-effect waves-light mb-1">
                                    Email
                                </button>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <button type="button" id="sendQR"
                                        class="col-lg-6 col-md-12 btn btn-relief-info waves-effect waves-light mb-3">
                                    Google Review Request
                                </button>
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!--
        <script src="https://unpkg.com/jquery-input-mask-phone-number@1.0.0/dist/jquery-input-mask-phone-number.js"></script>
    -->

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

    <script>
        function generateQR() {
            var APP_URL = {!! json_encode(url('/')) !!};
            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let assisted_by = $('#assisted_by').val();
            let notes = $('#notes').val();

            const url = '/api/referred/patient/qrGenerate'
            if (isValidate()) {
                $.ajax({
                    method: 'post',
                    url: url,
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

                            $('#qr_image').attr('src', APP_URL + "/" + response.qr_link)
                            alert('Successfully generated.') //Message come from controller
                        } else {
                            alert('Duplicated patient types.')
                        }
                    },
                    error: function (error) {
                        alert('Failed generate QR')
                        console.log(error)
                    }
                });
            }
        }

        $("#generateQR").click(function () {
            console.log("Generate qr code")
            generateQR()
        });

        function isValidate() {
            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let assisted_by = $('#assisted_by').val();

            if (name == '') {
                alert('Please fill out the Patient Name')
                return false
            } else if (email == '') {
                alert('Please fill out the Patient Email')
                return false
            } else if (!validateEmail(email)) {
                alert('Please fill out the validate Email')
                return false
            } else if (phone == '') {
                alert('Please fill out the Patient Phone')
                return false
            } else if (phone.length < 10) {
                alert('Phone number length must be more than 10 characters');
                return false
            } else if (assisted_by == '') {
                alert('Please select the Patient Referred By member')
                return false
            } else {
                return true
            }
        }

        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        $("#sendSms").click(function () {
            let qr_link = $('#qr_image').attr('src');
            let phone = $('#phone_number').val();
            console.log(qr_link)

            if (qr_link == '') {
                alert('QR Code Not Found')
                return false
            }
            if (phone == '') {
                alert('Phone number is empty')
                return false
            }
            $.ajax({
                method: 'post',
                url: '../send/qrcode/sms',
                data: {
                    qr_link: qr_link,
                    phone: phone,
                    sms: true
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('input[name="_token"]').val());
                },
                success: function (response) {
                    // console.log('response: >>>> ', JSON.stringify(response, null, 4))
                    if (response.success) {
                        alert('Successfully Sent.') //Message come from controller
                    } else {
                        alert(response.message)
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        });
        $("#sendMms").click(function () {
            let qr_link = $('#qr_image').attr('src');
            let phone = $('#phone_number').val();
            console.log(qr_link)

            if (qr_link == '') {
                alert('QR Code Not Found')
                return false
            }
            if (phone == '') {
                alert('Phone number is empty')
                return false
            }
            $.ajax({
                method: 'post',
                url: '../send/qrcode/sms',
                data: {
                    qr_link: qr_link,
                    phone: phone,
                    sms: false
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('input[name="_token"]').val());
                },
                success: function (response) {
                    // console.log('response: >>>> ', JSON.stringify(response, null, 4))
                    if (response.success) {
                        alert('Successfully Sent.') //Message come from controller
                    } else {
                        alert(response.message)
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        });
    </script>
    <!-- End script-->
@endsection
