@extends('layouts.app') @section('pageTitle', 'Présence') @section('content')
<section class="mb-4 col-md-12">
	<h2 class="h1-responsive font-weight-bold text-center my-4">
		Bienvenue @if (Auth::user()) {{ Auth::user()->name }} @else - @endif - Présence (Checking)
	</h2>
	<p class="text-center w-responsive mx-auto mb-5">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat.
	</p>
	@php 
        $type = CAL_GREGORIAN; 
        $month = date('n'); 
        $year = date('Y'); 
        $day_count = cal_days_in_month($type, $month, $year); 
        $iday = 0; 
        for ($i = 1; $i<=$day_count; $i++) { 
            $date=$year. '/'.$month. '/'.$i; 
            $get_name=date( 'l', strtotime($date)); 
            $day_name=substr($get_name, 0, 3); 
            if($day_name !='Sun' && $day_name !='Sat'){ 
                $iday +=1; 
            } 
        } 
    @endphp 

	<div class="row">
		<div class="col-md-4 col-xl-4">
			<div class="card bg-c-green order-card">
				<div class="card-block">
					<h6 class="m-b-20">
						Nombre de jours de présence du mois
					</h6>
					<h2 class="text-right">
						<i class="fa fa-rocket f-left">
						</i>
						<span>
							5
						</span>
					</h2>
					<p class="m-b-0">
						Total jours du mois
						<span class="f-right">
							{{ $iday }}
						</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-xl-4">
			<div class="card bg-c-yellow order-card">
				<div class="card-block">
					<h6 class="m-b-20">
						Nombre de jours d'absence de mois précédent
					</h6>
					<h2 class="text-right">
						<i class="fa fa-refresh f-left">
						</i>
						<span>
							3
						</span>
					</h2>
					<p class="m-b-0">
						Total jours du mois
						<span class="f-right">
							{{ $iday }}
						</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-xl-4">
			<div class="card bg-c-pink order-card">
				<div class="card-block">
					<h6 class="m-b-20">
						Nombre de retards du mois
					</h6>
					<h2 class="text-right">
						<i class="fa fa-credit-card f-left">
						</i>
						<span>
							0
						</span>
					</h2>
					<p class="m-b-0">
						Total jours du mois
						<span class="f-right">
							{{ $iday }}
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
    
	@if($notEmployee == false)
    <h4 id="idAtt" class="mt0 mb0 text-muted" style="text-align: center;padding: 20px;background: #704f4f;font-weight: bold;">
        @if(!empty($no_check_out_attendances))
		Vous avez fait : {{ $wh }} aujourd'hui.
		<br/>
		@endif
		Heures de travail :
		@if(!empty($no_check_out_attendances))
		@php
			$dateIn = \Carbon\Carbon::parse($no_check_out_attendances->check_in);
			$nowT = \Carbon\Carbon::now();
			$worked_hours = $nowT->diff($dateIn, 2)->format(' %H heures - %I minutes');
		@endphp
    	<span>{{ $worked_hours }}</span>
		@else
			{{ $wh }} 
		@endif
    </h4>
    
    <h2 class="h1-responsive font-weight-bold text-center my-4" style="text-align: center;padding: 25px;font-weight: bold; margin: 0;">
		<header_title>
			<h1>
				Cliquez pour 
				<b>
				@if(!empty($no_check_out_attendances))
					SORTIR
				@else
					ENTRER
				@endif
				</b>
			</h1>
		</header_title>
	</h2>
	
	<p class="message-check"></p>

	<div class="o_hr_attendance_kiosk_mode">
		@if(!empty($no_check_out_attendances))
		<a class="fa fa-7x o_hr_attendance_sign_in_out_icon fa-sign-out btn-primary" aria-label="Sign out" title="Pointer la sortie"></a>
		@else
		<a class="fa fa-7x o_hr_attendance_sign_in_out_icon fa-sign-in btn-primary" aria-label="Sign in" title="Pointer l'entrée"></a>
		@endif
	</div>
	@endif
	<br />
</section>
@endsection