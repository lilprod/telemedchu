@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Editer Fiche patiente de {{$patient->name}}</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		@include('inc.messages')
	</div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('patients.update', $patient->id) }}" enctype="multipart/form-data">
        	{{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$patient->name}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Prénom(s) <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="firstname" value="{{$patient->firstname}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" value="{{$patient->email}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Téléphone <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="phone_number" value="{{$patient->phone_number}}">
                    </div>
                </div>

				<div class="col-sm-6">
                    <div class="form-group">
                        <label>Date de naissance <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="birth_date" value="{{$patient->birth_date}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Lieu de naissance <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="place_birth" value="{{$patient->place_birth}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Age <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="age" value="{{$patient->age}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Profession <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="profession" value="{{$patient->profession}}">
                    </div>
                </div>

                <div class="col-sm-6">
					<div class="form-group gender-select">
						<label class="gen-label">Genre: <span class="text-danger">*</span></label>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" name="gender" value="M" class="form-check-input" {{  $patient->gender == "M" ? 'checked' : '' }} >Masculin
							</label>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" name="gender" value="F" class="form-check-input" {{  $patient->gender == "F" ? 'checked' : '' }} >Feminin
							</label>
						</div>
					</div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Situation matrimoniale <span class="text-danger">*</span></label>
                        <select class="select" name="marital_status" required="">
                            <option value="Célibataire" {{ ($patient->marital_status === 'Célibataire') ? 'selected' : '' }}>Célibataire</option>
                            <option value="Marié(e)" {{ ($patient->marital_status === 'Marié(e)') ? 'selected' : '' }}>Marié(e)</option>
                            <option value="Veuf(ve)" {{ ($patient->marital_status === 'Veuf(ve)') ? 'selected' : '' }}>Veuf(ve)</option>
                            <option value="Divorcé(e)" {{ ($patient->marital_status === 'Divorcé(e)') ? 'selected' : '' }}>Divorcé(e)</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nationalité <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " value="{{$patient->nationality}}" name="nationality">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ethnie <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " name="ethnic_group" value="{{$patient->ethnic_group}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Groupe sanguin <span class="text-danger">*</span></label>
                        <select class="select" name="blood_group">
                            <option value="">--Selectionner le Groupe--</option>
                            <option value="O" {{ ($patient->blood_group === 'O') ? 'selected' : '' }}>O</option>
                            <option value="A" {{ ($patient->blood_group === 'A') ? 'selected' : '' }}>A</option>
                            <option value="B" {{ ($patient->blood_group === 'B') ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ ($patient->blood_group === 'AB') ? 'selected' : '' }}>AB</option>
                        </select>
                    </div>
                </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Rhésus <span class="text-danger">*</span></label>
                    <select class="select" name="rhesus">
                            <option value="" >--Selectionner le Rhésus--</option>
                            <option value="+" {{ ($patient->rhesus === '+') ? 'selected' : '' }}>Positif</option>
                            <option value="-" {{ ($patient->rhesus === '-') ? 'selected' : '' }}>Négatif</option>
                        </select>
                </div>
            </div>

				<div class="col-sm-6">
					<div class="form-group">
						<label>Adresse <span class="text-danger">*</span></label>
						<input type="text" class="form-control " name="address" value="{{$patient->address}}">
					</div>
				</div>

                

                <div class="col-sm-6">
					<div class="form-group">
						<label>Avatar</label>
						<div class="profile-upload">
							<div class="upload-img">
								<img alt="" src="{{asset('/assets/assets/img/user.jpg')}}">
							</div>
							<div class="upload-input">
								<input type="file" class="form-control" name="profile_picture" value="{{$patient->profile_picture}}">
							</div>
						</div>
					</div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Medécin Traitant <span class="text-danger">*</span></label>
                        <select name="doctor_id" id="doctor" class="select">
                            <option value="">--Selectionner Médecin--</option>
                            @foreach( $doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ ($patient->doctor_id === $doctor->id) ? 'selected' : '' }}>{{$doctor->name}} {{$doctor->firstname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="display-block">Status</label>
        				<div class="form-check form-check-inline">
        					<input class="form-check-input" type="radio" name="status" id="patient_active" value="1" {{  $patient->status == 1 ? 'checked' : '' }} >
        					<label class="form-check-label" for="patient_active">
        					Actif
        					</label>
        				</div>
        				<div class="form-check form-check-inline">
        					<input class="form-check-input" type="radio" name="status" id="patient_inactive" value="0" {{  $patient->status == 0 ? 'checked' : '' }} >
        					<label class="form-check-label" for="patient_inactive">
        					Inactif
        					</label>
        				</div>
                    </div>
                </div>

                </div>

            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Editer Patient</button>
            </div>
        </form>
    </div>
</div>

@endsection