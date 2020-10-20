@extends('layouts.app')

@section('title', '| Editer Permission')

@section('content')

<div class="row">
    <div class="col-lg-4 offset-lg-4">
        <h4 class="page-title">Editer {{$permission->name}}</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 offset-lg-4">

        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
                <div class="form-group">
                    {{ Form::label('name', 'Nom de la Permission') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

        <!-- /.box-body -->
          <div class="m-t-20 text-center">
            {{ Form::submit('Ajouter', array('class' => 'btn btn-primary submit-btn')) }}
          </div>
        {{ Form::close() }}

    </div>
</div>
@endsection