@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Médicaments</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('medications.create') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Ajouter médicament</a>
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
						<th>Nom du médicament</th>
						<th>Famille du médicament</th>
						<th>Forme</th>
						<th>Dosage</th>
						<th>Observations</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($medications as $medication)
					<tr>
						<td> {{$medication->name}} </td>
						<td> {{$medication->medecine_family}} </td>
						<td>{{$medication->form}}</td>
						<td>{{$medication->dosage}}</td>
						<td>{{$medication->observation}}</td>
						<td class="text-right">
							<div class="dropdown dropdown-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{ URL::to('medications/'.$medication->id.'/edit') }}"><i class="fa fa-pencil m-r-5"></i> Editer</a>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient" onclick="deleteData({{ $medication->id}})"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
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
					<img src="{{asset('/assets/assets/img/sent.png')}}" alt="" width="50" height="46">
					<h3>Etes-vous sûr(e) de vouloir supprimer ce médicament?</h3>
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

@push('medication')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("medications.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush