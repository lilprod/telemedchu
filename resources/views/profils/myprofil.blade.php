@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title">Mon profil</h4>
    </div>

    <div class="col-sm-5 col-6 text-right m-b-30">
        <a href="{{ route('editprofil') }}" class="btn btn-primary btn-rounded"><i class="fa fa-pencil"></i> Editer mon profil</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-view">
                <div class="profile-img-wrap">
                    <div class="profile-img">
                        <a href="#"><img class="avatar" src="{{ url('/storage/cover_images/'.auth()->user()->profile_picture) }}" alt=""></a>
                    </div>
                </div>
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-info-left">
                                <h3 class="user-name m-t-0 mb-0">{{ auth()->user()->name }} {{ auth()->user()->firstname }}</h3>
                                <small class="text-muted">{{ auth()->user()->user_profession }}</small>
                                <!--<div class="staff-id">Employee ID : DR-0001</div>-->
                                <div class="staff-msg"><a href="{{route('chat')}}" class="btn btn-primary">Ecrire message</a></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <ul class="personal-info">
                                <li>
                                    <span class="title">Téléphone:</span>
                                    <span class="text">{{ auth()->user()->phone_number }}</span>
                                </li>
                                <li>
                                    <span class="title">Email:</span>
                                    <span class="text">{{ auth()->user()->email }}</span>
                                </li>
                                <li>
                                    <span class="title">Date de naissance:</span>
                                    @if(auth()->user()->birth_date == '')
                                        <span class="text">  -  </span>
                                    @else 
                                        <span class="text"> {{auth()->user()->birth_date}} </span>
                                    @endif
                                </li>
                                <li>
                                    <span class="title">Adresse:</span>
                                    <span class="text">{{ auth()->user()->address }}</span>
                                </li>
                                <li>
                                    <span class="title">Genre:</span>
                                    @if(auth()->user()->gender == '')
                                        <span class="text">  -  </span>
                                    @elseif(auth()->user()->gender == 'M')
                                        <span class="text"> Masculin </span>
                                    @else
                                        <span class="text"> Féminin </span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</div>

<!--<div class="profile-tabs">
	<ul class="nav nav-tabs nav-tabs-bottom">
		<li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">A propos</a></li>
		<li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profil</a></li>
		<li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane show active" id="about-cont">
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h3 class="card-title">Education Informations</h3>
            <div class="experience-box">
                <ul class="experience-list">
                    <li>
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name">International College of Medical Science (UG)</a>
                                <div>MBBS</div>
                                <span class="time">2001 - 2003</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name">International College of Medical Science (PG)</a>
                                <div>MD - Obstetrics & Gynaecology</div>
                                <span class="time">1997 - 2001</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-box mb-0">
            <h3 class="card-title">Experience</h3>
            <div class="experience-box">
                <ul class="experience-list">
                    <li>
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name">Consultant Gynecologist</a>
                                <span class="time">Jan 2014 - Present (4 years 8 months)</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name">Consultant Gynecologist</a>
                                <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name">Consultant Gynecologist</a>
                                <span class="time">Jan 2004 - Present (5 years 2 months)</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
<div class="tab-pane" id="bottom-tab2">
	Tab content 2
</div>
<div class="tab-pane" id="bottom-tab3">
	Tab content 3
</div>
</div>
</div>-->

@endsection