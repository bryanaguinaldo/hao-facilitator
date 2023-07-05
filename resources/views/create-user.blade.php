@extends('layouts.base')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-12">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text text-white"><strong>Success!</strong>&nbsp; {{ Session::get('message') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header border-light">
                        <h5 class="font-weight-bolder mb-0">Create a New Account</h5>
                        <p class="mb-0 text-sm">Notes: For Roles, 1 = Developer | 2 = Administrator | 3 = Manager | 4 = Health Facilitator</p>
                        <p class="mb-0 text-sm">Need reference for Facility IDs? <a href="{{ route('facilities') }}" target="_blank">Check them here!</a></p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('create_user.store') }}" method="POST" id="addUserForm" role="form text-left">
                            <div class="row mt-3">
                                @csrf
                                <div class="col-12 col-sm-6">
                                    <label>Facility ID</label>
                                    <input class="multisteps-form__input form-control" name="facility" type="text" placeholder="Facility ID" />
                                    @error('facility') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Role ID</label>
                                    <input class="multisteps-form__input form-control" name="role" type="text" placeholder="Role ID" />
                                    @error('role') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label>First Name</label>
                                    <input class="multisteps-form__input form-control" name="firstname" type="text" placeholder="eg. Juan" />
                                    @error('firstname') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Last Name</label>
                                    <input class="multisteps-form__input form-control" type="text" name="lastname" placeholder="eg. Dela Cruz" />
                                    @error('lastname') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label>Username</label>
                                    <input class="multisteps-form__input form-control" type="text" name="name" placeholder="eg. juandelacruz" />
                                    @error('name') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Email Address</label>
                                    <input class="multisteps-form__input form-control" type="email" name="email" placeholder="eg. juan_delacruz@gmail.com" />
                                    @error('email') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label>Password</label>
                                    <input class="multisteps-form__input form-control" type="password" name="password" placeholder="••••••••" />
                                    @error('password') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Repeat Password</label>
                                    <input class="multisteps-form__input form-control" type="password" name="password_confirmation" placeholder="••••••••" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('manage_users') }}" type="button" class="btn btn-primary"><span class="fa fa-arrow-left"></span> &nbsp; Return to Manage Users Page</a>
                        <button type="submit" class="btn btn-dark float-end" form="addUserForm">Submit and Create Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
