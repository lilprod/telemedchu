@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Editer Examen</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('examinations.update', $examination->id) }}" enctype="multipart/form-data">
        	{{csrf_field()}}
            {{ method_field('PATCH') }}
            <input class="form-control" type="hidden" name="doctor_id" value="{{$examination->doctor_id}}">
            <input class="form-control" type="hidden" name="patient_id" value="{{$examination->patient_id}}">
            <input class="form-control" type="hidden" name="prescription_id" value="{{$examination->prescription_id}}">
            <div class="form-group">
                <label>Date de l'analyse <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="date" id="date_examination" value="{{$examination->date}}">
            </div>
            
            <div class="form-group">
                <label>Fichier d'examen</label>
                <div>
                    <input class="form-control" type="file" name="examination_picture">
                    <img src="{{ url('/storage/examination_files/'.$examination->examination_picture) }}" class="img-thumbnail" width="100" /> 
                    <small class="form-text text-muted">Taille max. image: 50 MB. Format admis: jpg, gif, png.</small>
                </div>
            </div>
            
            <div class="form-group">
                <label>Conduite à tenir</label>
                <textarea cols="30" rows="6" class="form-control" name="result">{{$examination->result}}</textarea>
            </div>
 
            <div class="form-group">
                <label class="display-block">Status</label>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="blog_active" value="2" {{  $examination->status == 1 ? 'checked' : '' }}>
					<label class="form-check-label" for="blog_active">
					Active
					</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="blog_inactive" value="0" {{  $examination->status == 0 ? 'checked' : '' }}>
					<label class="form-check-label" for="blog_inactive">
					Inactive
					</label>
				</div>
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Soumettre Résultat</button>
            </div>
        </form>
    </div>
</div>

@endsection