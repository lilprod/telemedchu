@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Examen clinique</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		@include('inc.messages')
	</div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">

        <form method="POST" action="{{ route('consultations.store') }}" enctype="multipart/form-data">
        	@csrf

            <div class="row">
                <input class="form-control" type="hidden" name="patient_id" value="{{$patient->id}}">
                <input class="form-control" type="hidden" name="doctor_id" value="{{$patient->doctor_id}}">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nom et Prénom(s) du Patient</label>
                        <input class="form-control" type="text" value="{{$name}}" disabled="">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Motif de la consultation <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="reason">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Taille <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="height">
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
                    <label>Poids <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="weight">
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

            <div class="form-group">
                <label>Histoire de la maladie</label>
                <textarea class="form-control" rows="6" cols="30" name="history"></textarea>
            </div>

            <div class="form-group">
                <label>Examen physique</label>
                <textarea class="form-control" rows="6" cols="30" name="physic_exam"></textarea>
            </div>

           <div class="form-group">
                <label>Hypothèse diagnostic</label>
                <textarea class="form-control" rows="6" cols="30" name="diagnostic"></textarea>
            </div>

            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Ajouter Consultation</button>
            </div>
        </form>
    </div>
</div>

@endsection