<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>
			@yield('pageTitle') | {{ config('app.name', 'MISEI - APP - Project') }}
		</title>
		<!-- Scripts -->
		<!--script src="{{ asset('js/app.js') }}" defer></script-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
		<!-- Fonts -->
		<!--link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"-->
		<!-- Styles -->
		<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="/css/font-awesome.min.css">
		<!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />
	</head>
	<body class="container" style="padding-right:0px;padding-left:0px">
		<div class="loading-overlay" id="loading-overlay">
            <div class="loading-overlay-image-container">
                <div class="loader">Loading...</div>
            </div>
        </div>
		<ul style="text-align: end; padding: 10px;">
		@guest
		@if (Route::has('login'))
						<li class="nav-item dropdown {{ (request()->is('login')) ? 'active' : '' }}">
							<a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Se connecter</a>
						</li>
						@endif
		@else
			<li class="nav-item dropdown">
				<a style="color: black" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					{{ Auth::user()->name }}
				</a>

				<div style="padding: 0px 10px;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a style="color: black" class="dropdown-item" href="{{ route('logout') }}"
					   onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
						Se déconnecter
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</li>
		</ul>
		@endguest
		<header class="row">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
						<span class="sr-only">
							Toggle navigation
						</span>
						<span class="icon-bar">
						</span>
						<span class="icon-bar">
						</span>
						<span class="icon-bar">
						</span>
					</button>
					<a class="navbar-brand" href="/">{{ config('app.name', 'MISEI - APP - Project') }}</a>
				</div>
				<div class="collapse navbar-collapse" id="main-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="{{ (request()->is('/')) ? 'active' : '' }}">
							<a href="/"><i class="fa fa-home"></i> Accueil</a>
						</li>
						@auth
						<li class="{{ (request()->is('checking')) ? 'active' : '' }}">
							<a href="/checking"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Présence</a>
						</li>
						<li class="{{ (request()->segment(1) == 'employee') ? 'active' : '' }}">
							<a href="/employee"><i class="fa fa-user-circle" aria-hidden="true"></i> Employées</a>
						</li>
						@endauth
						<li class="{{ (request()->is('gallery')) ? 'active' : '' }}">
							<a href="/gallery"><i class="fa fa-photo"></i> Galerie</a>
						</li>
						<li class="{{ (request()->is('contact')) ? 'active' : '' }}">
							<a href="/contact"><i class="fa fa-envelope"></i> Contact</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<main class="row">
			@yield('content')
		</main>
		<footer class="footer">
			<div class="footer-widget-section">
				<div class="container">
					<div class="row col-md-12">
						<div class="col-md-4">
							<div class="footer-logo">
								<a href="#"><img class="img-responsive" src="https://uicookies.com/demo/theme/marketer/img/logo-client-2.jpg" alt=""></a>
							</div>
						</div>
						<div class="col-md-8">
							<div class="footer-text">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
									ex ea commodo consequat.
								</p>
								<ul>
									<li class="phone">
										<i class="fa fa-volume-control-phone" aria-hidden="true">
										</i>
										+261-XX-XX-XXX-XX
										<small>
											<i class="fa fa-clock-o" aria-hidden="true">
											</i>
											Lun - Ven 8.00 - 18.00h
										</small>
									</li>
									<li class="address">
										<address>
											<i class="fa fa-map-pin" aria-hidden="true">
											</i>
											XXX X Ankatso Antananarivo, MADAGASCAR
										</address>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright-section">
				<div class="clearfix row" style="text-align:left">
					<span class="copytext">
						© MISEI. All rights reserved. | Design By:
						<a href="#">BSchn AND</a>
					</span>
					<ul class="list-inline pull-right">
						<li>
							<a href="#">Twitter</a>
						</li>
						<li>
							<a href="#">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="/js/jquery.min.js">
		</script>
		<script type="text/javascript" src="/js/bootstrap.min.js">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
		</script>
		<script>
			$.fn.datepicker.dates['fr'] = {
				days: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
				daysShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
				daysMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
				months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
				monthsShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
				today: "Aujourd'hui"
			};
			$(".datepicker").datepicker({
				// clearBtn: true,
				format: "dd/mm/yyyy",
				autoclose:true,
				language: 'fr',
				orientation: "auto",
				container: '#date-container'
			});
			$(".datepicker2").datepicker({
				// clearBtn: true,
				format: "dd/mm/yyyy",
				autoclose:true,
				language: 'fr',
				orientation: "auto",
				container: '#date-container2'
			});
		</script>
		<script type="text/javascript">
			$('.portfolio-menu ul li').click(function() {
				$('.portfolio-menu ul li').removeClass('active');
				$(this).addClass('active');

				var selector = $(this).attr('data-filter');
				$('.portfolio-item').isotope({
					filter: selector
				});
				return false;
			});

			$(document).ready(function() {
				var popup_btn = $('.popup-btn');
				popup_btn.magnificPopup({
					type: 'image',
					gallery: {
						enabled: true
					}
				});
				
				$('#show-form :input').prop('disabled', 'disabled');
				// $('#show-form :select').prop('disabled', 'disabled');
			});
		</script>
		<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
			$('.o_hr_attendance_sign_in_out_icon').click(function(){

				$.ajax({ 
					url: "{{ route('post.checking') }}",
					data: {"_token": $('meta[name="csrf-token"]').attr('content')},
					type: 'post',
					enctype: 'multipart/form-data',
					beforeSend: function() {
						$('.message-check').hide();
						$('.message-check').removeClass('success');
                        $('.message-check').removeClass('error');
                        $("#loading-overlay").show();
                    },
					success: function(result)
					{
						if(result.errors){
							$('.message-check').text(result.errors);
							$('.message-check').addClass('error');
							$('.message-check').show();
						}
						
						if(result.success){
							$('.message-check').text(result.success);
							$('.message-check').addClass('success');
							$('.message-check').show();
						}
					},
                    complete: function(result) {
                        $("#loading-overlay").hide();
						// location.reload();
						setTimeout(function(){
							// location.reload();
							$('.message-check.success').hide().css("visibility", "hidden");
							$('.message-check.error').hide().css("visibility", "hidden");
							location.reload(true);
						}, 5000); 
                    }
				});

			});
		</script>
		</div>
	</body>

</html>