@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-5 col-4">
            <h4 class="page-title">Consultation</h4>
        </div>
        <div class="col-sm-7 col-8 text-right m-b-30">
            <div class="btn-group btn-group-sm">
                <!--<button class="btn btn-white">CSV</button>
                <button class="btn btn-white">PDF</button>-->
                @can('Doctor Permissions')
                <a href="{{ route('consultations.edit', $consultation->id) }}"> <button class="btn btn btn-primary"><i class="fa fa-stethoscope"></i> Modifier Consultation</button></a>
                @endcan
                <button class="btn btn-white" onClick="window.print()"><i class="fa fa-print fa-lg"></i> Imprimer</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="payslip-title">Consultation du : {{$consultation->created_at}}</h4>
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
                        <div class="invoice-details">
                        	<h5 class="text-uppercase"><strong>Médecin</strong></h5>
                            <ul class="list-unstyled">
	                            <li class="mb-0"><strong>{{$consultation->doctor_name}} {{$consultation->doctor_firstname}}</strong></li>
	                            <li><span>{{$consultation->doctor_profession}}</span></li>
	                            <li>Email: {{$consultation->doctor_email}}</li>
	                            <li>Téléphone: {{$consultation->doctor_phone}}</li>
                        	</ul>
                        </div>
                    </div>

                    <div class="col-sm-4 m-b-20">
                        <div class="invoice-details">
                        	<h5 class="text-uppercase"><strong>Patient</strong></h5>
                            <ul class="list-unstyled">
                            <li class="mb-0"><strong>{{$consultation->patient_name}} {{$consultation->patient_firstname}}</strong></li>
                            <li><span>{{$consultation->patient_profession}}</span></li>
                            <li>Email: {{$consultation->patient_email}}</li>
                            <li>Téléphone: {{$consultation->patient_phone}}</li>
                        </ul>
                        </div>
                    </div>

                    <!--<div class="col-sm-4 m-b-20">
                        <div class="invoice-details">
                            <h3 class="text-uppercase">Payslip #49029</h3>
                            <ul class="list-unstyled">
                                <li>Salary Month: <span>July, 2018</span></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
                <!--<div class="row">
                    <div class="col-lg-12 m-b-20">
                        <ul class="list-unstyled">
                            <li>
                                <h5 class="mb-0"><strong>Albina Simonis</strong></h5></li>
                            <li><span>Nurse</span></li>
                            <li>Employee ID: NS-0001</li>
                            <li>Joining Date: 7 May 2015</li>
                        </ul>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div>
                            <h4 class="m-b-10"><strong>Détails sur la consultation</strong></h4>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Motif de la consultation</strong> <span class="float-right">{{$consultation->reason}}</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Température</strong> <span class="float-right">{{$consultation->temperature}}</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Taille</strong> <span class="float-right">{{$consultation->height}}</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Poids</strong> <span class="float-right">{{$consultation->weight}}</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pouls</strong> <span class="float-right">{{$consultation->pulse}}</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Hyspothèse diognostic</strong> : <span class="float-right"><p>{{$consultation->diagnostic}}</p></span></td>
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