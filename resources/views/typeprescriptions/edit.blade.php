@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Type Ordonnance {{$typeprescription->title}}</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('typeprescriptions.update', $typeprescription->id) }}">
        	{{ csrf_field() }}
            {{ method_field('PATCH') }}
			<div class="form-group">
				<label>Libellé du Type Ordonnance </label>
				<input class="form-control" type="text" name="title" value="{{$typeprescription->title}}">
			</div>
            <div class="form-group">
                <label>Description</label>
                <textarea cols="30" rows="4" class="form-control" name="description">{{$typeprescription->description}}</textarea>
            </div>
            
            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary submit-btn">Editer Type Ordonnance</button>
            </div>
        </form>
    </div>
</div>

@endsection