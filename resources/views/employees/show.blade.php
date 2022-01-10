@extends('layouts.app') 

@php
	$title = "Mon Profil";
@endphp
@if (Auth::user()->id == $employee->id)
	@php $title = "Mon Profil"; @endphp
@else
	@php $title = "Profil : " . $employee->lastname . " " . $employee->name; @endphp
@endif

@section('pageTitle', $title)

@section('content')
<section class="mb-4 col-md-12">
	<h2 class="h1-responsive font-weight-bold text-center my-4">
		 @if (Auth::user()->id == $employee->id)
			Mon Profil
		 @else
			Profil : <b>{{ $employee->lastname }} {{ $employee->name }}</b>
		 @endif
	</h2>
	<p class="text-center w-responsive mx-auto mb-5">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat.
	</p>
	
	<div class="row ">
		<form method="#" action="#" id="show-form" enctype="multipart/form-data">
			<div class="col-md-9 mb-md-0 mb-5">
				@csrf
				<h3 class="text-center w-responsive mx-auto mb-5">
					<header_title>
						<h1>
							Informations
						</h1>
					</header_title>
				</h3>
				<div class="row">
					<div class="col-md-6">
						<label for="name" class="form-label">
							Civilité <span style="color: #b10303"> *</span>
						</label>
						<select class="form-control" name="gender" required>
							<option value="">
								-
							</option>
							<option {{ $employee->gender == 'Masculin' ? "selected" : "" }} value="Masculin">
								Masculin
							</option>
							<option {{ $employee->gender == 'Féminin' ? "selected" : "" }} value="Féminin">
								Féminin
							</option>
							<option {{ $employee->gender == 'Autre' ? "selected" : "" }} value="Autre">
								Autre
							</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="lastname" class="form-label">
							Statut matrimoniale <span style="color: #b10303"> *</span>
						</label>
						<select class="form-control" name="marital" required>
							<option value="">
								-
							</option>
							<option {{ $employee->marital == 'Célibataire' ? "selected" : "" }} value="Célibataire">
								Célibataire
							</option>
							<option {{ $employee->marital == 'Marié(e)' ? "selected" : "" }} value="Marié(e)">
								Marié(e)
							</option>
							<option {{ $employee->marital == 'Cohabitant légal' ? "selected" : "" }} value="Cohabitant légal">
								Cohabitant légal
							</option>
							<option {{ $employee->marital == 'Divorcé(e)' ? "selected" : "" }} value="Divorcé(e)">
								Divorcé(e)
							</option>
							<option {{ $employee->marital == 'Veuf(ve)' ? "selected" : "" }} value="Veuf(ve)">
								Veuf(ve)
							</option>
						</select>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="name" class="form-label">
							Nom <span style="color: #b10303"> *</span>
						</label>
						<input value="{{ $employee->name }}" type="text" class="form-control" name="name" placeholder="Nom de l'Employée" required>
					</div>
					<div class="col-md-6">
						<label for="lastname" class="form-label">
							Prénoms
						</label>
						<input value="{{ $employee->lastname }}" type="text" class="form-control" name="lastname" placeholder="Prénom(s) de l'Employée">
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="job_title" class="form-label">
							Titre (Poste) <span style="color: #b10303"> *</span>
						</label>
						<input value="{{ $employee->job_title }}" type="text" class="form-control" name="job_title" placeholder="Titre (Poste)" required>
					</div>
					<div class="col-md-6">
						<label for="work_email " class="form-label">
							Adresse E-mail <span style="color: #b10303"> *</span>
						</label>
						<input value="{{ $employee->work_email }}" type="email" class="form-control" name="work_email" placeholder="Adresse Electronique" required>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="work_phone" class="form-label">
							Téléphone (Bureau)
						</label>
						<input value="{{ $employee->work_phone }}" type="text" class="form-control" name="work_phone" placeholder="Téléphone (Bureau)">
					</div>
					<div class="col-md-6">
						<label for="mobile_phone " class="form-label">
							Téléphone (Mobile) <span style="color: #b10303"> *</span>
						</label>
						<input value="{{ $employee->mobile_phone }}" type="text" class="form-control" name="mobile_phone" placeholder="Téléphone (Mobile)" required>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="work_location" class="form-label">
							Lieu de travail (Bureau)
						</label>
						<input value="{{ $employee->work_location }}" type="text" class="form-control" name="work_location" placeholder="Lieu de travail (Bureau)">
					</div>
					<div class="col-md-6">
						<label for="departement " class="form-label">
							Département
						</label>
						<input value="{{ $employee->departement }}" type="text" class="form-control" name="departement" placeholder="Département">
					</div>
				</div>
				<br />
				<h3 class="text-center w-responsive mx-auto mb-5">
					<header_title>
						<h1>
							Adresse
						</h1>
					</header_title>
				</h3>
				<div class="row">
					<div class="col-md-12">
						<label for="street" class="form-label">
							Rue
						</label>
						<input value="{{ $employee->street }}" type="text" class="form-control" name="street" placeholder="Rue (Adresse de la Rue)">
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="city" class="form-label">
							Ville
						</label>
						<input value="{{ $employee->city }}" type="text" class="form-control" name="city" placeholder="Ville">
					</div>
					<div class="col-md-6">
						<label for="country" class="form-label">
							Pays
						</label>
						<input value="{{ $employee->country }}" type="text" class="form-control" name="country" placeholder="Pays">
					</div>
				</div>
				<br />
				<h3 class="text-center w-responsive mx-auto mb-5">
					<header_title>
						<h1>
							Autres
						</h1>
					</header_title>
				</h3>
				<div class="row">
					<div class="col-md-4">
						<label for="date_of_birth" class="form-label">
							Date de naissance
						</label>
						<div class="datepicker date 
						input-group p-0 shadow-sm">
							<input type="text" placeholder="Date de naissance" class="form-control py-4 px-4" name="date_of_birth" value="{{ \Carbon\Carbon::parse($employee->date_of_birth)->format('d/m/Y') }}"/>
							<div class="input-group-append">
								<span class="input-group-text px-4">
									<i class="fa fa-clock-o">
									</i>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="city_of_bith" class="form-label">
							Ville de naissance
						</label>
						<input value="{{ $employee->city_of_bith }}" type="text" class="form-control" name="city_of_bith" placeholder="Ville de naissance">
					</div>
					<div class="col-md-4">
						<label for="country_of_birth" class="form-label">
							Pays de naissance
						</label>
						<input value="{{ $employee->country_of_birth }}" type="text" class="form-control" name="country_of_birth" placeholder="Pays de naissance">
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="spouse_complete_name" class="form-label">
							Nom du conjoint(e)
						</label>
						<input value="{{ $employee->spouse_complete_name }}" type="text" class="form-control" name="spouse_complete_name" placeholder="Ville de naissance">
					</div>
					<div class="col-md-6">
						<label for="spouse_birthdate" class="form-label">
							Date de naissance du (de la) conjoint(e)
						</label>
						<div class="datepicker2 date 
						input-group p-0 shadow-sm">
							<input type="text" placeholder="Date de naissance du (de la) conjoint(e)" class="form-control py-4 px-4" name="spouse_birthdate" value="{{ \Carbon\Carbon::parse($employee->spouse_birthdate)->format('d/m/Y') }}"/>
							<div class="input-group-append">
								<span class="input-group-text px-4">
									<i class="fa fa-clock-o">
									</i>
								</span>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-4">
						<label for="children_nbr" class="form-label">
							Nombre d'enfant à charge
						</label>
						<input value="{{ $employee->children_nbr }}" type="text" class="form-control" name="children_nbr" placeholder="Nombre d'enfant à charge">
					</div>
					<div class="col-md-4">
						<label for="study_field" class="form-label">
							Champ d'étude
						</label>
						<input value="{{ $employee->study_field }}" type="text" class="form-control" name="study_field" placeholder="Champ d'étude">
					</div>
					<div class="col-md-4">
						<label for="study_school" class="form-label">
							Etablissement d'origine
						</label>
						<input value="{{ $employee->study_school }}" type="text" class="form-control" name="study_school" placeholder="Etablissement d'origine">
					</div>
				</div>
				<br />
			</div>
			<div class="col-md-3 text-center">
				<h3 class="text-center w-responsive mx-auto mb-5">
					<header_title>
						<h1>
							Profil
						</h1>
					</header_title>
				</h3>
				<div class="d-flex flex-column align-items-center text-center p-3 py-5">
						
						@if (isset($employee->photo))
							<img class="profile-pic rounded-circle mt-5" width="150px" src="{{ $employee->photo }}">
						@else
							<img class="profile-pic rounded-circle mt-5" width="150px" src="{{ asset('img/default-avatar.png') }}">
						@endif
						
						<div>
							<label for="employee_profile_photo">Photo de profil</label>
						</div>
						
						<div class="divider" style="margin: 10px 0px;"></div>
						
						<div class="row">
						<label for="parent_id " class="form-label">
							Gestionnaire
						</label>						
						<select class="form-control" name="parent_id" id="parent_id" aria-hidden="true">
							@if (isset($employee->parent))
								<option value="">{{ $employee->parent->lastname }} {{ $employee->parent->name }}</option>
							@endif
						</select>						
					</div>
					</div>
			</div>
			
			<div class="text-center text-md-left col-md-12">
				<a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info btn-sm">
					@if (Auth::user()->id == $employee->id)
						Modifier mon profil
					 @else
						Modifer le profil de : <b>{{ $employee->lastname }} {{ $employee->name }}</b>
					 @endif
				</a>
				<a href="{{ route('employees.index') }}" class="btn btn-default btn-sm">Retour</a>
			</div>
			
		</form>
	</div>
	<br />
</section>
@endsection