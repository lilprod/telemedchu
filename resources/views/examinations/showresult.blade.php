@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Résultat d'examen</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('inc.messages')
        </div>
    </div>

    <div id="lightgallery" class="row">
        <div class=" col-lg-8 offset-lg-2 col-xl-3 col-lg-3 col-md-3 col-sm-3 m-b-20">
            <label>Fichier d'examen</label>
            @foreach($images as $image)
            <a href="{{ Storage::disk('public')->url('/app/public/public/examination_files/'.$image->examination_picture) }}">
                <img class="img-thumbnail" src="{{ Storage::disk('public')->url('/app/public/public/examination_files/'.$image->examination_picture) }}" alt="">
            </a>
            @endforeach
        </div>

    </div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('interpretation') }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="examination_id" value="{{$examination->id}}">
            <div class="form-group">
                <label>Conduite à tenir</label>
                <textarea cols="30" rows="6" class="form-control" name="result" id="article-ckeditor"></textarea>
            </div>
        

        <div class="m-t-20 text-center">
            <button type="submit" class="btn btn-primary submit-btn">Ajouter CAT</button>
        </div>
        </form>
    </div>
</div>
@endsection

@push('gallery')
<script src="{{asset('/assets/assets/plugins/light-gallery/js/lightgallery-all.min.js') }}"></script>
@endpush
