@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Ajouter une actualité</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('timelines.store') }}" enctype="multipart/form-data">
        	{{csrf_field()}}
            <div class="form-group">
                <label>Titre de l'actualité</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>
            
            <div class="form-group">
                <label>Slug</label>
                <input class="form-control" type="text" name="slug" id="slug">
            </div>
            
            <div class="form-group">
                <label>Image de couverture l'actualité</label>
                <div>
                    <input class="form-control" type="file" name="cover_image">
                    <small class="form-text text-muted">Taille max. image: 50 MB. Format admis: jpg, gif, png.</small>
                </div>
            </div>
            

            <div class="form-group">
                <label>Texte de l'actualité</label>
                <textarea cols="30" rows="6" class="form-control" name="body" id="article-ckeditor"></textarea>
            </div>

            <div class="form-group">
                <label class="display-block">Statut</label>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="blog_active" value="1" checked>
					<label class="form-check-label" for="blog_active">
					Active
					</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="blog_inactive" value="0">
					<label class="form-check-label" for="blog_inactive">
					Inactive
					</label>
				</div>
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Publier actualité</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('slug')
<script>
  $('#title').change(function(e) {
    $.get('{{ route('pages.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>
@endpush