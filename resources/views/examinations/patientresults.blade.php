@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Résultats d'examens soumis</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('checkpatient_prescription') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Faire interprétation</a>
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
						<th>Nom du patient</th>
						<th>Médecin traitant</th>
						<th>Prescriptions</th>
						<th>CAT</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($examinations as $examination)
					<tr>
						<td><img width="28" height="28" src="{{asset('/assets/assets/img/user.jpg') }}" class="rounded-circle m-r-5" alt=""> {{$examination->patient_name}} {{$examination->patient_firstname}}</td>
						<td><img width="28" height="28" src="{{asset('/assets/assets/img/user.jpg') }}" class="rounded-circle m-r-5" alt=""> {{$examination->doctor_name}} {{$examination->doctor_firstname}}</td>
						<td>{{$examination->prescription}}</td>
						<td>{{$examination->result}}</td>
						<td class="text-right">
							<a href="{{route('result.show', $examination->id)}}" class="btn btn-outline-primary take-btn" id="take-btn" data-id="{{ $examination->id }}">Voir</a>
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
					<img src="{{asset('/assets/assets/img/sent.png') }}" alt="" width="50" height="46">
					<h3>Etes-vous sûr(e) de vouloir supprimer cet Examen d'analyse?</h3>
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

@push('examination')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("examinations.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush