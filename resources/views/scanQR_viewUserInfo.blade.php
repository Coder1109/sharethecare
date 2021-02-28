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
                    <h2 class="col-md-12 content-header-title float-left mb-0 text-uppercase">Member - Top Referrers</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
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

        <section class="page-users-view">
            <div class="row">
                <div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Scan QR</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="POST"
                                    {{--                                  action="{{route('users.update', ['user' => $user->id])}}"--}}
                                >
                                    {{--                                @csrf--}}
                                    {{--                                @method('put')--}}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <img class="img-fluid" src="{{asset('images/QR-Code_1140x450.jpg')}}" alt="Scan QR">
                                            </div>
                                            <div class="col-12 d-flex justify-content-end my-2">
                                                <button type="button" class="btn btn-success waves-effect waves-light mr-1 px-1"
                                                        onclick="refreshPage()">
                                                    <i class="fa fa-refresh mr-lg-1 mr-md-0"></i>
                                                    Scan QR
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title my-2">Account Information</div>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="border-bottom"></div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td class="font-weight-bold">Name</td>
                                    <td>Snow</td>
                                    {{--                                <td>{{$user->name}}</td>--}}
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Email</td>
                                    <td>user@user.com</td>
                                    {{--                                <td>{{ $user->email }}</td>--}}
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Role</td>
                                    <td>Referrer</td>
                                    {{--                                <td>{{ $user->name }}</td>--}}
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Birth Date </td>
                                    <td>11/21/2020
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Phone Number</td>
                                    <td>+65958951757</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Text Message</td>
                                    <td>Hello. This is test.
                                    </td>
                                </tr>
                            </table>
                            <div class="row mt-5">
                                <div class="col-12 text-right">
                                    <a href="" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
                                    <button class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="">
            <div id="basic-examples">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <p class="font-16 font-weight-bold">Team Members</p>
                                </div>
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                {{--                                        <th>Email Verified At</th>--}}
                                                <th>Role</th>
                                                <th>Phone Number</th>
                                                <th>QR Code</th>
                                                <th>Actions</th>
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
                                                    {{--                                            <td>--}}
                                                    {{--                                                {{date('m-d-Y H:00', strtotime($user->email_verified_at))}}--}}
                                                    {{--                                            {{ $user->email_verified_at }}--}}
                                                    {{--                                            </td>--}}
                                                    <td>
                                                        @foreach($user->roles as $role)
                                                            <div class="badge badge-primary">{{ $role->name }}</div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        1234567890
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-indigo" data-toggle="popover-click" data-img="{{asset('images/qr_image/qr_sample.jpg')}}">
                                                            <i class="fa fa-qrcode fa-2x"></i>
                                                            {{--                                                    <img class="user-qr border" src="{{asset('images/qr_image/qr_sample.jpg')}}" alt="qr_code" width="100">--}}
                                                        </a>
                                                    </td>
                                                    <td style="min-width: 105px">
                                                        @if($user->hasRole('superadmin'))
                                                            <p>&nbsp</p>
                                                        @else
                                                            <a class="mr-1"
                                                               href="{{ route('users.show', ['user' => $user->id]) }}">
                                                                <i class="feather icon-eye"></i>
                                                            </a>
                                                            <a class="mr-1"
                                                               href="{{ route('users.edit', ['user' => $user->id]) }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                               data-toggle="modal" data-target="#deleteUser">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        @endif
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
            </div>
        </section>

        <div class="modal fade" id="createUser" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title">Create a Patient</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('users.store') }}">
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
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role">
                                        <option value="">Select Role...</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
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
                    {{--                <div class="modal-footer">--}}
                    {{--                    <button type="button" class="btn btn-primary">Save</button>--}}
                    {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    {{--                </div>--}}
                </div>
            </div>
        </div>

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
            $('#qr_image').attr('src', base_url+'assets/images/default_image.png');
        }

    </script>

    <script>

        $('#deleteUser').on('shown.bs.modal', function (event) {
            $('#deleteForm').attr('action', $(event.relatedTarget).attr('href'));
        })

        $('[data-toggle="popover-click"]').popover({
            html: true,
            trigger: 'click',
            title : 'QR Code <a href="#" class="close text-light" data-dismiss="alert">&times;</a>',
            placement: 'bottom',
            content: function () { return '<img src="' + $(this).data('img') + '" width="300"/>'; }
        });
        $(document).on("click", ".popover .close" , function(){
            $(this).parents(".popover").popover('hide');
        });

    </script>
    <!-- End script-->
@endsection

