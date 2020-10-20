@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title">Fiche patiente</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
        <div class="dropdown dropdown-action pull-right">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('consultation.create', $patient->id) }}"><i class="fa fa-plus m-r-5"></i> Consultation Générale</a>
                    <a class="dropdown-item" href="{{ URL::to('patients/'.$patient->id.'/edit') }}"><i class="fa fa-pencil m-r-5"></i> Editer</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient" onclick="deleteData({{ $patient->id}})"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            
            <div class="profile-view">
                <div class="profile-img-wrap">
                    <div class="profile-img">
                        <a href="#"><img class="avatar" src="/storage/cover_images/{{ $patient->profile_picture }}" alt=""></a>
                    </div>
                </div>
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-info-left">
                                <h3 class="user-name m-t-0 mb-0">{{$patient->name}} {{$patient->firstname}}</h3>
                                <small class="text-muted">{{$patient->profession}} </small>
                                <div class="staff-id">Patient ID : {{$patient->id}} </div>
                                <!--<div class="staff-msg"><a href="#" class="btn btn-primary">Send Message</a></div>-->
                            </div>
                        </div>
                        <div class="col-md-7">
                            <ul class="personal-info">
                                <li>
                                    <span class="title">Téléphone:</span>
                                    <span class="text"><a href="#">{{$patient->phone_number}} </a></span>
                                </li>
                                <li>
                                    <span class="title">Email:</span>
                                    <span class="text"><a href="#"><span class="__cf_email__" data-cfemail="513223382225383f3036233e273422113429303c213d347f323e3c">[email&#160;protected]</span></a></span>
                                </li>
                                <li>
                                    <span class="title">Date de naissance:</span>
                                    <span class="text">{{$patient->birth_date}} </span>
                                </li>
                                <li>
                                    <span class="title">Adresse:</span>
                                    <span class="text">{{$patient->address}} </span>
                                </li>
                                <li>
                                    <span class="title">Gendre:</span>
                                    @if ($patient->gender == 'M')
                                    <span class="text">Masculin</span>
                                    @else
                                    <span class="text">Féminin</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</div>

<div class="profile-tabs">
	<ul class="nav nav-tabs nav-tabs-bottom">
		<li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Examen clinique</a></li>
		<li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Historiques de consultations</a></li>
	</ul>

	<div class="tab-content">
			<div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                        	<!--<a class="pull-right" href="{{ route('biometry.create', $patient->id) }}"><i class="fa fa-plus m-r-5"></i></a>-->
                            <h3 class="card-title">Biométrie</h3>
                            <div class="experience-box">
                                <ul class="">
                                	@foreach ($biometries as $biometry)
                                	<div class="row">
                                		<div class="col-md-6">
                                			<li>
	                                            <div class="timeline-content">
	                                                <a href="#/" class="name">Taille</a>
	                                                <div>{{$biometry->height}} </div>
	                                                <!--<span class="time">2001 - 2003</span>-->
	                                            </div>
		                                    </li>
                                		</div>

                                		<div class="col-md-6">
                                			<li>
	                                            <div class="timeline-content">
	                                                <a href="#/" class="name">Poids (KG)</a>
	                                                <div>{{$biometry->weight}} </div>
	                                                <!--<span class="time">1997 - 2001</span>-->
	                                            </div>
	                                        </li>
                                		</div>

                                		<div class="col-md-6">
                                			<li>
	                                            <div class="timeline-content">
	                                                <a href="#/" class="name">Température</a>
	                                                <div>{{$biometry->temperature}} </div>
	                                                <!--<span class="time">1997 - 2001</span>-->
	                                            </div>
	                                        </li>
                                		</div>

                                		<div class="col-md-6">
                                			<li>
	                                            <div class="timeline-content">
	                                                <a href="#/" class="name">Pouls</a>
	                                                <div>{{$biometry->pulse}} </div>
	                                                <!--<span class="time">1997 - 2001</span>-->
	                                            </div>
	                                        </li>
                                		</div>
                                		<div class="col-md-6">
                                			<li>
	                                            <div class="timeline-content">
	                                                <a href="#/" class="name">Tension Artérielle</a>
	                                                <div>{{$biometry->blood_pressure}} </div>
	                                                <!--<span class="time">1997 - 2001</span>-->
	                                            </div>
	                                        </li>
                                		</div>

                                		
                                	</div>
                                	@endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-box mb-0">
	                            <!--<a class="pull-right" href="{{ route('antecedent.create', $patient->id) }}"><i class="fa fa-plus m-r-5"></i></a>-->
	                            <h3 class="card-title">Antécédents</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                	@foreach ($antecedents as $antecedent)
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Antécédents Médicaux</a>
                                                <span class="time">{{$antecedent->medical_history}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Antécédents familiaux</a>
                                                <span class="time">{{$antecedent->family_history}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Antécédents chirurgicaux</a>
                                                <span class="time">{{$antecedent->surgical_history}}</span>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Allergies</a>
                                                <span class="time text-danger">{{$antecedent->allergy}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
						</div>
						<div class="tab-pane" id="bottom-tab2">
							<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-border table-striped custom-table datatable mb-0">
                <thead>
                    <tr>
                        <th>Nom et Prénom(s) du Patient</th>
                        <th>Médecin Traitant</th>
                        <th>T.A</th>
                        <th>Pouls</th>
                        <th>Observations</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultations as $consultation)
                    <tr>
                        <td><img width="28" height="28" src="/assets/assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> {{$consultation->patient_name}} {{$consultation->patient_firstname}}</td>
                        <td><img width="28" height="28" src="/assets/assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> {{$consultation->doctor_name}} {{$consultation->doctor_firstname}}</td>
                        <td>{{$consultation->blood_pressure}}</td>
                        <td>{{$consultation->pulse}}</td>
                        <td>{{$consultation->observation}}</td>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i> Voir</a>
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
	</div>
	<!--<div class="tab-pane" id="bottom-tab3">
		Tab content 3
	</div>-->
</div>
</div>

@endsection