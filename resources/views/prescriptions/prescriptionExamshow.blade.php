@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-5 col-4">
            <h4 class="page-title">Ordonnance d'examen</h4>
        </div>
        <div class="col-sm-7 col-8 text-right m-b-30">
            <div class="btn-group btn-group-sm">
                <!--<button class="btn btn-white">CSV</button>-->
                
                @can('Doctor Permissions')
                <a href="{{ route('prescriptions.edit', $prescription->id) }}"> <button class="btn btn btn-white"><i class="fa fa-stethoscope"></i> Modifier Ordonnance</button></a>
                @endcan
                <a href="{{ route('prescriptionExam.invoice', $prescription->id) }}"> <button class="btn btn-white">Télécharger PDF</button></a>
                <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Imprimer</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="payslip-title">Ordonnance de : {{$prescription->type_title}}</h4>
                <div class="row">
                    <div class="col-sm-4 m-b-20">
                        <!--<img src="/assets/assets/img/logo-dark.png" class="inv-logo" alt="">-->
                        <ul class="list-unstyled mb-0">
                        	<li><strong>Centre Hospitalier Universitaire CAMPUS</strong></li>
                            <li>Bd. Gnassingbé Eyadéma, Lomé - Togo</li>
                            <li>Cité OUA - 03 BP 30284</li>
                            <li><strong>SERVICE DE {{$service}}</strong></li>
                        </ul>
                    </div>

                    <div class="col-sm-4 m-b-20">
                        	<h5 class="text-uppercase"><strong>Médecin</strong></h5>
                            <ul class="list-unstyled">
	                            <li class="mb-0"><strong>{{$prescription->doctor_name}} {{$prescription->doctor_firstname}}</strong></li>
	                            <li><span>{{$prescription->doctor_profession}}</span></li>
	                            <li>Email: {{$prescription->doctor_email}}</li>
	                            <li>Téléphone: {{$prescription->doctor_phone}}</li>
                        	</ul>
                    </div>

                    <div class="col-sm-4 m-b-20">
                        	<h5 class="text-uppercase"><strong>Patient</strong></h5>
                            <ul class="list-unstyled">
                            <li class="mb-0"><strong>{{$prescription->patient_name}} {{$prescription->patient_firstname}}</strong></li>
                            <li><span>{{$prescription->patient_profession}}</span></li>
                            <li>Email: {{$prescription->patient_email}}</li>
                            <li>Téléphone: {{$prescription->patient_phone}}</li>
                        </ul>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div>
                            <h4 class="m-b-10"><strong>Détails de la prescription</strong></h4>
                            <table class="table table-bordered">
                                <tbody>
                                	<tr>
                                        <td><strong>Prescription</strong> <span class="float-right">{{$prescription->prescription}}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
					        <a href="{{ url()->previous() }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-arrow-left"></i> Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
@endsection