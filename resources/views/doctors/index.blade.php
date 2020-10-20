@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Docteurs</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{route('doctors.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Ajouter Docteur</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="row doctor-grid">
	@foreach ($doctors as $doctor)
	    <div class="col-md-4 col-sm-4  col-lg-3">
	        <div class="profile-widget">
	            <div class="doctor-img">
	                <a class="avatar" href="#"><img alt="" src="{{ Storage::disk('public')->url('/app/public/public/cover_images/'.$doctor->profile_picture ) }}"></a>
	            </div>
	            <div class="dropdown profile-action">
	                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
	                <div class="dropdown-menu dropdown-menu-right">
	                    <a class="dropdown-item" href="{{ URL::to('doctors/'.$doctor->id.'/edit') }}"><i class="fa fa-pencil m-r-5"></i> Editer</a>
	                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor" onclick="deleteData({{ $doctor->id}})"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
	                </div>
	            </div>
	            <h4 class="doctor-name text-ellipsis"><a href="#">{{$doctor->name}} {{$doctor->firstname}}</a></h4>
	            <div class="doc-prof">{{$doctor->profession}}</div>
	            <div class="user-country">
	                <i class="fa fa-map-marker"></i> {{$doctor->address}}
	            </div>
	        </div>
	    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-md-12">
       {!! $doctors->links() !!}
    </div>
</div>

<div id="delete_doctor" class="modal fade delete-modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<form action="" id="deleteForm" method="post">
			<div class="modal-content">
				<div class="modal-body text-center">
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
					<img src="/assets/assets/img/sent.png" alt="" width="50" height="46">
					<h3>Etes-vous sûr(e) de vouloir supprimer ce Doctor?</h3>
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

@push('department')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("doctors.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush