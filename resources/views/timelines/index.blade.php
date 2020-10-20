@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 col-4">
        <h4 class="page-title">Actualités</h4>
    </div>
    <div class="col-sm-4 col-8 text-right m-b-30">
        <a class="btn btn-primary btn-rounded float-right" href="{{route('timelines.create')}}"><i class="fa fa-plus"></i> Ajouter actualité</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="row">
	@foreach($posts as $post)
	    <div class="col-sm-6 col-md-6 col-lg-4">
	            
	        <div class="blog grid-blog">
	        	<div class="dropdown dropdown-action pull-right">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ URL::to('timelines/'.$post->id.'/edit') }}"><i class="fa fa-pencil m-r-5"></i> Editer</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_post" onclick="deleteData({{ $post->id}})"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                    </div>
                </div>
	            <div class="blog-image">
	                <a href="{{route('posts.show',$post->id)}}"><img class="img-fluid" src="{{ Storage::disk('public')->url('/app/public/public/cover_images/'.$post->cover_image) }}" alt=""></a>
	            </div>
	            <div class="blog-content">
	                <h3 class="blog-title"><a href="{{route('timelines.show',$post->id)}}">{{$post->title}}</a></h3>
	                <p>{!!  str_limit($post->body, 100) !!} {{-- Limit teaser to 100 characters --}}</p>
	                <a href="{{route('timelines.show',$post->id)}}" class="read-more"><i class="fa fa-long-arrow-right"></i> Lire Plus</a>
	                <div class="blog-info clearfix">
	                    <div class="post-left">
	                        <ul>
	                            <li><a href="#."><i class="fa fa-calendar"></i> <span>{{$post->created_at}}</span></a></li>
	                        </ul>
	                    </div>
	                    <div class="post-right"><!--<a href="#."><i class="fa fa-heart-o"></i>21</a>--> <a href="{{route('timelines.show',$post->id)}}"><!--<i class="fa fa-eye"></i>8</a> <a href="#."><i class="fa fa-comment-o"></i>17--></a></div>
	                </div>
	            </div>
	        </div>
	    </div>
    @endforeach
</div>

<div id="delete_post" class="modal fade delete-modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
        <form action="" id="deleteForm" method="post">
		<div class="modal-content">
			<div class="modal-body text-center">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
				<img src="{{asset('/assets/assets/img/sent.png')}}" alt="" width="50" height="46">
				<h3>Etes-vous sûr(e) de vouloir supprimer cet Article?</h3>
				
			</div>
            <div class="m-b-20 text-center"> 
                <a href="#" class="btn btn-white" data-dismiss="modal">FERMER</a>
                    <button type="submit" class="btn btn-danger">SUPPRIMER</button>
                </div>
		</div>
    </form>
	</div>
</div>

@endsection

@push('post')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("timelines.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush