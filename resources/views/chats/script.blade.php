<script>

    //DECLARATION DES VARIABLES GLOBALES
    var currentUserId = 0
    var currentUser = null
    var filename = null
    var filesize = 0
    var img = null
    var authId = "{{ auth()->user()->id }}"
    var isTyping = 0;
    var currentUserOnline = 0;
    var messageDate = ''
    var messageDateOld = ''
    var messageDateLine = ''
    var extension = null
    var filetype = null
    var mediaPlaying = false
    var file = ''


    //L'UTILISATEUR ECRIT...
    $('#message-text').keydown(function(){
        isTyping = 1;
    })
    $('#message-text').keyup(function(){
        setTimeout(function(){
            isTyping = 0;
        }, 5000)
    })

    //ENVOI DU FICHIER FRAICHEMENT CHARGE
    $('#inputFile').change(function(e){
        filename = e.target.files[0].name;
        filesize = e.target.files[0].size;
        img = e.target.files[0]
        extension = filename.split('.').pop()
        filetype = getFileType()

        $('#message-text').val(filename)
        readURL(this)
    })

    //LECTURE DU FICHIER FRAICHEMENT CHARGE
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                //$('#preview').attr('src', e.target.result)
                file = e.target.result

            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    //DETERMINER LE TYPE DE FICHIER
    function getFileType(){
        var image = ['png', 'jpg', 'jpeg']
        var video = ['mp4', 'mkv', 'ts', '3gp']
        var audio = ['mp3', 'wav', 'jpeg']
        var doc = ['doc', 'docx', 'pdf']

        if(image.includes(extension)){
            return 'image'
        }
        if(video.includes(extension)){
            return 'video'
        }
        if(audio.includes(extension)){
            return 'audio'
        }
        if(doc.includes(extension)){
            return 'doc'
        }
    }

    //VERIFIER SI UN MEDIA EST EN LECTURE
    $('#chats').on('click', '.mediaplay', function(){
        mediaPlaying = true
    })

    $('#btnFile').click(function(){
        $('#inputFile').show().trigger('click').hide()
    })

    //ENVOI DU MESSAGE
    $('#btn-submit').click(function(){

        var message = $('#message-text').val()
        var type = 'text'
        var messageBox = null
        //console.log('file === '+file)

        if(file != ''){
            if(filetype == 'image'){
                messageBox = '<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content img-content"><div class="chat-img-group clearfix"><a class="chat-img-attach" href="'+file+'" target="_blank"><img width="182" height="137" alt="" src="'+file+'"><div class="chat-placeholder"><div class="chat-img-name">'+filename+'</div><div class="chat-file-desc">'+filesize/1024+'kb</div></div></a></div><span class="chat-time"></span></div></div></div></div>'
                type = 'image'
            }
            if(filetype == 'video'){
                messageBox = '<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content img-content"><div class="chat-img-group clearfix"><a class="chat-img-attach" href="'+file+'" target="_blank"><video width="182" height="137" alt="" src="'+file+'" controls><div class="chat-placeholder"><div class="chat-img-name">'+filename+'</div><div class="chat-file-desc">'+filesize/1024+'kb</div></div></a></div><span class="chat-time"></span></div></div></div></div>'
                type = 'video'
            }
            if(filetype == 'audio'){
                messageBox = '<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content img-content"><div class="chat-img-group clearfix"><a class="chat-img-attach" href="'+file+'" target="_blank"><audio width="182" height="137" alt="" src="'+file+'" controls><div class="chat-placeholder"><div class="chat-img-name">'+filename+'</div><div class="chat-file-desc">'+filesize/1024+'kb</div></div></a></div><span class="chat-time"></span></div></div></div></div>'
                type = 'audio'
            }
            if(filetype == 'doc'){
                messageBox = '<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p><a href="#">'+message+'</a></p><span class="chat-time">8:35 am</span><i class="fas fa-spinner fa-spin"></i></div></div></div></div>'
                type = 'doc'
            }
        }else{
            messageBox = '<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p>'+message+'</p><span class="chat-time">8:35 am</span><i class="fas fa-spinner fa-spin"></i></div></div></div></div>'
        }

        $('.chats').append(messageBox)

        document.getElementById('chats').scrollTop = document.getElementById('chats').scrollHeight;

        var formData = new FormData()
        formData.append("_token" , "{{ csrf_token() }}")
        formData.append("sender_id" , "{{ auth()->user()->id }}")
        formData.append("receiver_id" , currentUserId)
        formData.append("message" , message)
        formData.append("type" , type)
        formData.append("filesize" , 200000)
        formData.append("file" , $('#inputFile')[0].files[0])
    

        $.ajax({
            url: '{!!URL::route('sendMessage')!!}',
            type: 'POST',
            data : formData,
            contentType: false,
            processData: false,

            success:function(data){
                fetchMessage(currentUserId)
                $('#message-text').val('')
                file = ''
            }
        })

    })

    //MISE A JOUR DU CHAT
    function fetchMessage(userId){

        currentUserId = userId
        $.ajax({
            url: '{!!URL::route('fetchMessages')!!}',
            type: 'GET',
            dataType: 'json',
            data : {
                _token : "{{ csrf_token() }}",
                user_id : userId,
                is_typing: isTyping
            },

            success:function(data){
                var authId = "{{ auth()->user()->id }}"
                var done = ""

                $('.chats').html('')
                for(var i in data){
                    if(data[i].typing_sender == currentUserId){
                        $('#typing-text').show()
                    }else{
                        $('#typing-text').hide()
                    }
                    if(data[i].status == 1) done = "<i class='fa fa-check'></i>"
                    if(data[i].status == 2) done = "<i class='fa fa-check' style='color: #009efb'></i>"

                    //DATES DES CHATS
                    messageDate = data[i].message_date;
                    if(messageDateOld == messageDate){
                        messageDateLine = ''
                    }else{
                        messageDateLine = '<div class="chat-line"><span class="chat-date">'+messageDate+'</span></div>'
                    }
                    messageDateOld = messageDate

                    //VERIFICATION DU TYPE DE MESSAGE
                    if(data[i].type == 'image'){
                        if(data[i].sender_id == authId){
                            var messageBox = messageDateLine+'<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content img-content"><div class="chat-img-group clearfix"><a class="chat-img-attach" href="'+data[i].path+'" target="_blank"><img width="182" height="137" alt="" src="'+data[i].path+'"><div class="chat-placeholder"><div class="chat-img-name">'+data[i].message+'</div><div class="chat-file-desc">'+data[i].filesize/1024+'kb</div></div></a></div><span class="chat-time">'+data[i].time+'</span>'+done+'</div></div></div></div>'
                        }else{
                            var messageBox = messageDateLine+'<div class="chat chat-left"><div class="chat-avatar"><a href="profile.html" class="avatar"><img alt="Jennifer Robinson" src="'+data[i].profile_picture+'" class="img-fluid rounded-circle"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content img-content"><div class="chat-img-group clearfix"><a class="chat-img-attach" href="'+data[i].path+'" target="_blank"><img width="182" height="137" alt="" src="'+data[i].path+'"><div class="chat-img-name">'+data[i].message+'</div><div class="chat-file-desc">'+data[i].filesize/1024+'kb</div></a><span class="chat-time">'+data[i].time+'</span>'+done+'</div></div></div></div></div>'
                        }
                    }
                    else if(data[i].type == 'video'){
                        if(data[i].sender_id == authId){
                            var messageBox = messageDateLine+'<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content img-content"><div class="chat-img-group clearfix"><a class="chat-img-attach" href="'+data[i].path+'" target="_blank"><video class="mediaplay" controls width="182" height="137" alt="" src="'+data[i].path+'"><div class="chat-placeholder"><div class="chat-img-name">'+data[i].message+'</div><div class="chat-file-desc">'+data[i].filesize/1024+'kb</div></div></a></div><span class="chat-time">'+data[i].time+'</span>'+done+'</div></div></div></div>'
                        }else{
                            var messageBox = messageDateLine+'<div class="chat chat-left"><div class="chat-avatar"><a href="profile.html" class="avatar"><img alt="Jennifer Robinson" src="'+data[i].profile_picture+'" class="img-fluid rounded-circle"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content img-content"><div class="chat-img-group clearfix"><a class="chat-img-attach" href="'+data[i].path+'" target="_blank"><video class="mediaplay" controls width="182" height="137" alt="" src="'+data[i].path+'"><div class="chat-img-name">'+data[i].message+'</div><div class="chat-file-desc">'+data[i].filesize/1024+'kb</div></a><span class="chat-time">'+data[i].time+'</span>'+done+'</div></div></div></div></div>'
                        }
                    }
                    else if(data[i].type == 'audio'){
                        if(data[i].sender_id == authId){
                            var messageBox = messageDateLine+'<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content img-content"><div class="chat-img-group clearfix"><a class="chat-img-attach" href="'+data[i].path+'" target="_blank"><audio class="mediaplay" controls width="182" height="137" alt="" src="'+data[i].path+'"><div class="chat-placeholder"><div class="chat-img-name">'+data[i].message+'</div><div class="chat-file-desc">'+data[i].filesize/1024+'kb</div></div></a></div><span class="chat-time">'+data[i].time+'</span>'+done+'</div></div></div></div>'
                        }else{
                            var messageBox = messageDateLine+'<div class="chat chat-left"><div class="chat-avatar"><a href="profile.html" class="avatar"><img alt="Jennifer Robinson" src="'+data[i].profile_picture+'" class="img-fluid rounded-circle"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content img-content"><div class="chat-img-group clearfix"><a class="chat-img-attach" href="'+data[i].path+'" target="_blank"><audio class="mediaplay" controls width="182" height="137" alt="" src="'+data[i].path+'"><div class="chat-img-name">'+data[i].message+'</div><div class="chat-file-desc">'+data[i].filesize/1024+'kb</div></a><span class="chat-time">'+data[i].time+'</span>'+done+'</div></div></div></div></div>'
                        }
                    }
                    else if(data[i].type == 'doc'){
                        if(data[i].sender_id == authId){
                            var messageBox = messageDateLine+'<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p><a href="'+data[i].path+'">'+data[i].message+'</a></p><span class="chat-time">'+data[i].time+'</span>'+done+'</div></div></div></div>'
                        }else{
                            var messageBox = messageDateLine+'<div class="chat chat-left"><div class="chat-avatar"><a href="profile.html" class="avatar"><img alt="Jennifer Robinson" src="'+data[i].profile_picture+'" class="img-fluid rounded-circle"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p><a href="'+data[i].path+'">'+data[i].message+'</a></p><span class="chat-time">'+data[i].time+'</span></div></div></div></div>'
                        }
                    }
                    else{
                        if(data[i].sender_id == authId){
                            var messageBox = messageDateLine+'<div class="chat chat-right"><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p>'+data[i].message+'</p><span class="chat-time">'+data[i].time+'</span>'+done+'</div></div></div></div>'
                        }else{
                            var messageBox = messageDateLine+'<div class="chat chat-left"><div class="chat-avatar"><a href="profile.html" class="avatar"><img alt="Jennifer Robinson" src="'+data[i].profile_picture+'" class="img-fluid rounded-circle"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p>'+data[i].message+'</p><span class="chat-time">'+data[i].time+'</span></div></div></div></div>'
                        }
                    }

                    //BOUCLE SUR LES UTILISATEURS
                    for(var j in data[i].users_badge){

                        //MISE A JOUR DU NOMBRE DE MESSAGE NON LUS EN BADGE
                        $('.badge-pill').each(function(){
                            if($(this).attr('data-id') == data[i].users_badge[j].id){
                                if(data[i].users_badge[j].badge == 0){
                                    $(this).hide()
                                }else{
                                    $(this).show()
                                    $(this).text(data[i].users_badge[j].badge)
                                }
                            }
                        })

                        //MISE A JOUR DU STATUS EN LIGNE DES UTILISATEURS
                        $('.online').each(function(){
                            if($(this).attr('data-id') == data[i].users_badge[j].id){
                                if(data[i].users_badge[j].online == 1){
                                    $(this).show()
                                }else{
                                    $(this).hide()
                                }
                            }
                        })

                        //MISE A JOUR DE LA DERNIERNE ACTIVITE DE L'UTILISATEUR COURANT
                        if(currentUserId == data[i].users_badge[j].id ){
                            if(data[i].users_badge[j].online == 1){
                                $('.current-online').show();
                                $('.last-seen').text('En ligne')
                            }else{
                                $('.current-online').hide();
                                $('.last-seen').text('Vu '+data[i].users_badge[j].lastactivity)
                            }
                        }
                    }
                    //MISE A JOUR DU CHAT
                    $('.chats').append(messageBox)
                }
            }
        })
    }
    $('.users').click(function(){
        fetchMessage($(this).attr('data-id'))
        $('.chat-window').show()
        $.ajax({
            url: '{!!URL::route('seenMessage')!!}',
            type: 'POST',
            dataType: 'json',
            data : {
                _token : "{{ csrf_token() }}",
                sender_id : "{{ auth()->user()->id }}",
                receiver_id : currentUserId,
            },

            success:function(data){

                //MISE A JOUR DE L'UTILISATEUR COURANT
                currentUser = data
                $('#currentUserImg').attr('src', data.profile_picture)
                $('#currentUserName').text(data.name+' '+data.firstname)
                $('#currentUserProfession').text(data.user_profession)
                $('#currentUserEmail').text(data.email)
                $('#currentUserTel').text(data.phone_number)
                $('#current-username').text(data.name+' '+data.firstname)
                $('#current-usertitle').attr('title', data.name+' '+data.firstname)
                $('#current-userimg').attr('src', data.profile_picture)
            }
        })

    })

    //CHARGEMENT DU CHAT CHAQUE 8s
    setInterval(function(){
        if(document.querySelector('.mediaplay').currentTime != 0 && document.querySelector('.mediaplay').ended == false){
        }
       else{
            fetchMessage(currentUserId)
        }
    }, 8000)

