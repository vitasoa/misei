@extends('layouts.app') 

@section('pageTitle', 'Se connecter')

@section('content')
<section class="mb-4 col-md-12">
	<h2 class="h1-responsive font-weight-bold text-center my-4">
		Se connecter
	</h2>
	<p class="text-center w-responsive mx-auto mb-5">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat.
	</p>
	<div class="col-md-12 align-items-right">
		<form method="POST" action="{{ route('login') }}" style="float:right; width: 70%;">
			@csrf
			<div class="row mb-3">
				<div class="col-md-6">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Votre adresse éléctronique">
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>
			</div>
            <br />
			<div class="row mb-3">
				<div class="col-md-6">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Votre mot de passe">
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>
			</div>
            <br />
			<div class="row mb-3">
				<div class="col-md-3">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
						<label class="form-check-label" for="remember">
							Se souvenir de moi
						</label>
					</div>
				</div>
			</div>
			<br />
			<div class="row mb-3">
				<div class="col-md-6">
					<button type="submit" class="btn btn-primary btn-sm">
						Se connecter
					</button>
					@if (Route::has('password.request'))
					<a class="btn btn-link" href="{{ route('password.request') }}">
						Mot de passe oublié ?
					</a>
					@endif
				</div>
			</div>
            <br />
            <br />
		</form>
	</div>
</section>
@endsection