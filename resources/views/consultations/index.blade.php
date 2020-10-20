@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Mes consultations</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('doctor-patients') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-stethoscope"></i> Effectuer une consultation</a>
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
			<table id="examle" class="table table-border table-striped custom-table datatable mb-0">
				<thead>
					<tr>
						<th style="display: none;">ID</th>
						<th>Date</th>
						<th>Nom du patient</th>
						<th>T.A</th>
						<th>Pouls</th>
						<th>Température</th>
						<th>Hypothèse diagnostic</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($consultations as $consultation)
					<tr>
						<td style="display: none;">{{$consultation->id}}</td>
						<td>{{$consultation->date->format('d / m / Y ') }}</td>
						<td><img width="28" height="28" src="{{asset('/assets/assets/img/user.jpg')}}" class="rounded-circle m-r-5" alt=""> {{$consultation->patient_name}} {{$consultation->patient_firstname}}</td>
						<td>{{$consultation->blood_pressure}}</td>
						<td>{{$consultation->pulse}}</td>
						<td>{{$consultation->temperature}}</td>
						<td>{!!  str_limit($consultation->diagnostic, 20) !!}</td>
						<td class="text-right">
							<div class="dropdown dropdown-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{ route('prescription.create',$consultation->id) }}"><i class="fa fa-plus m-r-5"></i> Faire Ordonnance</a>
									<a class="dropdown-item" href="{{ route('consultations.show', $consultation->id) }}"><i class="fa fa-eye m-r-5"></i> Voir</a>
									<a class="dropdown-item" href="{{ URL::to('consultations/'.$consultation->id.'/edit') }}"><i class="fa fa-pencil m-r-5"></i> Editer</a>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient" onclick="deleteData({{ $consultation->id}})"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
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
					<h3>Etes-vous sûr(e) de vouloir supprimer cette Consultation?</h3>
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

@push('consultation')
<script>
function deleteData(id)
{
 var id = id;
 var url = '{{ route("consultations.destroy", ":id") }}';
 url = url.replace(':id', id);
 $("#deleteForm").attr('action', url);
}

function formSubmit()
{
 $("#deleteForm").submit();
}
</script>
@endpush