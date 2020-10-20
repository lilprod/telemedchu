@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Ajouter Type Ordonnance</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('typeprescriptions.store') }}">
        	@csrf
			<div class="form-group">
				<label>Nom du Type Ordonnance </label>
				<input class="form-control" type="text" name="title">
			</div>
            <div class="form-group">
                <label>Description</label>
                <textarea cols="30" rows="4" class="form-control" name="description"></textarea>
            </div>
          
            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary submit-btn">Creér Type Ordonnance</button>
            </div>
        </form>
    </div>
</div>

@endsection