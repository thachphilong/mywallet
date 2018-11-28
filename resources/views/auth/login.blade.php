@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/login/signin.css')}}">
@section('content')
<div style="padding-top:50px">
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
      <div style="text-align:justify">
      <!--google login-->
        <!-- <div class="g-signin2" data-width="300" data-height="50" data-onsuccess="onSignIn" data-longtitle="true"></div> -->
        <a class="btn btn-outline-primary btn-block" href="{{ URL::to('auth/google') }}">
        <svg aria-hidden="true" class="" width="18" height="18" viewBox="0 0 18 18">
          <g>
            <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path><path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17z" fill="#34A853"></path><path d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07z" fill="#FBBC05"></path><path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3z" fill="#EA4335"></path>
          </g>
        </svg>
        Đăng nhập bằng Google
        </a>
      <!--facebook login -->
      <a class="btn btn-outline-primary btn-block" href="{{ URL::to('auth/facebook') }}">
          <svg aria-hidden="true" class="" width="18" height="18" viewBox="0 0 18 18">
            <path d="M1.88 1C1.4 1 1 1.4 1 1.88v14.24c0 .48.4.88.88.88h7.67v-6.2H7.46V8.4h2.09V6.61c0-2.07 1.26-3.2 3.1-3.2.88 0 1.64.07 1.87.1v2.16h-1.29c-1 0-1.19.48-1.19 1.18V8.4h2.39l-.31 2.42h-2.08V17h4.08c.48 0 .88-.4.88-.88V1.88c0-.48-.4-.88-.88-.88H1.88z" fill="#3C5A96"></path>
          </svg>
          Đăng nhập bằng Facebook
      </a>
      </div>
      <!--version-->
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  </form>
</div>
@endsection