@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Editer consultation</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		@include('inc.messages')
	</div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">

        <form method="POST" action="{{ route('consultations.update', $consultation->id) }}" enctype="multipart/form-data">
        	{{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="row">
                <input class="form-control" type="hidden" name="patient_id" value="{{$consultation->patient_id}}">
                <input class="form-control" type="hidden" name="doctor_id" value="{{$consultation->doctor_id}}">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nom du Patient <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="firstname" value="{{$consultation->patient_name}} {{$consultation->patient_firstname}}" disabled/>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Motif de la consultation <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="reason" value="{{$consultation->reason}}">
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Taille <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="height" value="{{$consultation->height}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Température <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="temperature" value="{{$consultation->temperature}}">
                    </div>
                </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Poids <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="weight" value="{{$consultation->weight}}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Pression artérielle <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="blood_pressure" value="{{$consultation->blood_pressure}}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Pouls <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="pulse" value="{{$consultation->pulse}}">
                </div>
            </div>

            </div>

            <div class="form-group">
                <label>Histoire de la maladie</label>
                <textarea class="form-control" rows="6" cols="30" name="history">{{$consultation->history}}</textarea>
            </div>

            <div class="form-group">
                <label>Examen physique</label>
                <textarea class="form-control" rows="6" cols="30" name="physic_exam">{{$consultation->physic_exam}}</textarea>
            </div>

           <div class="form-group">
                <label>Hypothèse diagnotic</label>
                <textarea class="form-control" rows="6" cols="30" name="observation">{{$consultation->diagnostic}}</textarea>
            </div>

            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Editer consultation</button>
            </div>
        </form>
    </div>
</div>

@endsection