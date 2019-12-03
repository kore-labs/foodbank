<section class="body-sign">
  <div class="center-sign">
    <a href="/" class="logo pull-left">
      <logo class="logo-medium">{{ config('app.name', 'AirBNB-Spider') }}</logo>
    </a>

    <div class="panel panel-sign">
      <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
      </div>
      <div class="panel-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

          <div class="form-group mb-lg">


            <label>{{ __('E-Mail Address') }}</label>

            <div class="input-group input-group-icon">
              <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <span class="input-group-addon">
                <span class="icon icon-lg">
                  <i class="fa fa-user"></i>
                </span>
              </span>
            </div>
          </div>

          <div class="form-group mb-lg">
            <div class="clearfix">
              <label class="pull-left">{{ __('Password') }}</label>
              @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
            </div>
            <div class="input-group input-group-icon">

              <input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <span class="input-group-addon">
                <span class="icon icon-lg">
                  <i class="fa fa-lock"></i>
                </span>
              </span>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-8">
              <div class="checkbox-custom checkbox-default">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <div class="col-sm-4 text-right">
              <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
              <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>

            </div>
          </div>

          <span class="mt-lg mb-lg line-thru text-center text-uppercase">
            <span>or</span>
          </span>

          <!--<div class="mb-xs text-center">
            <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
            <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
          </div>-->

          <p class="text-center">Don't have an account yet? <a href="/register">Sign Up!</a>

        </form>
      </div>
    </div>

    <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
  </div>
</section>
