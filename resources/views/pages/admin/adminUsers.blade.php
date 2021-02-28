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
                    <h2 class="col-md-12 content-header-title float-left mb-0">Team Management</h2>
                    <div class="breadcrumb-wrapper col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">Member Admin
                            </li>
                            <li class="breadcrumb-item">Team Management
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-right">
        <button type="button" class="btn btn-primary mb-1 waves-effect waves-light" data-toggle="modal"
                data-target="#createUser">Create Team member
        </button>
    </div>

    <div class="content-body">
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
{{--                                                <th>Active</th>--}}
                                                <th>Name</th>
{{--                                                <th>Phone Number</th>--}}
                                                <th>Email</th>
                                                {{--                                        <th>Email Verified At</th>--}}
                                                <th># of reviews sent</th>
                                                <th>Office ID</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
{{--                                                    <td>--}}
{{--                                                        yes--}}
{{--                                                    </td>--}}
                                                    <td>
                                                        {{ $user->name }}
                                                    </td>
{{--                                                    <td>--}}
{{--                                                        {{ $user->phone }}--}}
{{--                                                    </td>--}}
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>
                                                    <td>
                                                        {{$user->ref_count}}
                                                    </td>
                                                    <td>
                                                        {{ $user->office_id }}
                                                    </td>
                                                    <td style="min-width: 105px">
                                                        @if(!empty($user->qr_url))
                                                            <a class="mr-1"
                                                               target="_blank"
                                                               href="/{{$user->qr_url}}">
                                                                <i class="fa fa-qrcode" aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                        @if($user->hasRole('superadmin'))
                                                            <p>&nbsp</p>
                                                        @else
                                                            <a class="mr-1"
                                                               href="{{ route('adminUsers.show', ['adminUser' => $user->id]) }}">
                                                               <i class="feather icon-eye"></i>
                                                            </a>
                                                            <a class="mr-1"
                                                               href="{{ route('adminUsers.edit', ['adminUser' => $user->id]) }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('adminUsers.destroy', ['adminUser' => $user->id]) }}"
                                                               data-toggle="modal" data-target="#deleteUser">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                                <tr class="text-right">
                                                    {{ $patients->links() }}
                                                </tr>

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
    </div>

    <div class="modal fade" id="createUser" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title">Create Team Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('adminUsers.store') }}">
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
                            <label for="office_id" class="col-md-4 col-form-label text-md-right">{{ __('Office ID') }}</label>

                            <div class="col-md-6">

                                <select id="office_id" class="form-control @error('office_id') is-invalid @enderror" name="office_id">
                                    <option value="">Select Office ID...</option>
                                    @foreach( $offices as $office)
                                        <option value="{{ $office->office_id }}">{{ $office->office_id }}</option>
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

@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset('vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
{{--    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>--}}
@endsection

@section('page-script')
    <script src="{{ asset('js/scripts/popover/popover.js') }}"></script>
    {{-- Page js files --}}

    <script>
        $('#deleteUser').on('shown.bs.modal', function (event) {
            $('#deleteForm').attr('action', $(event.relatedTarget).attr('href'));
            console.log('request action route', $('#deleteForm').attr('action', $(event.relatedTarget).attr('href')));
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
@endsection
