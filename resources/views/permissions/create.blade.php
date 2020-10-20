@extends('layouts.app')

@section('title', '| Ajouter Permission')

@section('content')

<div class="row">
    <div class="col-lg-4 offset-lg-4">
        <h4 class="page-title">Ajouter Permission</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 offset-lg-4">

        {{ Form::open(array('url' => 'permissions')) }}
                <div class="form-group">
                {{ Form::label('name', 'Nom de la Permission') }}
                {{ Form::text('name', '', array('class' => 'form-control')) }}
                    </div><br>
                    @if(!$roles->isEmpty()) //Si aucun Rôle n'existe encore
                        <h4>Assigner Rôle(s) à la Permission  </h4>

                        @foreach ($roles as $role) 
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                        @endforeach
                    @endif
            
        <!-- /.box-body -->
          <div class="m-t-20 text-center">
            {{ Form::submit('Ajouter', array('class' => 'btn btn-primary submit-btn')) }}
          </div>
        {{ Form::close() }}

    </div>
</div>
@endsection