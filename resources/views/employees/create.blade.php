@extends('layouts.app') 

@section('pageTitle', 'Employée')

@section('content')
<section class="mb-4 col-md-12">
	<h2 class="h1-responsive font-weight-bold text-center my-4">
		Ajouter un nouvel "Employée"
	</h2>
	<p class="text-center w-responsive mx-auto mb-5">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
		ex ea commodo consequat.
	</p>
	<div class="row ">
		<form method="POST" action="{{ route('employees.store') }}" id="create-form" enctype="multipart/form-data">
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
							<option {{ old( 'gender')=='Masculin' ? "selected" : "" }} value="Masculin">
								Masculin
							</option>
							<option {{ old( 'gender')=='Féminin' ? "selected" : "" }} value="Féminin">
								Féminin
							</option>
							<option {{ old( 'gender')=='Autre' ? "selected" : "" }} value="Autre">
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
							<option {{ old( 'marital')=='Célibataire' ? "selected" : "" }} value="Célibataire">
								Célibataire
							</option>
							<option {{ old( 'marital')=='Marié(e)' ? "selected" : "" }} value="Marié(e)">
								Marié(e)
							</option>
							<option {{ old( 'marital')=='Cohabitant légal' ? "selected" : "" }} value="Cohabitant légal">
								Cohabitant légal
							</option>
							<option {{ old( 'marital')=='Divorcé(e)' ? "selected" : "" }} value="Divorcé(e)">
								Divorcé(e)
							</option>
							<option {{ old( 'marital')=='Veuf(ve)' ? "selected" : "" }} value="Veuf(ve)">
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
						<input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Nom de l'Employée" required>
						@if ($errors->has('name'))
						<span class="text-danger text-left">
							{{ $errors->first('name') }}
						</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="lastname" class="form-label">
							Prénoms
						</label>
						<input value="{{ old('lastname') }}" type="text" class="form-control" name="lastname" placeholder="Prénom(s) de l'Employée">
						@if ($errors->has('lastname'))
						<span class="text-danger text-left">
							{{ $errors->first('lastname') }}
						</span>
						@endif
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="job_title" class="form-label">
							Titre (Poste) <span style="color: #b10303"> *</span>
						</label>
						<input value="{{ old('job_title') }}" type="text" class="form-control" name="job_title" placeholder="Titre (Poste)" required>
						@if ($errors->has('job_title'))
						<span class="text-danger text-left">
							{{ $errors->first('job_title') }}
						</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="work_email " class="form-label">
							Adresse E-mail <span style="color: #b10303"> *</span>
						</label>
						<input value="{{ old('work_email') }}" type="email" class="form-control" name="work_email" placeholder="Adresse Electronique" required>
						@if ($errors->has('work_email '))
						<span class="text-danger text-left">
							{{ $errors->first('work_email ') }}
						</span>
						@endif
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="work_phone" class="form-label">
							Téléphone (Bureau)
						</label>
						<input value="{{ old('work_phone') }}" type="text" class="form-control" name="work_phone" placeholder="Téléphone (Bureau)">
						@if ($errors->has('work_phone'))
						<span class="text-danger text-left">
							{{ $errors->first('work_phone') }}
						</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="mobile_phone " class="form-label">
							Téléphone (Mobile) <span style="color: #b10303"> *</span>
						</label>
						<input value="{{ old('mobile_phone') }}" type="text" class="form-control" name="mobile_phone" placeholder="Téléphone (Mobile)" required>
						@if ($errors->has('mobile_phone '))
						<span class="text-danger text-left">
							{{ $errors->first('mobile_phone ') }}
						</span>
						@endif
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="work_location" class="form-label">
							Lieu de travail (Bureau)
						</label>
						<input value="{{ old('work_location') }}" type="text" class="form-control" name="work_location" placeholder="Lieu de travail (Bureau)">
						@if ($errors->has('work_location'))
						<span class="text-danger text-left">
							{{ $errors->first('work_location') }}
						</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="departement " class="form-label">
							Département
						</label>
						<input value="{{ old('departement') }}" type="text" class="form-control" name="departement" placeholder="Département">
						@if ($errors->has('departement '))
						<span class="text-danger text-left">
							{{ $errors->first('departement ') }}
						</span>
						@endif
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
						<input value="{{ old('street') }}" type="text" class="form-control" name="street" placeholder="Rue (Adresse de la Rue)">
						@if ($errors->has('street'))
						<span class="text-danger text-left">
							{{ $errors->first('street') }}
						</span>
						@endif
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="city" class="form-label">
							Ville
						</label>
						<input value="{{ old('city') }}" type="text" class="form-control" name="city" placeholder="Ville">
						@if ($errors->has('city'))
						<span class="text-danger text-left">
							{{ $errors->first('city') }}
						</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="country" class="form-label">
							Pays
						</label>
						<input value="{{ old('country') }}" type="text" class="form-control" name="country" placeholder="Pays">
						@if ($errors->has('country'))
						<span class="text-danger text-left">
							{{ $errors->first('country') }}
						</span>
						@endif
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
						<div id="date-container" class="datepicker date 
						input-group p-0 shadow-sm">
							<input type="text" placeholder="Date de naissance" class="form-control py-4 px-4" name="date_of_birth"/>
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
						<input value="{{ old('city_of_bith') }}" type="text" class="form-control" name="city_of_bith" placeholder="Ville de naissance">
						@if ($errors->has('city_of_bith'))
						<span class="text-danger text-left">
							{{ $errors->first('city_of_bith') }}
						</span>
						@endif
					</div>
					<div class="col-md-4">
						<label for="country_of_birth" class="form-label">
							Pays de naissance
						</label>
						<input value="{{ old('country_of_birth') }}" type="text" class="form-control" name="country_of_birth" placeholder="Pays de naissance">
						@if ($errors->has('country_of_birth'))
						<span class="text-danger text-left">
							{{ $errors->first('country_of_birth') }}
						</span>
						@endif
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-6">
						<label for="spouse_complete_name" class="form-label">
							Nom du conjoint(e)
						</label>
						<input value="{{ old('spouse_complete_name') }}" type="text" class="form-control" name="spouse_complete_name" placeholder="Ville de naissance">
						@if ($errors->has('spouse_complete_name'))
						<span class="text-danger text-left">
							{{ $errors->first('spouse_complete_name') }}
						</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="spouse_birthdate" class="form-label">
							Date de naissance du (de la) conjoint(e)
						</label>
						<div id="date-container2" class="datepicker2 date 
						input-group p-0 shadow-sm">
							<input type="text" placeholder="Date de naissance du (de la) conjoint(e)" class="form-control py-4 px-4" name="spouse_birthdate"/>
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
						<input value="{{ old('children_nbr') }}" type="text" class="form-control" name="children_nbr" placeholder="Nombre d'enfant à charge">
						@if ($errors->has('children_nbr'))
						<span class="text-danger text-left">
							{{ $errors->first('children_nbr') }}
						</span>
						@endif
					</div>
					<div class="col-md-4">
						<label for="study_field" class="form-label">
							Champ d'étude
						</label>
						<input value="{{ old('study_field') }}" type="text" class="form-control" name="study_field" placeholder="Champ d'étude">
						@if ($errors->has('study_field'))
						<span class="text-danger text-left">
							{{ $errors->first('study_field') }}
						</span>
						@endif
					</div>
					<div class="col-md-4">
						<label for="study_school" class="form-label">
							Etablissement d'origine
						</label>
						<input value="{{ old('study_school') }}" type="text" class="form-control" name="study_school" placeholder="Etablissement d'origine">
						@if ($errors->has('study_school'))
						<span class="text-danger text-left">
							{{ $errors->first('study_school') }}
						</span>
						@endif
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
						
						<span style="font-size:14px;font-style:italic;font-weight:normal;display: block;color: slategrey;">Utiliser une photo au format PNG ou JPG</span>
						
						<img class="profile-pic rounded-circle mt-5" width="150px" src="{{ asset('img/default-avatar.png') }}">

						<div>
							<label for="employee_profile_photo">Changer ma photo de profil</label>
							
							<input style="display: none;" id="employee_profile_photo" name="employee_profile_photo" type="file" value="">
							<br>
							<div>
								<button style="padding: 0px; margin-top: -35px; margin-bottom: -20px;" id="import-pr-photo" class="btn rounded dark" type="button"><i class="fa fa-camera"></i> Importer une photo</button>
							</div>
						</div>
						
						<div class="divider" style="margin: 10px 0px;"></div>
						
						<div class="row">
						<label for="parent_id " class="form-label">
							Gestionnaire
						</label>						
						<select class="form-control" name="parent_id" id="parent_id" aria-hidden="true">
							<option value="">-</option>
							@foreach($employees as $vEmployee)
								<option value="{{ $vEmployee->id }}">{{ $vEmployee->lastname }} {{ $vEmployee->name }}</option>
							@endforeach
						</select>						
						@if ($errors->has('parent_id '))
						<span class="text-danger text-left">
							{{ $errors->first('parent_id ') }}
						</span>
						@endif
					</div>
					</div>
			</div>
			
			<div class="text-center text-md-left col-md-12">
				<button type="submit" class="btn btn-primary btn-sm">
					Envoyer
				</button>
				<a href="{{ route('employees.index') }}" class="btn btn-default btn-sm">Retour</a>
			</div>
			
		</form>
	</div>
	<br />
</section>
<script type="text/javascript">
	let importPhoto = document.querySelector('#import-pr-photo')
	importPhoto.addEventListener('click', function(e) {
		let t = e.currentTarget;
		document.querySelector('#employee_profile_photo').click();
	})
	
	// When choosing to change profile picture
	let chooseImg = document.querySelector('#employee_profile_photo')
	if (chooseImg) {
		chooseImg.addEventListener('change', function(e) {
			if (e.currentTarget.files.length) {
				let url = URL.createObjectURL(e.currentTarget.files[0])
				document.querySelector('.profile-pic').src = url
			}
		})
	}
</script>
@endsection