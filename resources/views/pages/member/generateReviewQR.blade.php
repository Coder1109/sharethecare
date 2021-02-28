@extends('layouts.app2')

@section('vendor-style')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <li class="breadcrumb-item">Member Portal
                            </li>
                            <li class="breadcrumb-item">Generate QR for Review
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
                        <h4 class="card-title">Member Generate QR</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="review_url" class="col-md-12 col-form-label">Review URL <a
                                                        class="text-danger font-14">*</a></label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="url" id="review_url"
                                                           class="form-control @error('review_url') is-invalid @enderror"
                                                           name="review_url" value="{{ old('review_url') }}" required
                                                           autocomplete="review_url">
                                                    @error('review_url')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="form-control-position">
                                                        <i class="fa fa-external-link "></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="button" id="submit"
                                                    class="btn btn-primary waves-effect waves-light px-1">
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
                                <div class="col-8 mx-auto">
                                    <div class="form-group">
                                        <label for="phone" class="col-md-12 col-form-label">Send To <a
                                                class="text-danger font-14">*</a></label>
                                        <div class="position-relative has-icon-left">
                                            <input id="phone"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone" value="{{ old('phone') }}" required
                                            >

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <button type="submit"
                                        class="col-lg-6 col-md-12 btn btn-relief-info waves-effect waves-light mb-1"
                                        onclick="sendQR()">
                                    <i class="mdi mdi-cellphone-message"></i> SMS
                                </button>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <button type="submit"
                                        class="col-lg-6 col-md-12 btn btn-relief-primary waves-effect waves-light mb-1"
                                        onclick="sendQRMms()">
                                    <i class="mdi mdi-cellphone-message"></i> MMS
                                </button>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <button type="submit"
                                        class="col-lg-6 col-md-12 btn btn-relief-dark waves-effect waves-light mb-3"
                                        onclick="printQR()">
                                    <i class="ti-email"></i> &nbsp;&nbsp;&nbsp; Email
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column selectors with Export Options and print table -->

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
            $('#qr_image').attr('src', base_url + 'assets/images/default_image.png');
        }

        function sendQR() {
            let qr_link = $('#qr_image').attr('src');
            let phone = $('#phone').val();
            console.log(qr_link)
            if (qr_link == '') {
                alert('QR Code Not Found')
                return false
            }
            if (phone == '') {
                alert('Phone number Not Found')
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
                        alert("Error")
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }

        function sendQRMms() {
            let qr_link = $('#qr_image').attr('src');
            let phone = $('#phone').val();
            console.log(qr_link)
            if (qr_link == '') {
                alert('QR Code Not Found')
                return false
            }
            if (phone == '') {
                alert('Phone number Not Found')
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
                        alert("Error")
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }

        $("#submit").click(function () {

            let review_url = $('#review_url').val();
            if (review_url == '') {
                alert('Please fill out the Review URL')
                return false
            }
            $.ajax({
                method: 'post',
                url: '/member/generateQR',
                data: {
                    review_url: review_url,
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('input[name="_token"]').val());
                },
                success: function (response) {
                    // console.log('response: >>>> ', JSON.stringify(response, null, 4))
                    if (response.success) {
                        console.log(response.qr_link)
                        $('#qr_image').attr('src', response.qr_link)
                        alert('Successfully Created.') //Message come from controller
                    } else {
                        alert("Unknown patient types")
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
