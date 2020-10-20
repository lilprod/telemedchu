@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4 class="page-title">Mes RDV en attente</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12 messages">
        @include('inc.messages')
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="example" class="table table-border table-striped custom-table datatable mb-0">
                <thead>
                    <tr>
                        <th style="display: none;">ID</th>
                        <th>Date</th>
                        <th>Nom du patient</th>
                        <th>Département</th>
                        <th>Heure</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td style="display: none;">{{$appointment->id}}</td>
                        <td>{{$appointment->date->format('d / m / Y ') }}</td>
                        <td><img width="28" height="28" src="{{ Storage::disk('public')->url('/app/public/public/cover_images/'.$appointment->profile_picture) }}" class="rounded-circle m-r-5" alt=""> {{$appointment->name}} {{$appointment->firstname}}</td>
                        <td>{{$appointment->department_name}}</td>
                        <td>{{$appointment->begin_time}} {{$appointment->end_time}}</td>
                        <td class="text-right">
                            <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#take_appointment" onclick="addData({{ $appointment->id}})">Prendre</a>
                            <!-- <a href="#" class="btn btn-outline-primary take-btn" id="take-btn" data-id="{{ $appointment->id }}">Prendre</a> 
                            <a href="#" class="btn btn-outline-warning take-btn archived" id="archived" data-id="{{ $appointment->id }}">Archiver</a>-->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="take_appointment" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <form action="" id="addForm" method="post">
        <div class="modal-content">
            <div class="modal-body text-center">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <img src="{{asset('/assets/assets/img/sent.png')}}" alt="" width="50" height="46">
                <h3>Etes-vous sûr(e) de vouloir prendre ce rendrez-vous?</h3>
                
            </div>
            <div class="m-b-20 text-center"> 
                <a href="#" class="btn btn-white" data-dismiss="modal">Non,Fermer</a>
                    <button type="submit" class="btn btn-danger">Oui, Prendre</button>
                </div>
        </div>
    </form>
    </div>
</div>
@endsection
@push('pendingapt')
<script src="{{asset('/assets/assets/js/jquery-3.2.1.min.js') }}"></script>
<script>
function addData(id)
     {
         var id = id;
         var url = '{{ route("take", ":id") }}';
         url = url.replace(':id', id);
         $("#addForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#addForm").submit();
     }
</script>
<script>

  $('.take-btn').click(function(){
    var id = $('#take-btn').attr('data-id')
    //console.log(id)
    $.ajax({
        url: '{!!URL::route('takeUp')!!}',
        type: 'POST',
        dataType: 'json',
        data : {
            _token : "{{ csrf_token() }}",
            id : id,
        },

        success:function(data){
            //$('.messages').html(data);
            $('.messages').html('')
            $('.messages').append('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span><b>Votre confirmation de rendez-vous a été envoyé au patient!</b></span></div>');
            console.log(data)
            }

        }) 
    
  });   

  $('.archived').click(function(){
    var id = $('#archived').attr('data-id')
    //console.log(id)
    $.ajax({
        url: '{!!URL::route('archivedapt')!!}',
        type: 'POST',
        dataType: 'json',
        data : {
            _token : "{{ csrf_token() }}",
            id : id,
        },

        success:function(data){
            $('.messages').html('')
            $('.messages').append('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span><b>Ce rendez-vous a été archvé!</b></span></div>');
        }
        }) 
    //console.log(data)
  })  
</script>


@endpush
