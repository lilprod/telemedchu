@extends('layouts.app')

@section('title', '| Ajouter Rôle')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Ajouter Rôle</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 offset-lg-2">

    	{{ Form::open(array('url' => 'roles')) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Nom du Rôle') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>

                    <label class="display-block">Assigner Permissions au Rôle</label>

                    <div class='form-group'>
                        @foreach ($permissions as $permission)
                            {{ Form::checkbox('permissions[]',  $permission->id ) }}
                            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                        @endforeach
                    </div>

              <div class="m-t-20 text-center">
                {{ Form::submit('Ajouter', array('class' => 'btn btn-primary submit-btn')) }}
              </div>
          {{ Form::close() }}


    </div>
</div>
@endsection