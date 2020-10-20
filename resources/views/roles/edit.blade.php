@extends('layouts.app')

@section('title', '| Editer Rôle')

@section('content')

<div class="row">
    <div class="col-lg-4 offset-lg-4">
        <h4 class="page-title">Editer Rôle {{$role->name}}</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 offset-lg-4">

    	{{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Nom du Role') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assigner Permissions au Rôle</b></h5>
                @foreach ($permissions as $permission)

                    {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                @endforeach
                <br>

              <div class="m-t-20 text-center">
                {{ Form::submit('Editer', array('class' => 'btn btn-primary submit-btn')) }}
              </div>
          {{ Form::close() }}


    </div>
</div>
@endsection