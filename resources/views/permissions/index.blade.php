@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Permissions</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{route('permissions.create')}}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Ajouter Permission</a>
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
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th style="min-width:200px;">Permissions</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($permissions as $permission)
                    <tr>
                        <td>
							 <h2>{{ $permission->name }}</h2>
						</td>
             
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ URL::to('permissions/'.$permission->id.'/edit') }}"><i class="fa fa-pencil m-r-5"></i> Editer</a>

                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee" onclick="deleteData({{ $permission->id}})"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
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

@endsection