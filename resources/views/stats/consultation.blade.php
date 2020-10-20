@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-5 col-4">
        <h4 class="page-title">Consultations</h4>
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
			<h4 class="card-title d-inline-block"> Etats de consulations sur une période </h4> 

		</div>
		<div class="card-body p-0">
			<div class="row">
		      <div class="col-md-6">
		       <div class="input-group input-daterange">
		           De <input type="date" name="from_date" id="from_date" class="form-control" />
		           <div class="input-group-addon">A</div>
		           <input type="date"  name="to_date" id="to_date" class="form-control" />
		       </div>
		      </div>

		      <div class="col-md-4">
		       <button type="button" name="filter" id="filter" class="btn btn-info">Filtrer</button>
		       <button type="button" name="refresh" id="refresh" class="btn btn-warning">Actualiser</button>
		      </div>
		     </div>
		    
		    <br>
			<div class="table-responsive">
				<h5 align="center"><b>Total de consultation(s) :</b> <span id="total_records"></span></h5>
				<table class="table mb-0">
					<thead>
	                <tr>
		                 <th>Nom</th>
		                 <th>Prénoms</th>
		                 <th>T.A</th>
						<th>Pouls</th>
						<th>Température</th>
						<th>Actions</th>
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

@push('range_consultation')
<script>
$(document).ready(function(){

 var date = new Date();
 document.getElementById('to_date').valueAsDate = date;

 var _token = $('input[name="_token"]').val();

 fetch_data();

 function fetch_data(from_date = '', to_date = '')
 {
  $.ajax({
   url:"{{ route('stats.fetch_consultation') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date, _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    $('#total_records').text(data.length);
    for(var count = 0; count < data.length; count++)
    {
     output += '<tr>';
     output += '<td>' + data[count].patient_name + '</td>';
     output += '<td>' + data[count].patient_firstname + '</td>';
     output += '<td>' + data[count].blood_pressure + '</td>';
     output += '<td>' + data[count].pulse + '</td>';
     output += '<td>' + data[count].temperature + '</td>';
     output += '<td>' + '<a href="" class="btn btn-primary"><i class="fa fa-eye"></i> Voir</a>' + '</td></tr>';
    }
    $('tbody').html(output);
   }
  })
 }


 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   fetch_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  fetch_data();
 });


});
</script>

@endpush