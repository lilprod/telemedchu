@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Ajouter Ordonnance</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		@include('inc.messages')
	</div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">

        <form method="POST" action="{{ route('prescriptions.store') }}" enctype="multipart/form-data">
        	@csrf

            <div class="row">
                <input class="form-control" type="hidden" name="doctor_id" value="{{$consultation->doctor_id}}">
                <input class="form-control" type="hidden" name="patient_id" value="{{$consultation->patient_id}}">
                <input class="form-control" type="hidden" name="consultation_id" value="{{$consultation->id}}">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Type d'ordonnance <span class="text-danger">*</span></label>
                        <select class="select" name="type_id" id="type">
                            @foreach ($typeprescriptions as $typeprescription)
                                <option value="{{$typeprescription->id}}">{{$typeprescription->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Date de l'ordonnance <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="date" id="date_prescription">
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Prescription</label>
                <textarea class="form-control" rows="3" cols="30" name="description"></textarea>
            </div>

            <table id="dynamic_field" class="table table-border table-striped">
              <thead>
                  <tr>
                      <th>Nom du Produit</th>
                      <th>Posologie</th>
                      <th><button class="btn bg-olive" title="Ajouter Produit" id="add" type="button"><i class="fa fa-plus"></i></button> </th>
                  </tr>
              </thead>

              <tbody>

              </tbody>

          </table>

            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Ajouter Ordonnance</button>
            </div>

        </form>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function(){  

    $('#type').on('change', function () {
      
      var type_id = $(this).val();
      
      if( type_id != 1){
        //console.log('hi');
        document.getElementById("dynamic_field").style.display = "none";
      }else {
        document.getElementById("dynamic_field").style.display = "table";
      }
    });

      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="form-group"><select class="select form-control" name="medication_id[]">@foreach ($medications as $medication)<option value="{{ $medication->id }}">{{ $medication->name }}</option>@endforeach</select></div></td><td><div class="form-group"><input class="form-control" type="text" name="prescription[]" required></div></td><td><button type="button" name="remove" id="'+i+'" class="btn bg-red btn_remove">X</button></td></tr>'); 
              $('.article').trigger('change');
      }); 

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();
           total();
      }); 

      var date = new Date();
      //alert(date.addDays(5));
      document.getElementById('date_prescription').valueAsDate = date;

    }); 
</script>
@endpush