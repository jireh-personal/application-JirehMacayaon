@extends('welcome')
@section('content')

<form method="POST" action="{{ url('/profile/'.Auth::user()->id) }}">
{{ csrf_field() }}
{{ method_field('PUT') }}
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-6 bg-light shadow-sm rounded p-5">
                    @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                        <div class="row mb-3">
                            <div class="col">
                                <label class="col-form-label">Name</label>
                                <input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{ Auth::user()->firstname }}">
                                @if($errors->has('firstname'))
                                        <p class="text-danger">{{ $errors->first('firstname') }}</p>
                                        @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="col-form-label">Name</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{ Auth::user()->lastname }}">
                                @if($errors->has('lastname'))
                                        <p class="text-danger">{{ $errors->first('lastname') }}</p>
                                        @endif
                            </div>
                        </div>
                            <div class="row mb-3">
                            <div class="col">
                                    <label class="col-form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{ Auth::user()?->infos?->address }}">
                                    @if($errors->has('address'))
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                        @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col">
                                    <label class="col-form-label">Age</label>
                                    <input type="text" name="age" class="form-control" placeholder="Age" value="{{ Auth::user()?->infos?->age }}">
                                    @if($errors->has('age'))
                                        <p class="text-danger">{{ $errors->first('age') }}</p>
                                        @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary col-12">Update</button>
                                </div>
                            </div>
                            <div class="my-4 border"></div>
                            <div class="row">
                                <div class="col">
                                    <a href="/" class="btn btn-secondary col-12">Back to Dashboard</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection