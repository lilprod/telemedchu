@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-5 col-4">
        <h4 class="page-title">Fiche de RDV</h4>
    </div>
    <div class="col-sm-7 col-8 text-right m-b-30">
        <div class="btn-group btn-group-sm">
            <!--<button class="btn btn-white">CSV</button>
            <button class="btn btn-white">PDF</button>-->
            <a href="{{ route('appointments.edit', $appointment->id) }}"> <button class="btn btn btn-primary"><i class="fa fa-calendar"></i> Modifier RDV</button></a>
            <button class="btn btn-white" onClick="window.print()"><i class="fa fa-print fa-lg"></i> Imprimer</button>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-12">
            <div class="card-box">
                
                <div class="row">
                    <div class="col-sm-4 m-b-20">
                        <!--<img src="/assets/assets/img/logo-dark.png" class="inv-logo" alt="">-->
                        <h5 class="text-uppercase"><strong>CHU-CAMPUS</strong></h5>
                        <ul class="list-unstyled mb-0">
                        	<li><strong>Centre Hospitalier Universitaire CAMPUS</strong></li>
                            <li>Bd. Gnassingbé Eyadéma, Lomé - Togo</li>
                            <li>Cité OUA - 03 BP 30284</li>
                            <li><strong>SERVICE DE {{$service}}</strong></li>
                        </ul>
                    </div>

                    <div class="col-sm-4 m-b-20">
                        	<h5 class="text-uppercase"><strong>Médecin</strong></h5>
                            <ul class="list-unstyled mb-0">
	                            <li class="mb-0"><strong>{{$appointment->doctor_name}} {{$appointment->doctor_firstname}}</strong></li>
	                            <li><span>{{$appointment->doctor_profession}}</span></li>
	                            <li>Email: {{$appointment->doctor_email}}</li>
	                            <li>Téléphone: {{$appointment->doctor_phone}}</li>
                        	</ul>
                    </div>

                    <div class="col-sm-4 m-b-20">
                        <h5 class="text-uppercase"><strong>Patient</strong></h5>
                        <ul class="list-unstyled">
                            <li class="mb-0"><strong>{{$appointment->name}} {{$appointment->firstname}}</strong></li>
                            <li><span>{{$appointment->profession}}</span></li>
                            <li>Email: {{$appointment->email}}</li>
                            <li>Téléphone: {{$appointment->phone}}</li>
                        </ul>
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
                <h4 class="payslip-title">Fiche de RDV</h4>
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div>
                            <h4 class="m-b-10"><strong>Détails du RDV</strong></h4>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Service : </strong> <span class="float-right">{{$appointment->department_name}}</span></td>
                                    </tr>

                                    <tr>
                                        <td><strong>Médecin : </strong> <span class="float-right">{{$appointment->doctor_name}} {{$appointment->doctor_firstname}}</span></td>
                                    </tr>

                                    <tr>
                                        <td><strong>Date : </strong> <span class="float-right">{{$appointment->date->format('d / m / Y ')}}</span></td>
                                    </tr>

                                    <tr>
                                        <td><strong>Heure : </strong> <span class="float-right">{{$appointment->begin_time}} - {{$appointment->end_time}}</span></td>
                                    </tr>

                                    <tr>
                                        <td><strong>Statut : </strong> 
                                            @if ( $appointment->status == 1)
                                                <span class="float-right">Accepté</span>
                                            @else 
                                                <span class="float-right">Non accepté</span> 
                                            @endif
                                        </td>
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
