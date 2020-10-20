@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Editer Utilisateur</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		@include('inc.messages')
	</div>
</div>


<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('users.update', $user->id) }}" class="form-signin" enctype="multipart/form-data">
        	{{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Prénoms <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="firstname" value="{{$user->firstname}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" value="{{$user->email}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Téléphone  <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="phone_number" value="{{$user->phone_number}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Mot de Passe <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Confirmation de Mot de Passe <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Adresse  <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="address" value="{{$user->address}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Assigner Rôle</label>
                        <select class="select" name="roles[]">
                        	@foreach ($roles as $role)
                            <option value="{{$role->id}}" {{ $user->roles()->pluck('id')->implode(' ') == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                            @endforeach
                        </select>
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

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="display-block">Status</label>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="status" id="employee_active" value="option1" checked>
							<label class="form-check-label" for="employee_active">
							Active
							</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="status" id="employee_inactive" value="option2">
							<label class="form-check-label" for="employee_inactive">
							Inactive
							</label>
						</div>
                    </div>
            	</div>

            </div>


            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary submit-btn">Editer Utilisateur</button>
            </div>
        </form>
    </div>
</div>

@endsection