@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title">Types d'ordonnances</h4>
    </div>
    <div class="col-sm-7 col-7 text-right m-b-30">
        <a href="{{ route('typeprescriptions.create') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Ajouter Type d'ordonnance</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

 <div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type d'ordonnance </th>
                        <th>Description </th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($typeprescriptions as $key=>$typeprescription)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$typeprescription->title}}</td>
                        <td>{{$typeprescription->description}}</td>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ URL::to('typeprescriptions/'.$typeprescription->id.'/edit') }}"><i class="fa fa-pencil m-r-5"></i> Editer</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department" onclick="deleteData({{ $typeprescription->id}})"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="delete_department" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
                <form action="" id="deleteForm" method="post">
				<div class="modal-content">
					<div class="modal-body text-center">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
						<img src="{{asset('/assets/assets/img/sent.png')}}" alt="" width="50" height="46">
						<h3>Etes-vous sûr(e) de vouloir supprimer ce Type d'ordonnance?</h3>
						
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

@push('typeprescription')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("typeprescriptions.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush