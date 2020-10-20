@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Notifications</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="activity">
                <div class="activity-box">
                    <ul class="activity-list">
                    	@foreach($notifications as $notification)
                        <li class = "notification-message" data-id="{{ $notification->id }}" @if(!$notification->status) style = "background: #eee !important" @endif>
                            <div class="activity-user">
                                <a href="profile.html" title="Lesley Grauer" data-toggle="tooltip" class="avatar">
                                    <img alt="Lesley Grauer" src="{{ url('/storage/cover_images/'.$notification->sender->profile_picture) }}" class="img-fluid rounded-circle">
                                </a>
                            </div>

                            <div class="activity-content" @if(!$notification->status) style = "background: #eee !important" @endif>
                                <div class="timeline-content">
                                    <a href="{{$notification->route}}" class="name"
                                    	@if(!$notification->status) style = "font-weight: bold !important" @endif
                                    	>{{$notification->body}}
                                    </a>
                                    <span class="time" data-id="{{$notification->created_at}}"> </span>
                                </div>
                            </div>
							<a class="activity-delete" href="#" title="Supprimer">&times;</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function(){  

          function timeSince(date) {

              var seconds = Math.floor((new Date() - date) / 1000);

              var interval = Math.floor(seconds / 31536000);

              if (interval > 1) {
                return interval + " années";
              }
              interval = Math.floor(seconds / 2592000);
              if (interval > 1) {
                return interval + " mois";
              }
              interval = Math.floor(seconds / 86400);
              if (interval > 1) {
                return interval + " jours";
              }
              interval = Math.floor(seconds / 3600);
              if (interval > 1) {
                return interval + " heures";
              }
              interval = Math.floor(seconds / 60);
              if (interval > 1) {
                return interval + " minutes";
              }
              return Math.floor(seconds) + " secondes";
            }
      
            setInterval(function(){
                $('.time').each(function(){
                var dat = $(this).attr('data-id');
                  $(this).html('');
                  $(this).append('Il y a '+timeSince(new Date(dat))+'');
                })
            }, 5000);

        	 $('.activity-list').delegate('.notification-message','click', function(){
                            $.ajax({
                            url: '{!!URL::route('updateStatus')!!}',
                            type: 'GET',
                            dataType: 'json',
                            data: {_token : "{{ csrf_token() }}", id : $(this).attr('data-id')},
                            success:function(){}
                            })
            })

})
</script>
@endpush