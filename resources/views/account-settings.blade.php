@extends('layouts.base')

@section('content')
<main>
    <div class="mt-2">
        <div class="row">
            <div class="col-12">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                    <span class="alert-text text-white"><strong>Success!</strong> {{ Session::get('message') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="row mx-auto">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="font-weight-bolder">Change Password</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('account_settings.update') }}" method="POST" id="changePasswordForm" role="form text-left">
                                    <div class="row mt-3">
                                        @csrf
                                        <div class="col-12">
                                            <label>Old Password</label>
                                            <input class="multisteps-form__input form-control" name="old_password" type="password" />
                                            @error('old_password') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label>New Password</label>
                                            <input class="multisteps-form__input form-control" name="new_password" type="password" />
                                            @error('new_password') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label>Repeat Password</label>
                                            <input class="multisteps-form__input form-control" name="password_confirmation" type="password" />
                                            @error('password_confirmation') <span class="text-sm text-danger mb-0">{{ $message }} </span> @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark mt-2 float-end w-25">Submit and Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
