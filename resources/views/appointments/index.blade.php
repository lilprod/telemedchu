@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title">Rendez-vous</h4>
    </div>
    <div class="col-sm-7 col-7 text-right m-b-30">
        <a href="{{ route('appointments.create') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Prendre rendez-vous</a>
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
			<table class="table table-striped custom-table">
				<thead>
					<tr>
						<th>Date</th>
						<th>Num RDV</th>
						<th>Nom du patient</th>
						<th>Medécin</th>
						<th>Département</th>
						<th>Heure</th>
						<th>Statut</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($appointments as $appointment)
					<tr>
						<td>{{$appointment->date_apt}}</td>
						<td>{{ $appointment->id }}</td>
						<td><img width="28" height="28" src="{{asset('/assets/assets/img/user.jpg')}}" class="rounded-circle m-r-5" alt=""> {{$appointment->name}} {{$appointment->firstname}}</td>
						<td>{{$appointment->doctor_name}} {{$appointment->doctor_firstname}}</td>
						<td>{{$appointment->department_name}}</td>
						<td>{{$appointment->begin_heure}} {{$appointment->end_heure}}</td>
						<td><span class="custom-badge status-red">Inactive</span></td>
						<td class="text-right">
							<div class="dropdown dropdown-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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


<div id="delete_appointment" class="modal fade delete-modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
        <form action="" id="deleteForm" method="post">
		<div class="modal-content">
			<div class="modal-body text-center">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
				<img src="{{asset('/assets/assets/img/sent.png')}}" alt="" width="50" height="46">
				<h3>Etes-vous sûr(e) de vouloir supprimer ce Rendrez-vous?</h3>
				
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

@push('appointment')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("appointments.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush