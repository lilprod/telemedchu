@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Soumettre résultat d'examen</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('result') }}" enctype="multipart/form-data">
        	{{csrf_field()}}
            <input class="form-control" type="hidden" name="doctor_id" value="{{$prescription->doctor_id}}">
            <input class="form-control" type="hidden" name="patient_id" value="{{$prescription->patient_id}}">
            <input class="form-control" type="hidden" name="prescription_id" value="{{$prescription->id}}">
            <div class="form-group">
                <label>Date de l'analyse <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="date" id="date_examination" value="{{$date_now}}">
            </div>

            <div class="form-group">
                <label>Fichier d'examen</label>
                <div>
                    <input class="form-control" type="file" name="examination_picture[]" multiple>
                    <small class="form-text text-muted">Taille max. image: 50 MB. Format admis: jpg, gif, png.</small>
                </div>
            </div>
            
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Soumettre résultat</button>
            </div>
        </form>
    </div>
</div>

@endsection