@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title">Changer mon mot de passe</h4>
    </div>

    <div class="col-sm-5 col-6 text-right m-b-30">
        <a href="#" class="btn btn-primary btn-rounded"><i class="fa fa-pencil"></i> Editer mon profil</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		@include('inc.messages')
	</div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('updatepassword') }}" class="form-signin" enctype="multipart/form-data">
        	@csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nouveau mot de passe <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password">
                    </div>
               
                    <div class="form-group">
                        <label>Confirmation du mot de passe <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>
                </div>
            </div>
            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary submit-btn">Modifier</button>
            </div>
        </form>
    </div>
</div>
@endsection