@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/login/signin.css')}}">
@section('content')
<!--form login-->
<form class="form-signin" method="POST" action="{{ route('login')}}">
    @csrf
    <!--icon app-->
      <img class="mb-4" src="bootstrap/site/docs/4.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <!--label-->
      <h1 class="h3 mb-3 font-weight-normal">{{ __('Please Sign-in') }}</h1>
    <!--Username-->
      <label for="inputEmail" class="sr-only">{{ __('E-Mail Address') }}</label>
      <input type="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>
        @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
         @endif
    <!--Password-->
      <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>
      <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
        @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
         @endif
    <!--login button-->
      <div class="form-check checkbox mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
      </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">{{ __('Login') }}</button>
        <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
    <!--google login-->
      <div class="g-signin2" data-width="300" data-height="50" data-onsuccess="onSignIn" data-longtitle="true"></div>
      <p id="data"></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
@endsection