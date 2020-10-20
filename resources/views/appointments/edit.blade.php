@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Editer rendez-vous</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
        	{{csrf_field()}}
            {{ method_field('PATCH') }}
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Département</label>
                        <select class="select" name="department_id" id="department" required>
                            <option value = "{{$appointment->department_id}}">{{$appointment->department_name}}</option>
							@foreach( $departments as $department)
								<option value="{{ $department->id }}">{{$department->name}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Médecin</label>
                        <select class="select" name="doctor_id" id="doctor">
                            <option value="{{$appointment->department_id}}">{{$appointment->doctor_name}} {{$appointment->doctor_firstname}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date </label>
                        <input type="date" class="form-control" name="date_apt" id="date" onchange="setCorrect(this,'date');" value="{{$appointment->date_apt}}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Heure</label>
                        <select class="select" name="begin_time" id="time" required>
                            <option value = "07:00" {{ ($appointment->begin_time === '07:00') ? 'selected' : '' }}>07:00</option>
                            <option value="07:30"{{ ($appointment->begin_time === '07:30') ? 'selected' : '' }}>07:30</option>
                            <option value="08:00" {{ ($appointment->begin_time === '08:00') ? 'selected' : '' }}>08:00</option>
                            <option value="08:30" {{ ($appointment->begin_time === '08:30') ? 'selected' : '' }}>08:30</option>
                            <option value = "09:00" {{ ($appointment->begin_time === '09:00') ? 'selected' : '' }}>09:00</option>
                            <option value="09:30" {{ ($appointment->begin_time === '09:30') ? 'selected' : '' }}>09:30</option>
                            <option value = "10:00" {{ ($appointment->begin_time === '10:00') ? 'selected' : '' }}>10:00</option>
                            <option value="10:30" {{ ($appointment->begin_time === '10:30') ? 'selected' : '' }}>10:30</option>
                            <option value = "11:00" {{ ($appointment->begin_time === '11:00') ? 'selected' : '' }}>11:00</option>
                            <option value="11:30" {{ ($appointment->begin_time === '11:30') ? 'selected' : '' }}>11:30</option>
                            <option value = "14:00" {{ ($appointment->begin_time === '14:00') ? 'selected' : '' }}>14:00</option>
                            <option value="14:30" {{ ($appointment->begin_time === '14:30') ? 'selected' : '' }}>14:30</option>
                            <option value = "15:00" {{ ($appointment->begin_time === '15:00') ? 'selected' : '' }}>15:00</option>
                            <option value="15:30" {{ ($appointment->begin_time === '15:30') ? 'selected' : '' }}>15:30</option>
                            <option value = "16:00" {{ ($appointment->begin_time === '16:00') ? 'selected' : '' }}>16:00</option>
                            <option value="16:30" {{ ($appointment->begin_time === '16:30') ? 'selected' : '' }}>16:30</option>
                        </select>
                    </div>
                </div>

                <!--<div class="col-md-3">
                    <div class="form-group">
                        <label>Heure</label>
                        <input type="time" name="begin_time" id="time" class="form-control" min="07:00" max="17:00" value="07:00" required>
                    </div>
                </div>-->

                <!--<div class="col-md-3">
                    <div class="form-group">
                        <label>Heure Fin</label>
                        <input type="time" name="end_time" class="form-control" min="07:00" max="17:30" value="07:00">
                    </div>
                </div>-->
            </div>
            

            <!--<div class="form-group">
                <label class="display-block">Statut</label>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="product_active" value="1" checked>
					<label class="form-check-label" for="product_active">
					Active
					</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="product_inactive" value="0">
					<label class="form-check-label" for="product_inactive">
					Inactive
					</label>
				</div>
            </div>-->

        	<div class="m-t-20 text-center">
                <button type="submit" id="submit" class="btn btn-primary submit-btn" disabled>Editer rendez-vous</button>
            </div>
        </form>
    </div>
</div>

@endsection
@push('add_apt')
<script type="text/javascript">
$(document).ready(function() {

	 $('#department').on('change', function () {

	 	var department_id = $(this).val();

	 	if(department_id){
	 		$.ajax({
			    url: '{!!URL::route('getDoctors')!!}',
			    type: 'GET',
			    data : { 'id' : department_id},
			    dataType: 'json',

			    success:function(data){
			    	//console.log('data');

			    	if(data) {
			    		$('#doctor').empty();

			    		$('#doctor').focus;

			    		$('#doctor').append('<option value = "">--Sectionner docteur--</option>');

			    		$.each(data, function(key, value){
			     		$('select[name = "doctor_id"]').append('<option value= "'+ value.id +'">' + value.name + ' '+ value.firstname + '</option>');
			           });
                        $('select[name = "doctor_id"]').refresh();

				    	} else {
				    		$('#doctor').empty();
				    	} 
	 				}
	 				});
			    }
			    else{
			    	$('#doctor').empty();
			    }
	   		
	 });

     $('#time').on('change', function () {
        var department = $('#department').val();
        var doctor = $('#doctor').val();
        var date = $('#date').val();
        var time = $('#time').val();
         if(time){
           $.ajax({
            url: '{!!URL::route('checkUp')!!}',
            type: 'POST',
            dataType: 'json',
            data : {
                _token : "{{ csrf_token() }}",
                department : department,
                doctor : doctor,
                date : date,
                time : time,
            },

            success:function(data){
                    //console.log(data);
                    console.log(data);
                    if(data == 1){
                       document.getElementById('submit').disabled = 'disabled';
                    }else{
                       document.getElementById('submit').disabled = ''; 
                    }
                    
                }
            }); 
         }
         
     });
});
</script>
<script language="javascript">
//function to convert enterd date to any format
function setCorrect(xObj,xTarget){
var today = new Date();  
    var date = new Date(xObj.value);
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var year = date.getFullYear();
    var monthd = today.getMonth() + 1;
    var dayd = today.getDate();
    var yeard = today.getFullYear();
    console.log(day+' '+ month +' '+year+'\n');
    console.log(dayd+' '+ monthd +' '+yeard);

    if(year<yeard){
            console.log("modif1");
            if (dayd<10) {
                document.getElementById(xTarget).value=yeard+"-"+monthd+"-0"+dayd;
            }else {
                document.getElementById(xTarget).value=yeard+"-"+monthd+"-"+dayd;
            }
    }else if(year=yeard) {
        if(month<monthd){
        console.log("modif2");
        if (dayd<10) {
            document.getElementById(xTarget).value=yeard+"-"+monthd+"-0"+dayd;
        }else {
            document.getElementById(xTarget).value=yeard+"-"+monthd+"-"+dayd;
        }
        }else if(month==monthd) {
            if(day<dayd){
                console.log("modif3");
                if (dayd<10) {
                    document.getElementById(xTarget).value=yeard+"-"+monthd+"-0"+dayd;
                }else {
                    document.getElementById(xTarget).value=yeard+"-"+monthd+"-"+dayd;
                }
            }
        }
    }
    /*if(day<dayd && month<monthd && year<yeard){

            console.log("success");
    }else {
        console.log("fucked");
    }*/
}
 </script>
@endpush