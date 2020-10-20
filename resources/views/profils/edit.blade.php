@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Modifier mon profil</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
    </div>
</div>

<form method="POST" action="{{ route('profils.store') }}">
    @csrf
    <div class="card-box">
        <h3 class="card-title">Informations d'idendité</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-img-wrap">
                    @if(auth()->user()->profile_picture == '')
                    <img class="inline-block" src="/assets/assets/img/user.jpg" alt="user">
                    @else
                    <img class="rounded-circle" src="{{url('/storage/cover_images/'.auth()->user()->profile_picture )}}" width="24" alt="">
                    @endif
                    <div class="fileupload btn">
                        <span class="btn-text">éditer</span>
                        <input class="upload" type="file" name="profile_picture">
                    </div>
                </div>
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Nom</label>
                                <input type="text" class="form-control floating" value="{{auth()->user()->name}}" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Prénom(s)</label>
                                <input type="text" class="form-control floating" value="{{auth()->user()->firstname}}" name="firstname">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Date de naissance</label>
                                <input class="form-control floating" type="date" value="{{auth()->user()->birth_date}}" name="birth_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Gendre</label>
                                <select class="select form-control floating" name="gender">
                                    <option value="M" {{  auth()->user()->gender == "M" ? 'selected' : '' }}>Masculin</option>
                                    <option value="F" {{  auth()->user()->gender == "F" ? 'selected' : '' }}>Féminin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-box">
        <h3 class="card-title">Informations de Contact</h3>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group form-focus">
                    <label class="focus-label">Email</label>
                    <input type="email" class="form-control floating" value="{{auth()->user()->email}}" name="email">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group form-focus">
                    <label class="focus-label">Numéro de Téléphone</label>
                    <input type="text" class="form-control floating" value="{{auth()->user()->phone_number}}" name="phone_number">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group form-focus">
                    <label class="focus-label">Adresse</label>
                    <input type="text" class="form-control floating" value="{{auth()->user()->address}}" name="address">
                </div>
            </div>
        </div>
    </div>
    <div class="text-center m-t-20">
        <button class="btn btn-primary submit-btn">Modifier</button>
    </div>
</form>
@endsection