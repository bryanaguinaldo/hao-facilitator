@extends('layouts.base')

@section('login')
<main class="main-content mt-0" style="background-color: white">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain pb-0">
                            <div class="card-header text-start">
                                <h4 class="font-weight-bolder">Sign In</h4>
                                <p class="mb-0">Please sign in to continue.</p>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                    <span class="alert-text text-white"><strong>Error!</strong> {{ Session::get('message') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <form role="form" method="POST" action="{{ route('login.user') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control form-control-lg @error('name') border-danger @enderror" placeholder="Username" aria-label="Name">
                                        @error('name') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control form-control-lg @error('password') border-danger @enderror" placeholder="Password" aria-label="Password">
                                        @error('password') <span class="text-sm text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column" style="background-image: url('picsum.photos/1000/1000')">
                        <div class="position-relative bg-gradient-dark h-100 d-flex flex-column justify-content-center">
                            <img src="../../../assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-2 start-0">
                            <div class="position-relative">
                                <img class="max-width-500 w-100 position-relative z-index-2" src="../../../assets/img/illustrations/lock.png" alt="lock">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
