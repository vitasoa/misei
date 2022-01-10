@extends('layouts.app') @section('content')
<section class="mb-4 col-md-12">
	<h2 class="h1-responsive font-weight-bold text-center my-4">
		Se connecter
	</h2>
	<p class="text-center w-responsive mx-auto mb-5">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat.
	</p>
	<div class="col-md-12 align-items-right">
		<form method="POST" action="{{ route('register') }}">
			@csrf
			<div class="row mb-3">
				<label for="name" class="col-md-4 col-form-label text-md-right">
					{{ __('Name') }}
				</label>
				<div class="col-md-6">
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label for="email" class="col-md-4 col-form-label text-md-right">
					{{ __('E-Mail Address') }}
				</label>
				<div class="col-md-6">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label for="password" class="col-md-4 col-form-label text-md-right">
					{{ __('Password') }}
				</label>
				<div class="col-md-6">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label for="password-confirm" class="col-md-4 col-form-label text-md-right">
					{{ __('Confirm Password') }}
				</label>
				<div class="col-md-6">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
				</div>
			</div>
			<div class="row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('Register') }}
					</button>
				</div>
			</div>
		</form>
	</div>
</section>
@endsection