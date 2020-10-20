@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Ajouter Médicament</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		@include('inc.messages')
	</div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">

        <form method="POST" action="{{ route('medications.update', $medication->id) }}" enctype="multipart/form-data">
        	{{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nom du Médicament <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$medication->name}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Famille <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="medecine_family" value="{{$medication->medecine_family}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Forme <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="form" value="{{$medication->form}}">
                    </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label>Dosage <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="dosage" value="{{$medication->dosage}}">
                </div>
            </div>

            </div>

            <div class="form-group">
                <label>Présentation</label>
                <textarea class="form-control" rows="3" cols="30" name="presentation">{{$medication->presentation}}</textarea>
            </div>

           <div class="form-group">
                <label>Observation</label>
                <textarea class="form-control" rows="3" cols="30" name="observation">{{$medication->observation}}</textarea>
            </div>

            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Editer Médicament</button>
            </div>
        </form>
    </div>
</div>

@endsection