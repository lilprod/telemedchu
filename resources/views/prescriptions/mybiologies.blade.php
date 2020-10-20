@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title">Mes ordonnances d'examen</h4>
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
            <table id="example" class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th style="display: none;">ID</th>
                        <th>Date</th>
                        <th>Type d'ordonnance </th>
                        <th>Medécin traitant</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($prescriptions as $prescription)
                    <tr>
                        <td style="display: none;">{{$prescription->id}}</td>
                        <td>{{$prescription->date->format('d / m / Y ') }}</td>
                        <td>{{$prescription->type_title}}</td>
                        <td><img width="28" height="28" src="{{asset('/assets/assets/img/user.jpg') }}" class="rounded-circle m-r-5" alt=""> {{$prescription->doctor_name}} {{$prescription->doctor_firstname}}</td>
                        <td class="text-right">
                            <a href="{{ route('prescriptionexam.show', $prescription->id) }}" class="btn btn-outline-primary"><i class="fa fa-eye m-r-5"></i>Voir ordonnance</a>
                            <!--<div class="dropdown dropdown-action">
                                
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('prescriptionexam.show', $prescription->id) }}"><i class="fa fa-eye m-r-5"></i> Voir ordonnance</a>
                                    <!--<a class="dropdown-item" href="{{ URL::to('prescriptions/'.$prescription->id.'/edit') }}"><i class="fa fa-pencil m-r-5"></i> Editer</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department" onclick="deleteData({{ $prescription->id}})"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                </div>
                            </div>-->
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('prescription')

@endpush