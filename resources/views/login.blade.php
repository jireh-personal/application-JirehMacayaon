@extends('welcome')
@if(!Auth::check())
    @section('content')
    <form method="POST" action="{{ route('signin') }}">
    {{ csrf_field() }}
                <div class="container">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-lg-6 bg-light shadow-sm rounded p-5">
                            @if(Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
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
                                <div class="row mb-2">
                                    <div class="col">
                                        <input type="checkbox" name="remember_me">
                                        <label class="text-secondary">Remember Me</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary col-12">Login</button>
                                    </div>
                                </div>
                                <div class="my-4 border"></div>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{  route('register') }}" class="btn btn-secondary col-12">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    @endsection
@endif