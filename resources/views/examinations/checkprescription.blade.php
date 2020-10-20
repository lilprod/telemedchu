@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title">Mes ordonnances d'examen</h4>
    </div>
    <div class="col-sm-7 col-7 text-right m-b-30">
        <a href="{{route('doctor-consultations')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Nouvelle ordonnance</a>
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
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th style="display: none;">ID</th>
                        <th>Date</th>
                        <th>Type d'ordonnance </th>
                        <th>Nom du patient</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($prescriptions as $prescription)
                    <tr>
                        <td style="display: none;">{{$prescription->id}}</td>
                        <td>{{$prescription->created_at->format('d / m / Y ')}}</td>
                        <td>{{$prescription->type_title}}</td>
                        <td>{{$prescription->patient_name}} {{$prescription->patient_firstname}}</td>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('examination.create', $prescription->id)}}"><i class="fa fa-download m-r-5"></i> Soumettre Résultat</a>
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