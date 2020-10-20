@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Ajouter Antécédent</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('antecedents.store') }}">
        	@csrf
            <div class="row">
                <input class="form-control" type="hidden" name="patient_id" value="{{$id}}">
                   
			<div class="col-sm-6">
                    <div class="form-group">
                        <label>Antécédents médicaux <span class="text-danger">*</span></label>
                        <textarea class="form-control"  name="medical_history"></textarea> 
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Antécédents chirurgicaux et obsétricaux<span class="text-danger">*</span></label>
                        <textarea class="form-control"  name="surgical_history"></textarea> 
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Antécédents familiaux <span class="text-danger">*</span></label>
                        <textarea class="form-control"  name="family_history"></textarea> 
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Allergies et intolérances <span class="text-danger">*</span></label>
                        <textarea class="form-control"  name="allergy"></textarea> 
                    </div>
                </div>
            </div>

            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary submit-btn">Creér Antécédent</button>
            </div>
        </form>
    </div>
</div>

@endsection