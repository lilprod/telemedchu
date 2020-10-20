@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-5 col-4">
        <h4 class="page-title">Docteur par Service</h4>
    </div>
    <div class="col-sm-7 col-8 text-right m-b-30">
        <div class="btn-group btn-group-sm">
            <!--<button class="btn btn-white">CSV</button>
            <button class="btn btn-white">PDF</button>-->
            <button class="btn btn-white" onClick="window.print()"><i class="fa fa-print fa-lg"></i> Imprimer</button>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title d-inline-block"> Docteur par Service </h4> 
		</div>
		<div class="card-body p-0">
			<div class="col-lg-6 offset-lg-3">
				<div class="form-group">
	              <label>Département</label>
                        <select class="select" name="department_id" id="department" required>
                            <option value = "0">--Sectionner département--</option>
							@foreach( $departments as $department)
								<option value="{{ $department->id }}">{{$department->name}}</option>
							@endforeach
                        </select>
	             </div>
             </div>

			<div class="table-responsive">
				<h5 align="center"><b>Nombre de médecin(s) :</b> <span id="total_records"></span></h5>
				<table class="table mb-0">
					<thead>
	                <tr>
		                 <th>Nom</th>
		                 <th>Prénoms</th>
		                 <th>Email</th>
		                 <th>Téléphone</th>
		                 <th>Adresse</th>
		                 <th>Action</th>
	                </tr>
	               </thead>
	               <tbody class="tbody">

	               </tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</div>

@endsection

@push('doctor_service')
<script>
		$(document).ready(function(){

		 fetch_doctor_data();

		 function fetch_doctor_data(query = '')
		 {
		  $.ajax({
		   url:"{{ route('doctor_search') }}",
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

		 $(document).on('change', '#department', function(){
		  var query = $(this).val();
		  console.log(query);
		  fetch_doctor_data(query);  
		 });
		});
</script>

@endpush