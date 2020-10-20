@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Dossiers de mes patients</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('patients.create') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Nouvelle fiche patiente</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-border table-striped custom-table datatable mb-0">
				<thead>
					<tr>
						<th>Nom et Prénom(s)</th>
						<th>Téléphone</th>
						<th>Email</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($patients as $patient)
					<tr>
						<td><img width="28" height="28" src="/assets/assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> {{$patient->name}} {{$patient->firstname}}</td>
						<td>{{$patient->phone_number}}</td>
						<td>{{$patient->email}}</td>
						<td class="text-right">
							<div class="dropdown dropdown-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{ route('patients.show', $patient->id) }}"><i class="fa fa-eye m-r-5"></i> Fiche Patient</a>
									<a class="dropdown-item" href="{{ route('antecedent.create', $patient->id) }}"><i class="fa fa-plus m-r-5"></i> Ajouter Antécédent</a>
									<a class="dropdown-item" href="{{ route('consultation.create', $patient->id) }}"><i class="fa fa-plus m-r-5"></i> Consutation Générale</a>
									<!--<a class="dropdown-item" href="{{ route('patients.show', $patient->id) }}"><i class="fa fa-plus m-r-5"></i> Consutation de Spécialiste</a>-->
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div id="delete_patient" class="modal fade delete-modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<form action="" id="deleteForm" method="post">
			<div class="modal-content">
				<div class="modal-body text-center">
					{{ csrf_field() }}
	                {{ method_field('DELETE') }}
					<img src="/assets/assets/img/sent.png" alt="" width="50" height="46">
					<h3>Etes-vous sûr(e) de vouloir supprimer ce Patient?</h3>
				</div>
				<div class="m-b-20 text-center"> 
					<a href="#" class="btn btn-white" data-dismiss="modal">FERMER</a>
					<button type="submit" class="btn btn-danger">SUPPRIMER</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
