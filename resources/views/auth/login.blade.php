<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Page de connexion du site web du Centre Hospitalier Universitaire CAMPUS de Lomé">
    
    <meta property="og:site_name" content="CHU CAMPUS +" />
    <meta property="og:url" content="https://telemedchucampus.tg/login" />
    <meta property="og:title" content="Page de connexion du site web du CHU CAMPUS de Lomé" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://telemedchucampus.tg/assets/images/index-hero2.jpg" />
    
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Page de connexion du site web du CHU CAMPUS de Lomé">
    <meta property="twitter:description" content="Page de connexion du site web du Centre Hospitalier Universitaire CAMPUS de Lomé">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Connexion | {{config('app.name', 'Telemedecine')}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/style.css') }}">
    
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
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form method="POST" action="{{ route('login') }}" class="form-signin">
                        @csrf
                        <div class="account-logo">
                            <a href="{{route('index')}}"><img src="{{asset('/assets/assets/img/logo-dark.png') }}" alt=""></a>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Mot de Passe') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group text-right">
                            <a href="{{ route('password.request') }}">Mot de Passe oublié?</a>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Connexion</button>
                        </div>

                        <div class="text-center register-link">
                            Vous n'avez pas de compte? <a href="{{ route('register') }}">S'inscrire</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('/assets/assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/popper.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('/assets/assets/js/app.js') }}"></script>
</body>


<!-- Mirrored from dreamguys.co.in/preclinic/template/login.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 19 Jun 2019 13:18:40 GMT -->
</html>