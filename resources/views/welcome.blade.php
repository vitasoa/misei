@extends('layouts.app') 

@section('pageTitle', 'Accueil')

@section('content')
<div class="container">
	<div id="my-carousel" class="carousel slide hero-slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#my-carousel" data-slide-to="0" class="active">
			</li>
			<li data-target="#my-carousel" data-slide-to="1" class="">
			</li>
			<li data-target="#my-carousel" data-slide-to="2" class="">
			</li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active" style="background: #4a595e;">
				<img src="https://uicookies.com/demo/theme/marketer/img/hero-slide-1.jpg" alt="Hero Slide">
				<div class="carousel-caption">
					<h1>
						Strategic Management
					</h1>
					<p>
						Efficiently develop parallel e-markets through impactful outsourcing.
						<br>
						Conveniently drive prospective functionalities before.
					</p>
				</div>
			</div>
			<div class="item" style="background: #f06c55;">
				<img src="https://uicookies.com/demo/theme/marketer/img/hero-slide-2.jpg" alt="...">
				<div class="carousel-caption">
					<h1>
						Market Analyst
					</h1>
					<p>
						Synergistically enhance low-risk high-yield testing procedures
						<br>
						with clicks-and-mortar architectures.
					</p>
				</div>
			</div>
			<div class="item" style="background: #26aeaa;">
				<img src="https://uicookies.com/demo/theme/marketer/img/hero-slide-3.jpg" alt="...">
				<div class="carousel-caption">
					<h1>
						Customer Care
					</h1>
					<p>
						Monotonectally envisioneer 24/7 bandwidth with reliable imperatives.
						<br>
						Continually unleash unique niches after go forward.
					</p>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
		<i class="fa fa-angle-left" aria-hidden="true"></i>
		<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
		<i class="fa fa-angle-right" aria-hidden="true"></i>
		<span class="sr-only">Next</span>
		</a>
	</div>
	<section class="client-logo ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-4 col-xs-6 section-margin">
					<a href="#"><img src="https://uicookies.com/demo/theme/marketer/img/logo-client-1.jpg" alt="Image"></a>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 section-margin">
					<a href="#"><img src="https://uicookies.com/demo/theme/marketer/img/logo-client-2.jpg" alt="Image"></a>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 section-margin">
					<a href="#"><img src="https://uicookies.com/demo/theme/marketer/img/logo-client-3.jpg" alt="Image"></a>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 section-margin">
					<a href="#"><img src="https://uicookies.com/demo/theme/marketer/img/logo-client-4.jpg" alt="Image"></a>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 section-margin">
					<a href="#"><img src="https://uicookies.com/demo/theme/marketer/img/logo-client-5.jpg" alt="Image"></a>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 section-margin">
					<a href="#"><img src="https://uicookies.com/demo/theme/marketer/img/logo-client-6.jpg" alt="Image"></a>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection