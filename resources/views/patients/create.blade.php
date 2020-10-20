@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Nouvelle fiche patiente</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		@include('inc.messages')
	</div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">

        <form method="POST" action="{{ route('patients.store') }}" enctype="multipart/form-data">
        	@csrf

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Prénom(s) <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="firstname">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Téléphone <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="phone_number">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Date de naissance <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="birth_date">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Lieu de naissance <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="place_birth">
                    </div>
                </div>
                

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Age <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="age">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Profession <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="profession">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nationalité <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " name="nationality">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ethnie <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " name="ethnic_group">
                    </div>
                </div>

                <div class="col-sm-6">
					<div class="form-group gender-select">
						<label class="gen-label">Genre: <span class="text-danger">*</span></label>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" name="gender" value="M" class="form-check-input">Masculin
							</label>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" name="gender" value="F" class="form-check-input">Feminin
							</label>
						</div>
					</div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Situation matrimoniale <span class="text-danger">*</span></label>
                        <select class="select" name="marital_status" required="">
                            <option value="Célibataire" >Célibataire</option>
                            <option value="Marié(e)">Marié(e)</option>
                            <option value="Veuf(ve)" >Veuf(ve)</option>
                            <option value="Divorcé(e)">Divorcé(e)</option>
                        </select>
                    </div>
                </div>
                

				<div class="col-sm-6">
					<div class="form-group">
						<label>Adresse <span class="text-danger">*</span></label>
						<input type="text" class="form-control " name="address">
					</div>
				</div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Groupe sanguin <span class="text-danger">*</span></label>
                        <select class="select" name="blood_group" required="">
                            <option value="">--Selectionner le Groupe sanguin--</option>
                            <option value="O">O</option>
                            <option value="A" >A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Rhésus <span class="text-danger">*</span></label>
                        <select class="select" name="rhesus" required="">
                                <option value="" >--Selectionner le Rhésus--</option>
                                <option value="+" >Positif</option>
                                <option value="-">Négatif</option>
                            </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Medécin traitant <span class="text-danger">*</span></label>
                        <select name="doctor_id" id="doctor" class="select">
                            <option value="">--Selectionner Médecin--</option>
                            @foreach( $doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{$doctor->name}} {{$doctor->firstname}}</option>
                            @endforeach
                        </select>
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
								<input type="file" class="form-control" name="profile_picture">
							</div>
						</div>
					</div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="display-block">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" checked>
                            <label class="form-check-label" for="doctor_active">
                            Actif
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0">
                            <label class="form-check-label" for="doctor_inactive">
                            Inactif
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Créer Patient</button>
            </div>
        </form>
    </div>
</div>

@endsection