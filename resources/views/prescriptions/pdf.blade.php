<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "{{asset('/css/xhtml1-transitional.dtd') }}">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Ordonnance | {{config('app.name', 'Telemedecine')}}</title>
    <!--<link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/bootstrap.min.css') }}">
    <script src="{{asset('/assets/assets/js/bootstrap.min.js') }}"></script>-->
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
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
	                            <li class="mb-0"><strong>{{$prescription->doctor_name}} {{$prescription->doctor_firstname}}</strong></li>
	                            <li><span>{{$prescription->doctor_profession}}</span></li>
	                            <li>Email: {{$prescription->doctor_email}}</li>
	                            <li>Téléphone: {{$prescription->doctor_phone}}</li>
                        	</ul>
                        </div>
                    </div>

                    <div class="col-sm-4 m-b-20">
                        <div class="invoice-details">
                        	<h5 class="text-uppercase"><strong>Patient</strong></h5>
                            <ul class="list-unstyled">
                            <li class="mb-0"><strong>{{$prescription->patient_name}} {{$prescription->patient_firstname}}</strong></li>
                            <li><span>{{$prescription->patient_profession}}</span></li>
                            <li>Email: {{$prescription->patient_email}}</li>
                            <li>Téléphone: {{$prescription->patient_phone}}</li>
                        </ul>
                        </div>
                    </div>
                </div>

                <h4 class="payslip-title">Ordonnance de : {{$prescription->type_title}}</h4>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div>
                            <h4 class="m-b-10"><strong>Détails sur la prescription</strong></h4>
                            <table class="table table-bordered">
                            	<thead>
                            		<th>Nom du produit</th>
                            		<th>Dosage</th>
                            	</thead>
                                <tbody>
                                	@foreach($prescribeddrugs as $prescribeddrug )
	                                    <tr>
	                                        <td>
	                                        	<strong>{{$prescribeddrug->medication_name}}</strong> 
	                                        </td>
	                                        <td>
	                                        	{{$prescribeddrug->prescription}}
	                                        </td>
	                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  
    </body>
</html>