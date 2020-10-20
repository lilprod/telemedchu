@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title">Examens en attente de résultat</h4>
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
            <table id="example" class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th style="display: none;">ID</th>
                        <th>Date</th>
                        <th>Type d'ordonnance </th>
                        <th>Medécin</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($prescriptions as $prescription)
                    <tr>
                        <td style="display: none;">{{$prescription->id}}</td>
                        <td>{{$prescription->date->format('d / m / Y ')}}</td>
                        <td>{{$prescription->type_title}}</td>
                        <td><img width="28" height="28" src="{{asset('/assets/assets/img/user.jpg') }}" class="rounded-circle m-r-5" alt=""> {{$prescription->doctor_name}} {{$prescription->doctor_firstname}}</td>
                        <td class="text-right">
                            <a  class="btn btn-outline-primary take-btn" href="{{route('result.create', $prescription->id)}}"><i class="fa fa-upload m-r-5"></i> Soumettre résultat</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection