<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Page d'inscription du site web du Centre Hospitalier Universitaire CAMPUS de Lomé">
    
    <meta property="og:site_name" content="CHU CAMPUS +" />
    <meta property="og:url" content="https://telemedchucampus.tg/login" />
    <meta property="og:title" content="Page d'inscription du site web du CHU CAMPUS de Lomé" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://telemedchucampus.tg/assets/images/index-hero2.jpg" />
    
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Page d'inscription du site web du CHU CAMPUS de Lomé">
    <meta property="twitter:description" content="Page d'inscription du site web du Centre Hospitalier Universitaire CAMPUS de Lomé">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/assets/img/favicon.ico') }}">
    <title>Inscription | {{config('app.name', 'Telemedecine')}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/btn.css') }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166262765-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-166262765-1');
    </script>
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background-image:url({{asset('/assets/images/index-hero1.png)') }}">
    <div class="main-wrapper">
        <div class="page-wrapper account-center" style="min-height: 657px;">
            <div class="content">
              <div class="row">
                <div class="col-lg-8 offset-lg-2">
                  <div class="card-box">
                    <form method="POST" action="{{ route('register') }}" class="form-signin">
                        @csrf
                        <div class="account-logo">
                            <a href="{{route('index')}}"><img src="{{asset('/assets/assets/img/logo-dark.png') }}" alt=""></a>
                        </div>

                        <div class="row"> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">{{ __('Nom') }} <span class="text-danger">*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstname">{{ __('Prénom(s)') }} <span class="text-danger">*</span></label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone_number">Téléphone <span class="text-danger">*</span></label>
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password">Mot de passe <span class="text-danger">*</span></label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Resaisir mot de passe') }} <span class="text-danger">*</span></label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                    

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="user_profession">Profession <span class="text-danger">*</span></label>
                                        <input id="user_profession" type="text" class="form-control @error('user_profession') is-invalid @enderror" name="user_profession" value="{{ old('user_profession') }}" required autocomplete="user_profession">

                                            @error('user_profession')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="address">Adresse <span class="text-danger">*</span></label>
                                        <!--<textarea cols="30" rows="4" id="address"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"></textarea>-->

                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date de naissance <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('birth_date') is-invalid @enderror"  value="{{ old('birth_date') }}" name="birth_date">
                                            @error('birth_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Lieu de naissance <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('place_birth') is-invalid @enderror"  value="{{ old('place_birth') }}" name="place_birth">
                                            @error('place_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nationalité <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nationality') is-invalid @enderror"  value="{{ old('nationality') }}" name="nationality">
                                        @error('nationality')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ethnie <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('ethnic_group') is-invalid @enderror"  value="{{ old('ethnic_group') }}" name="ethnic_group">
                                        @error('ethnic_group')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Groupe sanguin <span class="text-danger">*</span></label>
                                        <select class="select" name="blood_group" required="">
                                            <option value="">--Selectionner votre groupe sanguin--</option>
                                            <option value="O">O</option>
                                            <option value="A" >A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Rhésus <span class="text-danger">*</span></label>
                                        <select class="select" name="rhesus" required="">
                                                <option value="" >--Selectionner votre rhésus--</option>
                                                <option value="+" >Positif</option>
                                                <option value="-">Négatif</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Genre: <span class="text-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="M" class="form-check-input">Masculin
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="F" class="form-check-input">Feminin
                                            </label>
                                        </div>
                                    </div>
                                </div>

                        </div>

                        <div class="form-group checkbox">
                            <label>
                                <input type="checkbox" id="remember" OnClick="checkbox();"> J'ai lu et accepte les Termes & Conditions
                            </label>
                        </div>

                        <div class="form-group text-center">
                            <input class="btn btn-primary submit-btn" id="submit" type="submit" value="S'inscrire" disabled="disabled"/>
                        </div>

                        <div class="text-center login-link">
                            Avez-vous déjà un compte? <a href="{{ route('login') }}">Connexion</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>
    <script>
       function checkbox(){
              if(document.getElementById('remember').checked){
                  document.getElementById('submit').disabled = '';
              }
              else{
                  document.getElementById('submit').disabled = 'disabled';
              }
          }
    </script>
    <script type="text/javascript">
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
    <script src="{{asset('/assets/assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/popper.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/app.js') }}"></script>
    <script src="{{asset('/assets/assets/js/select2.min.js') }}"></script>
</body>

</html>