@extends('layouts.app') 

@section('pageTitle', 'Contactez-Nous')

@section('content')
<section class="mb-4 col-md-12">
	<h2 class="h1-responsive font-weight-bold text-center my-4">
		Contactez-Nous
	</h2>
	<p class="text-center w-responsive mx-auto mb-5">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat.
	</p>
	<div class="row">
		<div class="col-md-9 mb-md-0 mb-5">
			<form id="contact-form" name="contact-form" action="#" method="POST">
				<div class="row">
					<div class="col-md-6">
						<div class="md-form mb-0">
							<input type="text" id="name" name="name" class="form-control" placeholder="Votre nom">
						</div>
					</div>
					<div class="col-md-6">
						<div class="md-form mb-0">
							<input type="text" id="email" name="email" class="form-control" placeholder="Votre adresse éléctronique">
						</div>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-12">
						<div class="md-form mb-0">
							<input type="text" id="subject" name="subject" class="form-control" placeholder="Objet">
						</div>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-12">
						<div class="md-form">
							<textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Votre message"></textarea>
						</div>
					</div>
				</div>
                <br />
			</form>
			<div class="text-center text-md-left">
				<a class="btn btn-primary btn-sm">Envoyer</a>
			</div>
            <br />
			<div class="status">
			</div>
		</div>
		<div class="col-md-3 text-center">
			<ul class="list-unstyled mb-0">
				<li>
					<i class="fa fa-map-marker mt-4 fa-2x" aria-hidden="true">
					</i>
					<p>
						Ankatso, XX XXXXXX, Madagascar
					</p>
				</li>
				<li>
					<i class="fa fa-phone mt-4 fa-2x">
					</i>
					<p>
						+ 01 234 567 89
					</p>
				</li>
				<li>
					<i class="fa fa-envelope mt-4 fa-2x">
					</i>
					<p>
						contact@misei.mg
					</p>
				</li>
			</ul>
		</div>
	</div>
</section>
@endsection