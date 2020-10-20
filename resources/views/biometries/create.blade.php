@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Ajouter Biométrie</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('biometries.store') }}">
        	@csrf
			<div class="row">

				<input class="form-control" type="hidden" name="patient_id" value="{{$id}}">

        	<div class="col-sm-6">
                    <div class="form-group">
                        <label>Taille <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="height">
                    </div>
                </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Poids <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="weight">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Température <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="temperature">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Pression Artérielle <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="blood_pressure">
                </div>
            </div>

	            <div class="col-sm-6">
	                <div class="form-group">
	                    <label>Pouls <span class="text-danger">*</span></label>
	                    <input class="form-control" type="text" name="pulse">
	                </div>
	            </div>

			</div>

            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary submit-btn">Ajouter Biométrie</button>
            </div>

        </form>
    </div>
</div>

@endsection