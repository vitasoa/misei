@extends('layouts.app') 

@section('pageTitle', 'Mot de passe oublié')

@section('content')
<section class="mb-4 col-md-12">
	<h2 class="h1-responsive font-weight-bold text-center my-4">
		Mot de passe oublié ?
	</h2>
	<p class="text-center w-responsive mx-auto mb-5">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat.
	</p>
	<div class="col-md-12 align-items-right">
		@if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
		@endif
		
		<form method="POST" action="{{ route('password.email') }}">
			@csrf

			<div class="row mb-3">
				<label for="email" class="col-md-4 col-form-label text-md-right">Adresse E-mail</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<br />
			<div class="row mb-3" style="text-align: center;">
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary">
						Envoyer un lien de réinitialisation de mot de passe
					</button>
				</div>
			</div>
			<br />
            <br />
		</form>
	</div>
</section>
@endsection