@extends('layouts.app')

@section('content')

<div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Utilisateurs</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('users.create')}}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Ajouter Utilisateur</a>
                    </div>
                </div>
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">ID Utilisateur</label>
                            <input type="text" class="form-control floating">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">Nom Utilisateur</label>
                            <input type="text" class="form-control floating">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Rôle</label>
                            <select class="select floating">
                                <option>Selectionner Rôle</option>
                                <option>Nurse</option>
                                <option>Pharmacist</option>
                                <option>Laboratorist</option>
                                <option>Accountant</option>
                                <option>Receptionist</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="#" class="btn btn-success btn-block"> Recherche </a>
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
                                        <th style="min-width:200px;">Nom et Prénoms</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th style="min-width: 110px;">Date d'ajout</th>
                                        <th>Rôle</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach ($users as $user)
                                    <tr>
                                        <td>
											<img width="28" height="28" src="/assets/assets/img/user.jpg" class="rounded-circle" alt=""> <h2>{{ $user->name }} {{ $user->firstname }}</h2>
										</td>
                                        <td><a href="http://dreamguys.co.in/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5d3c313f34333c2e34303233342e1d38253c302d3138733e3230">[email&#160;protected]</a></td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                        <td>
                                            @if( ($user->roles()->pluck('name')->implode(' ') == ''))
                                            <span class="custom-badge status-grey">En attente</span>
                                            @else
                                            <span class="custom-badge status-green">{{  $user->roles()->pluck('name')->implode(' ') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee" onclick="deleteData({{ $user->id}})"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
            



         <div id="delete_employee" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<form action="" id="deleteForm" method="post">
					<div class="modal-content">
						<div class="modal-body text-center">
							{{ csrf_field() }}
	                    	{{ method_field('DELETE') }}
							<img src="/assets/assets/img/sent.png" alt="" width="50" height="46">
							<h3>Etes-vous sûr(e) de vouloir supprimer cet Utilisateur?</h3>
							
						</div>
						<div class="m-b-20 text-center"> 
							<a href="#" class="btn btn-white" data-dismiss="modal">Fermer</a>
							<button type="submit" class="btn btn-danger" onclick="formSubmit()">Supprimer</button>
						</div>
					</div>
				</form>
			</div>
		</div>

@endsection

@push('user')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("users.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush