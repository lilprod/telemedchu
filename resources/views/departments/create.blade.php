@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Ajouter Département</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('departments.store') }}">
        	@csrf
			<div class="form-group">
				<label>Nom du Départment </label>
				<input class="form-control" type="text" name="name">
			</div>
            <div class="form-group">
                <label>Description</label>
                <textarea cols="30" rows="4" class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label class="display-block">Statut du Département </label>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="product_active" value="1" checked>
					<label class="form-check-label" for="product_active">
					Actif
					</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="product_inactive" value="0">
					<label class="form-check-label" for="product_inactive">
					Inactif
					</label>
				</div>
            </div>
            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary submit-btn">Creér Département</button>
            </div>
        </form>
    </div>
</div>

@endsection