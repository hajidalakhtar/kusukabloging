{{-- @extends('layouts.app') --}}
@extends('layouts.app',['title'=>$setting->app_name])
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h1 class="text-center mb-4 mt-4" style="font-family: 'Anton', sans-serif;">{{$setting->app_name}}
                    </h1>
                    <div class="container" style="width:90%">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group ">
                                <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group ">
                                <label for="email"
                                    class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group ">
                                <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group ">
                                <label for="password-confirm"
                                    class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{ url('/auth/google') }}" class="btn btn-danger"><i
                                        class="fab fa-google-plus-g"></i> Google</a>
                            </div>
                        </form>
                    </div>
                    <a class="btn btn-link" href="{{ Route('login')}}">
                        {{ __('Login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection