@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
		    <div class="card-body">
		        @if (session('status'))
		            <div class="alert alert-success" role="alert">
		                {{ session('status') }}
		            </div>
		        @endif
		        Vous êtes connecté!
		    </div>
		</div>
	</div>
</div>

@can('Patient Permissions')

<div class="row">

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="dash-widget">
            <span class="dash-widget-bg2"><i class="fa fa-calendar"></i></span>
            <div class="dash-widget-info text-right">
                <h3>{{$nb_aptpend}}</h3>
                <span class="widget-title2">RDV en attente <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="dash-widget">
			<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
			<div class="dash-widget-info text-right">
				<h3>{{$nb_consultation}}</h3>
				<span class="widget-title1">Consultations <i class="fa fa-check" aria-hidden="true"></i></span>
			</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="dash-widget">
            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3>{{$nb_exam}}</h3>
                <span class="widget-title4">Examens <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>
@endcan

@can('Doctor Permissions')

<div class="row">

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
			<span class="dash-widget-bg1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
			<div class="dash-widget-info text-right">
				<h3>{{$nbre_aptpend}}</h3>
				<span class="widget-title1">RDV en attente <i class="fa fa-check" aria-hidden="true"></i></span>
			</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
            <div class="dash-widget-info text-right">
                <h3>{{$nbre_patient}}</h3>
                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3>{{$nbre_consultation}}</h3>
                <span class="widget-title3">Consultations <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3>{{$nbre_exam}}</h3>
                <span class="widget-title4">Examens <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title d-inline-block">RDV de la journée</h4> <a href="{{route('doctor-pendingappointments')}}" class="btn btn-primary float-right"> Tous mes RDV</a>
		</div>
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table mb-0">
					<thead class="d-none">
						<tr>
							<th>Nom du patient</th>
							<th>Heure</th>
							<th class="text-right">Status</th>
						</tr>
					</thead>
					@if(count($appointments) > 0 )
					<tbody>
						@foreach ($appointments as $appointment)
						<tr>
							<td style="min-width: 200px;">
								<img width="28" height="28" src="{{ Storage::disk('public')->url('/app/public/public/cover_images/'.$appointment->profile_picture) }}" class="rounded-circle m-r-5" alt=""> {{$appointment->name}} {{$appointment->firstname}}
							</td>
							<td>
								<h5 class="time-title p-0">Heure</h5>
								<p>{{$appointment->begin_time}} - {{$appointment->end_time}}</p>
							</td>
							<td class="text-right">
								<a href="#" class="btn btn-outline-warning">Archiver RDV</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					@else
					<tbody>
						<tr>
							<td colspan="3" align="center">
								Pas RDV trouvé!
							</td>
						</tr>
					</tbody>
					@endif
				</table>
			</div>
		</div>
	</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title d-inline-block"><i class='fa fa-search'></i> Recherche de patients </h4> 
		</div>
		<div class="card-body p-0">
			<div class="col-lg-6 offset-lg-3">
				<div class="form-group">
	              <input type="text" name="search" id="search" class="form-control" placeholder="Recherche" />
	             </div>
             </div>

			<div class="table-responsive">
				<h5 align="center"><b>Nombre de patient(s) :</b> <span id="total_records"></span></h5>
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

@endcan
@endsection

@push('search')
<script>
		$(document).ready(function(){

		 fetch_customer_data();

		 function fetch_customer_data(query = '')
		 {
		  $.ajax({
		   url:"{{ route('patient_search.action') }}",
		   method:'GET',
		   data:{query:query},
		   dataType:'json',
		   success:function(data)
		   {
		    $('.tbody').html(data.table_data);
		    $('#total_records').text(data.total_data);
		   }
		  })
		 }

		 $(document).on('keyup', '#search', function(){
		  var query = $(this).val();
		  console.log(query);
		  /*if(query===''){
		    $('tbody').html("");
		    $('#total_records').text("");
		  }else{
		    fetch_customer_data(query);

		  }*/
		  fetch_customer_data(query);  
		 });
		});
</script>

@endpush