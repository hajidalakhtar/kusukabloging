@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h1 class="text-center mb-4 mt-4" style="font-family: 'Anton', sans-serif;">{{$setting->app_name}}
                    </h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="container" style="width:90%;">

                            <div class="form-group row">
                                <label for="email"
                                    class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} " name="email"
                                    value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span> @endif
                            </div>

                            <div class="form-group row">
                                <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old( 'remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center ">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            <a href="{{ url('/auth/google') }}" class="btn btn-danger"><i
                                    class="fab fa-google-plus-g"></i> Google</a> @if(Route::has('password.request'))

                            @endif
                        </div>
                        <a class="btn btn-link" href="{{ Route('register')}}">
                            {{ __('Register') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection