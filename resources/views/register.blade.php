@extends('welcome')
@section('content')
<form method="POST" action="{{ route('register') }}">
{{ csrf_field() }}
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-6 bg-light shadow-sm rounded p-5">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{ old('firstname') }}">
                                @if($errors->has('firstname'))
                                <p class="text-danger">{{ $errors->first('firstname') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{ old('lastname') }}">
                                @if($errors->has('lastname'))
                                <p class="text-danger">{{ $errors->first('lastname') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    @if($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary col-12">Register</button>
                                </div>
                            </div>
                            <div class="my-4 border"></div>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('login') }}" class="btn btn-secondary col-12">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection