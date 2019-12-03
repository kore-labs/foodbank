<section class="body-sign">
	<div class="center-sign">
		<a href="/" class="logo pull-left">
			<logo class="logo-medium">{{ config('app.name', 'AirBNB-Spider') }}</logo>
		</a>

		<div class="panel panel-sign">
			<div class="panel-title-sign mt-xl text-right">
				<h2 class="black title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
			</div>
			<div class="panel-body">
				<form method="POST" action="/register">
					@csrf


					<div class="form-group mb-lg">
						<label for="name">{{ __('Name') }}</label>
						<input id="name" type="text" class="form-control input-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

						@error('name')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror

					</div>

					<div class="form-group mb-lg">
						<label for="email" >{{ __('E-Mail Address') }}</label>

						<input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

						@error('email')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror


					</div>

					<div class="form-group mb-none">
						<div class="row">
							<div class="col-sm-6 mb-lg">

								<label for="password"> {{ __('Password') }}</label>
								<input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

								@error('password')
										<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
										</span>
								@enderror

							</div>
							<div class="col-sm-6 mb-lg">
								<label for="password-confirm" >{{ __('Confirm Password') }}</label>
								<input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" required autocomplete="new-password">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="checkbox-custom checkbox-default">
								<input id="AgreeTerms" name="agreeterms" type="checkbox"/>
								<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
							</div>
						</div>
						<div class="col-sm-4 text-right">
							<button type="submit" class="btn btn-primary hidden-xs">Sign Up</button>
							<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
						</div>
					</div>

					<span class="mt-lg mb-lg line-thru text-center text-uppercase">
						<span>or</span>
					</span>

          <!--
					<div class="mb-xs text-center">
						<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
						<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
					</div>
				    -->

					<p class="text-center">Already have an account? <a href="/login">Sign In!</a>

				</form>
			</div>
		</div>

		<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
	</div>
</section>
