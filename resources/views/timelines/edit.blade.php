@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Editer actualité : {{$post->title}}</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('timelines.update', $post->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>Titre de l'actualité</label>
                <input class="form-control" type="text" name="title" value="{{$post->title}}" id="title">
            </div>
            
            <div class="form-group">
                <label>Slug</label>
                <input class="form-control" type="text" name="slug" value="{{$post->slug}}" id="slug">
            </div>
            
            <div class="form-group">
                <label>Image decouverture de l'actualité</label>
                <div>
                    <input class="form-control" type="file" name="cover_image">
                    <small class="form-text text-muted">Taille max. image: 50 MB. Format admis: jpg, gif, png.</small>
                </div>
            </div>
            

            <div class="form-group">
                <label>Texte de l'actualité</label>
                <textarea cols="30" rows="6" class="form-control" name="body" id="article-ckeditor">{{$post->body}}</textarea>
            </div>

            <div class="form-group">
                <label class="display-block">Statut</label>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="blog_active" value="1" {{  $post->status == 1 ? 'checked' : '' }}>
					<label class="form-check-label" for="blog_active">
					Active
					</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="blog_inactive" value="0" {{  $post->status == 0 ? 'checked' : '' }}>
					<label class="form-check-label" for="blog_inactive">
					Inactive
					</label>
				</div>
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Editer actualité</button>
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