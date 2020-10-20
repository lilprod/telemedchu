<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/assets/img/favicon.ico') }}">
    <title>Dashboard | {{config('app.name', 'Telemedecine')}}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/plugins/light-gallery/css/lightgallery.min.css') }}">
    <!--<link href="{{ asset('assets') }}/fontawesome/css/all.min.css" rel="stylesheet">-->
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="{{route('dashboard')}}" class="logo">
                    <img src="{{asset('/assets/assets/img/logo.png')}}" width="35" height="35" alt=""> <span>TELEMED CHU +</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <!--<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> </a>-->

                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right"></span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="John Doe" src="{{asset('/assets/assets/img/user.jpg')}}" class="img-fluid">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                <p class="noti-time"><span class="notification-time"></span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="{{route('notifications.index')}}">Voir toutes les notifications</a>
                        </div>
                    </div>
                </li>
                <!--<li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
                </li>-->
                <!--<li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> </a>
                </li>-->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            @if(auth()->user()->profile_picture == '')
                            <img class="rounded-circle" src="{{asset('/assets/assets/img/user.jpg')}}" width="24" alt="">
                            @else
                            <img class="rounded-circle" src="{{ Storage::disk('public')->url('/app/public/public/cover_images/'.auth()->user()->profile_picture) }}" width="24" alt="">
                            @endif
                            <span class="status online"></span>
                        </span>
                        <span>@if(auth()->user()->role_user == 2)
                               Dr. {{ Auth::user()->name }}
                            @else
                                {{ Auth::user()->name }}
                            @endif
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('profils.index')}}">Mon profil</a>
                        <a class="dropdown-item" href="{{ route('editprofil') }}">Editer profil</a>
                        <a class="dropdown-item" href="{{ route('setting') }}">Paramètres</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Déconnexion') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('profils.index')}}">Mon profil</a>
                    <a class="dropdown-item" href="{{ route('editprofil') }}">Editer profil</a>
                    <a class="dropdown-item" href="{{ route('setting') }}">Paramètres</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>
                        <li class="active">
                            <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{route('index')}}"><i class="fa fa-home"></i> <span>Retour au site</span></a>
                        </li>
                        @can('Patient Permissions')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-calendar"></i> <span>Rendez-vous</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('appointments.create')}}">Prendre RDV</a></li>
                                <li><a href="{{route('myappointments')}}">Mes RDV en attente</a></li>
                                <li><a href="{{route('myarchivedapts')}}">Mes RDV archivés</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('checkpatient_pendingexamination')}}"><i class="fa fa-upload"></i> <span>Soumettre résultat</span></a>
                        </li>
                        
                        

                        <li>
                            <a href="{{route('myconsultations')}}"><i class="fa fa-stethoscope"></i> <span>Mes consultations</span></a>
                        </li>

                        <li>
                            <a href="{{route('myexaminations')}}"><i class="fa fa-heartbeat"></i> <span>Mes examens</span></a>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span>Mes ordonnances</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('myprescriptions')}}">Ordonnances pharmacie</a></li>
                                <li><a href="{{route('mybiologies')}}">Ordonnances d'examen</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('chat')}}"><i class="fa fa-comments"></i><span>Chat</span>
                            <!--<a href="https://telemedchucampus.tg/chatify"><i class="fa fa-comments"></i><span>Chat</span>-->
                            @if(auth()->user()->allChatMsg())
                                    <span class="badge-chat badge-pill bg-danger float-right" style="color: #fff; float: right; font-size: 13px">{{ auth()->user()->allChatMsg() }}</span>
                            @endif
                            </a>
                        </li>

                        <!--<li>
                            <a href="{{route('chat')}}"><i class="fa fa-comments"></i> <span>Chat</span> <span class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>-->

                        @endcan
                        @can('Doctor Permissions')
                        <li class="submenu">
                            <a href="#"><i class="fa fa-calendar"></i> <span>Mes rendez-vous</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('doctor-pendingappointments')}}">RDV en attente</a></li>
                                <li><a href="{{route('doctor-appointments')}}">RDV archivés</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-folder-o"></i> <span>Dossiers Patients</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <!--<li><a href="#">Patients en attente</a></li>-->
                                <li><a href="{{route('doctor-patients')}}">Dossiers Patients</a></li>
                                <li><a href="{{route('patients.create')}}">Ajouter Fiche Patiente</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-stethoscope"></i> <span>Consultations</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('doctor-consultations')}}">Consultations</a></li>
                                <li><a href="{{route('doctor-patients')}}">Faire consultation</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span>Ordonnances</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('doctor-prescriptions')}}">Ordonnances pharmacie</a></li>
                                <li><a href="{{route('doctor-examprescriptions')}}">Ordonnances d'examen</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('doctor-patientResults') }}"> <i class="fa fa-download"></i> <span>Résultats soumis</span>
                            @if(auth()->user()->sendExam())
                                    <span class="badge-chat badge-pill bg-danger float-right" style="color: #fff; float: right; font-size: 13px">{{ auth()->user()->sendExam() }}</span>
                            @endif
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-heartbeat"></i> <span>Examens</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('doctor-examinations')}}">Mes examens</a></li>
                                <li><a href="{{route('checkpatient_prescription')}}">Envoyer résultat</a></li>
                                
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('chat')}}"><i class="fa fa-comments"></i><span>Chat</span>
                            <!--<a href="https://telemedchucampus.tg/chatify"><i class="fa fa-comments"></i><span>Chat</span>-->
                            @if(auth()->user()->allChatMsg())
                                    <span class="badge-chat badge-pill bg-danger float-right" style="color: #fff; float: right; font-size: 13px">{{ auth()->user()->allChatMsg() }}</span>
                            @endif
                            </a>
                        </li>

                        <!--<li>
                            <a href="{{route('chat')}}"><i class="fa fa-comments"></i> <span>Chat</span> <span class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>-->

                        <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Mes articles</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('doctor-posts')}}">Mes articles</a></li>
                                <li><a href="{{route('posts.create')}}">Ajouter article</a></li>
                            </ul>
                        </li>

                        <!--<li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span>Types ordonnances</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('typeprescriptions.index')}}">Types ordonnances</a></li>
                                <li><a href="{{route('typeprescriptions.create')}}">Ajouter Type ordonnance</a></li>
                            </ul>
                        </li>-->

                        <li class="submenu">
                            <a href="#"><i class="fa fa-medkit"></i> <span>Médicaments</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('medications.index')}}">Médicaments</a></li>
                                <li><a href="{{route('medications.create')}}">Ajouter médicament</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-flag-o"></i> <span> Statistiques </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('stats-consultation')}}"> Consultations</a></li>
                                <li><a href="{{route('stats-examination')}}"> Examens</a></li>
                                <li><a href="#"> Ordonnances pharmacie</a></li>
                                <li><a href="#"> Ordonnances d'examen</a></li>
                            </ul>
                        </li>
                        @endcan

                        @can('Roles Administration & Permission')

                        <li class="submenu">
                            <a href="#"><i class="fa fa-user-md"></i> <span>Docteurs</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('doctors.index')}}">Docteurs</a></li>
                                <li><a href="{{route('doctors.create')}}">Ajouter docteur</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Actualités</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('timelines.index')}}">Actualités</a></li>
                                <li><a href="{{route('timelines.create')}}">Ajouter actualité</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-medkit"></i> <span>Médicaments</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('medications.index')}}">Médicaments</a></li>
                                <li><a href="{{route('medications.create')}}">Ajouter médicament</a></li>
                            </ul>
                        </li>
                       <!--<li>
                            <a href="{{route('chat')}}"><i class="fa fa-comments"></i> <span>Chat</span></a>
                        </li>-->
                        <li class="submenu">
                            <a href="#"><i class="fa fa-flag-o"></i> <span> Etats </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('doctor-department')}}"> Médecins par service </a></li>
                                <li><a href="{{route('patient-department')}}"> Patients par service</a></li>
                            </ul>
                        </li>

                        <!--<li>
                            <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Planning Médecin </span></a>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope"></i> <span> Boîte de reception</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="#">Envoyer email</a></li>
                                <li><a href="#">Messages reçus</a></li>
                                <li><a href="#">Voir message</a></li>
                            </ul>
                        </li>-->

                        <li>
                            <a href="{{route('consultations.index')}}"><i class="fa fa-stethoscope"></i> <span>Consutations</span> </a>
                        </li>

                        <li>
                            <a href="{{route('examinations.index')}}"><i class="fa fa-heartbeat"></i> <span>Examens</span></a>
                        </li>


                        <li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span>Ordonnances</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('prescriptions.index')}}">Ordonnances Pharmacie</a></li>
                                <li><a href="{{route('prescriptionbiologies')}}">Ordonnances d'examen</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-hospital-o"></i> <span>Départements</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('departments.index')}}">Départements</a></li>
                                <li><a href="{{route('departments.create')}}">Ajouter département</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span>Types ordonnances</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('typeprescriptions.index')}}">Types ordonnances</a></li>
                                <li><a href="{{route('typeprescriptions.create')}}">Ajouter Type ordonnance</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="{{route('posts.index')}}"><i class="fa fa-commenting-o"></i> <span> Articles</span></a>
                        </li>
                        

                        <li class="submenu">
                            <a href="#"><i class="fa fa-user"></i> <span> Comptes utilisateurs </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('users.index')}}">Comptes utilisateurs</a></li>
                                <li><a href="{{route('users.create')}}">Nouveau compte</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-key"></i> <span>Rôles</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('roles.index')}}">Rôles</a></li>
                                <li><a href="{{route('roles.create')}}">Ajouter rôle</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-unlock"></i> <span>Permissions</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                                <li><a href="{{route('permissions.create')}}">Ajouter permission</a></li>
                            </ul>
                        </li>
                        
                        <!--<li class="submenu">
                            <a href="#"><i class="fa fa-video-camera camera"></i> <span> Appels</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="#">Voice Call</a></li>
                                <li><a href="#">Video Call</a></li>
                                <li><a href="#">Incoming Call</a></li>
                            </ul>
                        </li>-->

                        
                        
                        @endcan
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                @yield('content')
            </div>
            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="{{route('chat')}}">Voir tous les messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('/assets/assets/js/jquery-3.2.1.min.js') }}"></script>
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
    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script src="{{asset('/assets/assets/js/popper.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{asset('/assets/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/select2.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/moment.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/app.js') }}"></script>
    <script>
        $.extend( true, $.fn.dataTable.defaults, {
            "order" : [[0, "desc"]],
            "language": {
            "search" : "Recherche:",
            "oPaginate":{
              "sFirst":"Premier",
              "sLast":"Dernier",
              "sNext":"Suivant",
              "sPrevious":"Précédent"
            },
            "sInfo" : "Afficher _START_ à _END_ des _TOTAL_ lignes",
            "sInfoEmpty" : "Afficher 0 à 0 des 0 données",
            "sInfoFiltered" : "Trié de _MAX_ lignes totales",
            "sEmptyTable" : "Pas de données disponible dans la table",
            "sLengthMenu" : "Afficher _MENU_ lignes",
            "sZeroRecords" : "Aucune donnée correspondante trouvée"
          }
        });

        $(document).ready(function () {
            $('#example').DataTable();
        });
        
    </script>
    <script>
      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-file').attr('src', e.target.result)
                }
            reader.readAsDataURL(input.files[0]);
            }
        }

      $('.file').change(function(){
          readURL(this)
      })
    </script>

    @stack('js')
    @stack('search')
    @stack('range_consultation')
    @stack('range_examination')
    @stack('doctor_service')
    @stack('patient_service')
    @stack('gallery')
    @stack('pendingapt')
    @stack('user')
    @stack('department')
    @stack('consultation')
    @stack('medication')
    @stack('presription')
    @stack('typepresription')
    @stack('doctor')
    @stack('patient')
    @stack('appointment')
    @stack('add_apt')
    @stack('post')
    @stack('examination')
    @stack('slug')

</body>
</html>