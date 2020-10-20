@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title">Mes RDV archivés</h4>
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
			<table id="example" class="table table table-striped custom-table mb-0 datatable">
				<thead>
					<tr>
						<th style="display: none;">ID</th>
						<th>Date</th>
						<th>Medécin</th>
						<th>Département</th>
						<th>Heure</th>
						<th>Statut</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($appointments as $appointment)
					<tr>
						<td style="display: none;">{{$appointment->id}}</td>
						<td>{{$appointment->date->format('d / m / Y ') }}</td>
						<td>{{$appointment->doctor_name}} {{$appointment->doctor_firstname}}</td>
						<td>{{$appointment->department_name}}</td>
						<td>{{$appointment->begin_time}} - {{$appointment->end_time}}</td>
						<td>
							<span class="custom-badge status-grey">Archivé</span>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