</script>

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
                $.ajax({
                    url: '{!!URL::route('getNotifs')!!}',
                    type: 'GET',
                    dataType: 'json',

                    success:function(data){

                        $('.notification-list').html('')
                        var liStyle = "";
                        var bodyStyle = "";
                        for(var i in data){
                            if(data[i].status === 0){
                             liStyle = 'style = "background: #eee !important"'
                             bodyStyle = 'style = "font-weight: bold !important"'
                            }else{
                               liStyle = "";
                               bodyStyle = "";
                            }
                            $('.notification-list').append('<li class="notification-message" data-id='+data[i].id+' '+liStyle+'><a href="'+data[i].route+'"><div class="media"><span class="avatar"><img alt="John Doe" src="'+data[i].profile_picture+'" class="img-fluid"></span><div class="media-body"><p class="noti-details"><span class="noti-title" '+bodyStyle+'>'+data[i].body+'</span></p><p class="noti-time"><span class="notification-time">Il y a '+timeSince(new Date(data[i].created_at))+'</span></p></div></div></a></li>');
                            data[i].unread === 0 ? $('.badge').html('') : $('.badge').html(data[i].unread)
                    
                        }
                    }
            })
            }, 5000)

            

 $('.notification-list').delegate('.notification-message','click', function(){
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