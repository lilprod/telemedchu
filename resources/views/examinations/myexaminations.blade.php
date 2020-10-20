@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Mes examens médicaux</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('checkpatient_pendingexamination') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-upload"></i> Soumettre résultat d'examen</a>
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
			<table id="example" class="table table-border table-striped custom-table datatable mb-0">
				<thead>
					<tr>
						<th style="display: none;">ID</th>
						<th>Date</th>
						<th>Médecin Traitant</th>
						<th>Prescriptions</th>
						<th>CAT</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($examinations as $examination)
					<tr>
						<td style="display: none;"> {{$examination->id}}</td>
						<td> {{$examination->date->format('d / m / Y ')}}</td>
						<td><img width="28" height="28" src="{{asset('/assets/assets/img/user.jpg') }}" class="rounded-circle m-r-5" alt=""> {{$examination->doctor_name}} {{$examination->doctor_firstname}}</td>
						<td>{{$examination->prescription}}</td>
						<td>{!!  str_limit($examination->result, 20) !!}</td>
						<td class="text-right">
							<div class="dropdown dropdown-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{ route('examinations.show',$examination->id) }}"><i class="fa fa-eye m-r-5"></i> Voir</a>
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
@endsection

