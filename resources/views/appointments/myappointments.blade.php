@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title">Mes rendez-vous</h4>
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
		<!--<div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label"> Recherche</label>
                    <input type="text" class="form-control floating" name="search" id="search">
                </div>
            </div>
        </div>-->
		<div class="table-responsive">
			<table id="example" class="table table table-striped custom-table mb-0 datatable">
				<thead>
					<tr>
						<th style="display: none;">ID</th>
						<th>Date</th>
						<th>Département</th>
						<th>Medécin</th>
						<th>Heure</th>
						<th>Statut</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($appointments as $appointment)
					<tr>
						<td style="display: none;">{{$appointment->id}}</td>
						<td>{{$appointment->date->format('d / m / Y ') }}</td>
						<td>{{$appointment->department_name}}</td>
						<td>{{$appointment->doctor_name}} {{$appointment->doctor_firstname}}</td>
						<td>{{$appointment->begin_time}} - {{$appointment->end_time}}</td>
						<td>
							@if($appointment->status == 0)
								<span class="custom-badge status-red">Non accepté</span>
							@else
								<span class="custom-badge status-green">Accepté</span>
							@endif
						</td>
						<td class="text-right">
							<div class="dropdown dropdown-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{ URL::to('appointments/'.$appointment->id.'/edit') }}"><i class="fa fa-pencil m-r-5"></i> Editer</a>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment" onclick="deleteData({{ $appointment->id}})"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
								</div>
							</div>
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
                <a href="#" class="btn btn-white" data-dismiss="modal">Fermer</a>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
		</div>
    </form>
	</div>
</div>

@endsection

@push('appointment')
<script>

$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('appointment_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  console.log(query);
  if(query===''){
    $('tbody').html("");
    $('#total_records').text("");
  }else{
    fetch_customer_data(query);

  }
  
 });
});

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