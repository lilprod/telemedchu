@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Ajouter Docteur</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		@include('inc.messages')
	</div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
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

                <!--<div class="col-sm-6">
                    <div class="form-group">
                        <label>Mot de Passe <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Confirmation de Mot de Passe </label>
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>
                </div>-->

				<div class="col-sm-6">
                    <div class="form-group">
                        <label>Date de naissance <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="birth_date">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Département <span class="text-danger">*</span></label>
                        <select class="select" name="department_id">
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Profession <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="profession">
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
						<label>Adresse <span class="text-danger">*</span></label>
						<input type="text" class="form-control " name="address">
					</div>
				</div>

                

                <div class="col-sm-6">
					<div class="form-group">
						<label>Avatar</label>
						<div class="profile-upload">
							<div class="upload-img">
								<img alt="" src="/assets/assets/img/user.jpg">
							</div>
							<div class="upload-input">
								<input type="file" class="form-control" name="profile_picture">
							</div>
						</div>
					</div>
                </div>
            </div>

			<div class="form-group">
                <label>Petite Biographie</label>
                <textarea class="form-control" rows="3" cols="30" name="biography"></textarea>
            </div>

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
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Créer Docteur</button>
            </div>
        </form>
    </div>
</div>

@endsection