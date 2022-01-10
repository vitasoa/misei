@extends('layouts.app') 

@section('pageTitle', 'Employées')

@section('content')
<section class="mb-4 col-md-12">
<h2 class="h1-responsive font-weight-bold text-center my-4">
	Liste des "Employées" de la Société XXXX-XXXX
</h2>
<p class="text-center w-responsive mx-auto mb-5">
	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
	ex ea commodo consequat.
</p>
<div class="bg-light p-4 rounded employee-list">
	<div class="mt-2">
		@include('layouts.partials.messages')
	</div>
    
    <article class="table-responsive">
	@if (Auth::user()->is_admin == 1)
    <h5 class="">
		Pour créer un "Employée", <a href="{{ route('employees.create') }}" style="padding:1px 10px;" class="btn btn-primary btn-sm float-right">Cliquez ici</a>
	</h5>
	@endif
	<table class="table text-left table-striped table-hover">
		<thead>
			<tr>
				<th scope="col" width="10%">
					Photo
				</th>
				<th scope="col" width="10%">
					Prénom(s) Nom
				</th>
				<th scope="col" width="15%">
					E-mail
				</th>
				<th scope="col" width="15%">
					Poste
				</th>
				<th scope="col" width="15%">
					Téléphone
				</th>
				<th scope="col" width="15%">
					Gestionnaire
				</th>
				<th scope="col" width="1%" colspan="3">
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($employees as $employee)
			<tr>
				<td scope="row">
					@if (isset($employee->photo))
						<img class="profile-pic rounded-circle mt-5" width="100px" src="{{ $employee->photo }}">
					@else
						<img class="profile-pic rounded-circle mt-5" width="100px" src="{{ asset('img/default-avatar.png') }}">
					@endif
				</td>			
				<td>
					{{ $employee->gender }} {{ $employee->lastname }} {{ $employee->name }}
				</td>
				<td>
					{{ $employee->work_email }}
				</td>
				<td>
					{{ $employee->job_title }}
				</td>
				<td>
					{{ $employee->mobile_phone }}
				</td>
				<td>
					@if (isset($employee->parent))
						{{ $employee->parent->lastname }} {{ $employee->parent->name }}
					@endif
				</td>
				<td>
					<a href="{{ route('employees.show', $employee->id) }}" class="btn btn-warning btn-sm" style="padding:1px;">Voir les détails</a>
				</td>
				<td>
					<a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info btn-sm" style="padding:1px;">Modifier</a>
				</td>
				@if (Auth::user()->is_admin == 1)
				<td>
					@if ($employee->active == 1)
					{!! Form::open(['method' => 'DELETE','route' => ['employees.destroy', $employee->id],'style'=>'display:inline']) !!} {!! Form::submit('Archiver', ['class' => 'btn btn-danger btn-sm', 'style' => 'padding:1px;']) !!} {!! Form::close()
					!!}
					@else
					{!! Form::open(['method' => 'POST','route' => ['employees.activate', $employee->id],'style'=>'display:inline']) !!} {!! Form::submit('Re-Activer', ['class' => 'btn btn-success btn-sm', 'style' => 'padding:1px;']) !!} {!! Form::close()
					!!}
					@endif
				</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
    
    </article>
	<div class="d-flex">
		@if (isset($employees))
		{!! $employees->links() !!}
		@endif
	</div>
</div>
</section>
@endsection