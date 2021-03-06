<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Réinitialiser mot de passe | {{config('app.name', 'Telemedecine')}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/assets/css/style.css') }}">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form class="form-signin" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="account-logo">
                            <a href="{{ route('index') }}"><img src="{{asset('/assets/assets/img/logo-dark.png') }}" alt=""></a>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="email">{{ __('Adresse email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Envoyer lien de Réinitialisation</button>
                        </div>
                        <div class="text-center register-link">
                            <a href="{{route('login')}}">Revenir à la connexion</a>
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

</html>
