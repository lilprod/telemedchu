<!DOCTYPE html>
<html lang="fr">
<head>
<title> Accueil | {{config('app.name', 'Telemedecine')}}</title>
@include('feed::links')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Accueil du site web du Centre Hospitalier Universitaire CAMPUS de Lomé">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:site_name" content="CHU CAMPUS +" />
<meta property="og:url" content="https://telemedchucampus.tg" />
<meta property="og:title" content="Accueil du site web du CHU CAMPUS de Lomé" />
<meta property="og:type" content="website" />
<meta property="og:image" content="https://telemedchucampus.tg/assets/images/index-hero2.jpg" />

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="Accueil du site web du CHU CAMPUS de Lomé">
<meta property="twitter:description" content="Site web du Centre Hospitalier Universitaire CAMPUS de Lomé">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/assets/img/favicon.ico') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/bootstrap4/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('/assets/styles/bootstrap4/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{asset('/assets/styles/bootstrap4/jquery.timepicker.css') }}">
<link href="{{asset('/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/btn.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166262765-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166262765-1');
</script>

</head>
<body>

<div class="super_container">

	<!-- Menu -->

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<!--<form action="#" class="menu_search_form">
				<input type="text" class="menu_search_input" placeholder="Search" required="required">
				<button class="menu_search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>-->
			<ul>
				@guest
				<li class="menu_item"><a href="{{ route('index') }}">Accueil</a></li>
				<li class="menu_item"><a href="{{ route('about') }}">A propos</a></li>
				<li class="menu_item"><a href="{{ route('services') }}">Services</a></li>
				<li class="menu_item"><a href="{{ route('blog.index') }}">Santé</a></li>
				<li class="menu_item"><a href="{{ route('timeline') }}">Actualités</a></li>
				<li class="menu_item"><a href="{{ route('contact') }}">Contact</a></li>
				<li class="menu_item"><a href="{{ route('login') }}">Connexion</a></li>
                <li class="menu_item">
                  @if (Route::has('register'))
                      <a  href="{{ route('register') }}">Inscription</a>
                  @endif
                </li>
                @else
                <li class="menu_item"><a href="{{ route('index') }}">Accueil</a></li>
				<!--<li class="menu_item"><a href="{{ route('about') }}">A Propos</a></li>-->
				<li class="menu_item"><a href="{{ route('services') }}">Services</a></li>
				<li class="menu_item"><a href="{{ route('blog.index') }}">Santé</a></li>
				<li class="menu_item"><a href="{{ route('timeline') }}">Actualités</a></li>
				<li class="menu_item"><a href="{{ route('contact') }}">Contact</a></li>
				<li class="nav-item dropdown">
	                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                    {{ Auth::user()->name }} <span class="caret"></span>
	                </a>

	                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                    <a class="dropdown-item" href="{{ route('logout') }}"
	                       onclick="event.preventDefault();
	                                     document.getElementById('logout-form').submit();">
	                        {{ __('Déconnexion') }}
	                    </a>

	                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                        @csrf
	                    </form>
	                </div>
	            </li>
	            <li class="menu_item"><a class="btn btn-primary" type="button" href="{{ route('dashboard') }}">Mon espace</a></li>
	            @endguest
			</ul>
		</div>
		<div class="menu_social">
			<ul>
				<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<!--<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>-->
			</ul>
		</div>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url({{asset('/assets/images/medecin-noir1.jpg)') }}"></div>

		<!-- Header -->

		<header class="header" id="header">
			<div>
				<div class="header_top">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="header_top_content d-flex flex-row align-items-center justify-content-start">
									<div class="logo">
										<a href="#">CHU CAMPUS<span> +</span></a>	
									</div>
									<div class="header_top_extra d-flex flex-row align-items-center justify-content-start ml-auto">
										<div class="header_top_nav">
											<ul class="d-flex flex-row align-items-center justify-content-start">
												<li><a href="#">Assistance</a></li>
												<li><a href="#">Urgence</a></li>
												<!--<li><a href="#" data-toggle="modal" data-target="#modalAppointment">Rendez-vous</a></li>-->
											</ul>
										</div>
										<div class="header_top_phone">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<span>(+228) 22 25 47 39 | 22 25 77 68 | 22 25 97 09</span>
										</div>
									</div>
									<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="header_nav" id="header_nav_pin">
					<div class="header_nav_inner">
						<div class="header_nav_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
											<nav class="main_nav">
												<ul class="d-flex flex-row align-items-center justify-content-start">
													@guest
													<li class="active"><a href="{{ route('index') }}">Accueil</a></li>
													<li><a href="{{ route('about') }}">A propos</a></li>
													<li><a href="{{ route('services') }}">Services</a></li>
													<li><a href="{{ route('blog.index') }}">Santé</a></li>
													<li><a href="{{ route('timeline') }}">Actualités</a></li>
													<li><a href="{{ route('contact') }}">Contact</a></li>
													<li><a class="" href="{{ route('login') }}">Connexion</a></li>
									                <li>
								                      @if (Route::has('register'))
								                          <a class="" href="{{ route('register') }}">Inscription</a>
								                      @endif
									                </li>
									                @else
									                <li class="active"><a href="{{ route('index') }}">Accueil</a></li>
													<!--<li><a href="{{ route('about') }}">A propos</a></li>-->
													<li><a href="{{ route('services') }}">Services</a></li>
													<li><a href="{{ route('blog.index') }}">Santé</a></li>
													<li><a href="{{ route('timeline') }}">Actualités</a></li>
													<li><a href="{{ route('contact') }}">Contact</a></li>
													
								                    <li class="nav-item dropdown">
						                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						                                    {{ Auth::user()->name }} <span class="caret"></span>
						                                </a>

						                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						                                    <a class="dropdown-item" href="{{ route('logout') }}"
						                                       onclick="event.preventDefault();
						                                                     document.getElementById('logout-form').submit();">
						                                        {{ __('Déconnexion') }}
						                                    </a>

						                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						                                        @csrf
						                                    </form>
						                                </div>
						                            </li>

						                            <li><a class="btn btn-primary" type="button" href="{{ route('dashboard') }}">Mon espace</a></li>
									                @endguest

												</ul>

											</nav>
											<!--<div class="search_content d-flex flex-row align-items-center justify-content-end ml-auto">
												<form action="#" id="search_container_form" class="search_container_form">
													<input type="text" class="search_container_input" placeholder="Search" required="required">
													<button class="search_container_button"><i class="fa fa-search" aria-hidden="true"></i></button>
												</form>
											</div>-->

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</header>

		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">Services médicaux de qualité</div>
							<div class="home_text">Parce que votre bien-être fait notre satisfaction.</div>
							<div class="button home_button"><a href="{{route('services')}}"><span>voir Plus</span><span>voir Plus</span></a></div>
						</div>
					</div>

					
				</div>
			</div>
		</div>


	</div>

	

	<!-- Info Boxes -->
	
	<!-- About -->
	<div class="info" style="padding-top: 0px; padding-bottom: 0px;">
		<div class="container">
			<!--<div class="row">
				<div class="col text-center">
					<div class="section_title">Unité de Télémedecine</div>
					<div class="section_subtitle">Présentation et Mission</div>
				</div>
			</div>-->
			<div class="row icon_boxes_row row-eq-height">
			    
				<div class="col-lg-8 info_box_col">
					<div class="logo">
						<a href="#">Mot du Directeur</a>	
					</div>
					<!--<div class="info_text_highlight">Qu'est ce que s'est?</div>-->
					<div class="info_text">
						<p align="justify">Bienvenue</p>
						<!--<p align="justify">Depuis sa création, le Centre Hospitalier Universitaire CHU-CAMPUS, remplit sa mission de soins auprès de la population de Lomé.</p>-->
						<p align="justify">Ce site Internet est destiné à vous informer sur l'organisation, le fonctionnement et les activités du CHU-CAMPUS. Notre ambition pour les années à venir est de développer encore davantage l’accueil sous toutes ses formes afin de faciliter les séjours de nos patients, mais aussi de moderniser sans cesse ce bel établissement, classé Centre Hospitalier Universitaire, pour offrir à tous des soins de haute qualité.</p>
						<p align="justify">L’ensemble du personnel et moi-même vous invitons donc à aller à la découverte de notre hôpital, en formulant le souhait que si vous deviez y avoir recours, vous soyez le plus satisfait possible de nos services.</p>
						<p align="justify">Le Directeur</p>
						<p align="justify"><b>Dr. AGBOBLI Yawo Apélété, Médecin- Commandant.</b></p>
					</div>
				</div>
			
				<div class="col-lg-4 info_box_col">
					<div class="info_text"><img src="{{asset('/assets/images/agbobli.PNG') }}" alt="" width="400px"></div>
				</div>
			</div>
			<!--<div class="row">
				<div class="col">
					<div class="button about_button ml-auto mr-auto"><a href="{{route('contact')}}"><span>nous écrire</span><span>nous écrire</span></a></div>
				</div>
			</div>-->
		</div>
	</div>

	<div class="info">
		<div class="container">
			<div class="row row-eq-height">

				<!-- Info Box -->
				<div class="col-lg-6 info_box_col">
					<div class="info_box">
						<!--<div class="info_image"><img src="{{asset('/assets/images/info_1.jpg')}}" alt=""></div>-->
						<div class="info_content">
							<div class="info_title">Consultations</div>
							<div class="info_text">Rendez-vous dans notre Centre Hospitalière pour vous faire consulter avec nos meilleurs médecins spécialistes.</div>
							<div class="button info_button"><a href="{{route('about')}}"><span>lire plus</span><span>lire plus</span></a></div>
						</div>
					</div>
				</div>

				<!-- Info Box -->
				<div class="col-lg-6 info_box_col">
					<div class="info_box">
						<!--<div class="info_image"><img src="{{asset('/assets/images/info_2.jpg')}}" alt=""></div>-->
						<div class="info_content">
							<div class="info_title">Conseils de santé</div>
							<div class="info_text">Nos médecins ont le plaisir de vous prodiguer d'excellents conseils de santé pour votre bien-être et une santé plus saine.</div>
							<div class="button info_button"><a href="{{route('blog.index')}}"><span>lire plus</span><span>lire plus</span></a></div>
						</div>
					</div>
				</div>

				

				<!-- Info Form -->

				<!--<div class="col-lg-6 info_box_col">
					<div class="info_form_container">
						<div class="info_form_title">Rendez-vous</div>
						<form method="POST" action="{{ route('appointments.store') }}" class="info_form" id="info_form" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="row">
				                <div class="col-md-6">
									<select name="department_id" id="department" class="info_form_dep info_input info_select">
										<option value="">--Selectionner Département--</option>
										@foreach( $departments as $department)
											<option value="{{ $department->id }}">{{$department->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-6">
									<select name="doctor_id" id="doctor" class="info_form_doc info_input info_select">
									</select>
								</div>
							</div>

							<div class="row">
				                <div class="col-md-6">
				                  <div class="form-group">
				                    <input type="date" class="info_input" placeholder="Date" id="appointment_date" name="date_apt">
				                  </div>    
				                </div>
				                <div class="col-md-6">
				                  <div class="form-group">
				                  	<input type="time" class="info_input" placeholder="Date" id="appointment_date" name="time_apt" min="08:00" max="18:00" value="08:00">
				                    <select name="appointment_time" id="appointment_time" class="appointment_time info_input info_select">
				                    	<option>--Heure--</option>
										<option>08H 00</option>
										<option>09H 00</option>
										<option>10H 00</option>
									</select>
				                  </div>
				                </div>
				             </div>				

							<div class="row">
				                <div class="col-md-6">
					                <div class="form-group">
									<input type="text" class="info_input" placeholder="Nom" required="required">
									</div>
								</div>
					            <div class="col-md-6">
					                <div class="form-group">
										<input type="text" class="info_input" placeholder="Prénom(s)" required="required">
									</div>
								</div>
							</div>

							<div class="row">
				                <div class="col-md-6">
				                  <div class="form-group">
									<input type="text" class="info_input" placeholder="Téléphone">
								</div>
							</div>
				            <div class="col-md-6">
				                <div class="form-group">
									<input type="email" class="info_input" placeholder="Email">
								</div>
							</div>
						</div>
							<button class="info_form_button">prendre rendez-vous</button>
						</form>
					</div>
				</div>-->
			</div>
		</div>
	</div>
	
	<div class="services">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">LES GESTES BARRIERES</div>
					<div class="section_subtitle">Le CHU-CAMPUS vous exhorte vivement à adopter les gestes barrières</div>
				</div>
			</div>
			<div class="row icon_boxes_row">
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box" style="margin-bottom: 10px;">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{ Storage::disk('public')->url('/app/public/public/img/laver-les-mains@3x.png') }}" alt=""></div>
							<div class="icon_box_title">Se laver les mains</div>
						</div>
						<div class="icon_box_text">
							<p>régulièrement avec de l’eau et du savon, ou les désinfecter avec du gel hydroalcoolique</p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-6">
					<div class="icon_box" style="margin-bottom: 10px;">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{ Storage::disk('public')->url('/app/public/public/img/utiliser-mouchoir@3x.png') }}" alt=""></div>
							<div class="icon_box_title">Tousser et éternuer</div>
						</div>
						<div class="icon_box_text">
							<p>dans un mouchoir ou dans le pli de son coude</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box" style="margin-bottom: 10px;">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{ Storage::disk('public')->url('/app/public/public/img/handshake.png') }}" alt=""></div>
							<div class="icon_box_title">Saluer sans se toucher</div>
						</div>
						<div class="icon_box_text">
							<p>sans se serrer la main et éviter les embrassades</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box" style="margin-bottom: 10px;">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{ Storage::disk('public')->url('/app/public/public/img/Eviter-le-endroits-avec-beaucoup-de-monde@3x.png') }}" alt=""></div>
							<div class="icon_box_title">Rester à distance</div>
						</div>
						<div class="icon_box_text">
							<p>d'au moins 1 mètre des autres</p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-6">
					<div class="icon_box" style="margin-bottom: 10px;">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{ Storage::disk('public')->url('/app/public/public/img/Ne-pas-se-toucher-le-visage@3x.png') }}" alt=""></div>
							<div class="icon_box_title">Ne pas se toucher</div>
						</div>
						<div class="icon_box_text">
							<p>ni les yeux, le nez ou la bouche</p>
						</div>
					</div>
				</div>


				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box" style="margin-bottom: 10px;">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{ Storage::disk('public')->url('/app/public/public/img/porter-un-masque@3x.png') }}" alt=""></div>
							<div class="icon_box_title">Portez un masque</div>
						</div>
						<div class="icon_box_text">
							<p>si vous avez des symptômes respiratoires</p>
						</div>
					</div>
				</div>
				
	        </div>
		</div>
	</div>
	<!-- CTA -->

	<div class="cta">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('/assets/images/cta_1.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta_container d-flex flex-xl-row flex-column align-items-xl-start align-items-center justify-content-xl-start justify-content-center">
						<div class="cta_content text-xl-left text-center">
							<div class="cta_title">Prenez rendez-vous avec nos médecins spécialistes.</div>
							<div class="cta_subtitle"> Veuillez vous connectez si vous souhaiteriez prendre un rendez-vous avec un médecin ou inscrivez-vous <a href="{{ route('register') }}" target="_blank">ici</a></div>
						</div>
						<div class="button cta_button ml-xl-auto"><a href="{{route('contact')}}"><span>écrivez-nous</span><span>écrivez-nous</span></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Services -->

	<div class="services">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">NOS SERVICES</div>
					<div class="section_subtitle">Les services disponibles</div>
				</div>
			</div>
			<div class="row icon_boxes_row">
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_3.svg')}}" alt=""></div>
							<div class="icon_box_title">HEPATO GASTRO ENTEROLOGIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. REDAH D. </b> Lundi : 07H00 - 12H00</p>
							<p><b>Dr. LAWSON-ANANISSOH. </b> Mercredi : 07H00 - 12H00</p>
							<p><b>Prof. Ag. BAGNY A. </b> Jeudi : 07H00 - 12H00</p>
							<p><b>Dr. KAAGA Laconi </b> Mercredi : 07H00 - 12H00</p>
							<p><b>Dr. DUSABE Angélique </b>(Psychologue Clinicienne) Mercredi : 07H00 - 12H00</p>
						</div>
					</div>
				</div>
				
				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_1.svg')}}" alt=""></div>
							<div class="icon_box_title">CARDIOLOGIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. DAMOROU F.</b> : Mardi 07H00 - 12H00</p>
							<p><b>Dr. PESSINABA S.</b> : Mercredi 07H00 - 12H00</p>
							<p><b>Dr. TOGBOSSI Kodjo</b> : Mercredi 07H30 - 12H00<br>Jeudi (Échographie) : 07H30 - 12H00</p>
							<p><b>Dr. N'DA N. W. Julien</b> : Lundi - Jeudi 07H00 - 12H00 | Mercredi (Échographie) : 07H-00 - 12H00.</p>
							<p><b>Dr. YAYEHD Komlanvi</b> : Lundi: 08H00 - 12H00 <br>Mardi (Échographie) : 08H00 - 12H00.</p>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_8.svg')}}" alt=""></div>
							<div class="icon_box_title">PEDIATRIE ALLERGOLOGIE NÉONATALOGIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof Ag. DOUTI K. N. </b>Lundi - Mercredi : 07H30 – 12H30</p>
							<p><b>Dr KAMAGA  M. </b>Lundi - Mardi - Vendredi : 07H30 – 12H30</p>
							<p><b>Dr. HEMOU M. </b>Mardi - Jeudi : 07H30 – 12H30</p>
							<p><b>Dr. AGBEKO F. </b>Lundi - Jeudi : 07H30 – 12H30</p>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_3.svg')}}" alt=""></div>
							<div class="icon_box_title">MEDECINE INTERNE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Dr. BOUKARI  B. </b> Mardi : 07H00 – 12H00</p>
							<p><b>Dr. APETI S. </b> Mercredi : 07H00 - 12H00</p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_7.svg')}}" alt=""></div>
							<div class="icon_box_title">PSYCHIATRIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. DASSA K.</b> Lundi - Vendredi : 07H00 - 12H00</p>
							<p><b>Dr. Sonia KANEKATOUA AGBOLO-N. </b> Mardi : 14H30 - 17H30 | Jeudi : 07H00- 12H00/ 14H30 - 17H30</p>
						</div>
					</div>
				</div>

				

				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_2.svg')}}" alt=""></div>
							<div class="icon_box_title">GYNECO-OBSTETRIQUE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Dr. BASSOWA B. T. A. M. </b> </p>
							<p><b>Dr. BAH OBE Y. </b> </p>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_8.svg')}}" alt=""></div>
							<div class="icon_box_title">ORL</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. BOKO E. </b> Lundi - Mercredi - Vendredi : 07H00 - 12H00</p>
							<p><b>Dr. PEGBESSOU  </b>Lundi - Mercredi - Vendredi : 07H00 – 12H00 / 14H30 – 17H30</p>
                            <p><b>Dr. KOLOU </b>Lundi - Mercredi - Jeudi - Vendredi : 07H00 – 12H00 / 14H30 – 17H30</p>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_8.svg')}}" alt=""></div>
							<div class="icon_box_title">RADIOLOGIE ET IMAGERIE MEDICALE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. ADJENOU  V. </b></p>
							<p><b>Prof. Ag. SONHAYE L. </b></p>
							<p><b>Prof. Ag. ADAMBOUNOU K. </b></p>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_6.svg')}}" alt=""></div>
							<div class="icon_box_title">NEUROLOGIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. BALOGOU A.</b> Lundi : 07H00 - 12H00</p>
							<p><b>Prof. Ag. ASSOGBA K.</b> Mardi : 07H00 - 12H00</p>
							<p><b>Dr WAKLATSI K. </b> Mercredi : 07H00 – 12H00</p>
							<p><b>Dr. APETSE K. </b> Jeudi : 07H00 - 12H00</p>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_8.svg')}}" alt=""></div>
							<div class="icon_box_title">OPHTAMOLOGIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. Ag. MANEH H. </b> Mardi - Jeudi : 07H00 - 12H00 | 14H30 - 17H30</p>
							<p><b>Dr. AGBA A. </b>Mercredi- Vendredi : 07H00 - 12H00</p>
						</div>
					</div>
				</div>
				
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_8.svg')}}" alt=""></div>
							<div class="icon_box_title">STOMATOLOGIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Dr. AGODA P. </b>Mardi - Jeudi : 07H00 – 12H00</p>
							<p><b>Dr. HEMOU P. </b>Lundi - Mercredi : 07H30 – 12H30</p>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_8.svg')}}" alt=""></div>
							<div class="icon_box_title">DERMATOLOGIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. KOMBATE K. </b>Lundi - Jeudi : 07H00 – 12H00</p>
							<p><b>Dr. TECLESSOU N. J </b>Mardi - Vendredi : 07H00 – 12H00</p>
						</div>
					</div>
				</div>
				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_5.svg')}}" alt=""></div>
							<div class="icon_box_title">CHIRURGIE PEDIATRIQUE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. AKAKPO-NUMADO G. K.</b> : Mardi - Vendredi </p>
							<p align="center"><b style="text-decoration-color: red">URGENCES 24h/24</b></p>
						</div>
					</div>
				</div>
				
				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_5.svg')}}" alt=""></div>
							<div class="icon_box_title">SERVICE PORTE</div>
						</div>
						<div class="icon_box_text">
							<!--<p><b>Dr. KPINSSAGA B. </b></p>-->
							<p><b>Dr. Nasser BADABAKE </b></p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_5.svg')}}" alt=""></div>
							<div class="icon_box_title">ORTHOPEDIE – TRAUMATOLOGIE - KINÉSITHÉRAPIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. Ag. WALLA A. </b></p>
						</div>
					</div>
				</div>
				
				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_9.svg')}}" alt=""></div>
							<div class="icon_box_title">HEMATOLOGIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Dr. PADARO E. </b> : Mardi 07H30 - 12H30</p>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_8.svg')}}" alt=""></div>
							<div class="icon_box_title">UNITÉ DE TÉLÉMÉDECINE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof Ag. ADAMBOUNOU Kokou </b></p>
						</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_8.svg')}}" alt=""></div>
							<div class="icon_box_title">DISPENSATION ARV</div>
						</div>
						<div class="icon_box_text">
							<p><b>Dr. KAAGA Laconi </b></p>
							<p><b>Dr. BOUKARI B. </b></p>
						</div>
					</div>
				</div>
				
				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_9.svg')}}" alt=""></div>
							<div class="icon_box_title">SERVICE PHARMACIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Dr. HOUNKPATI Afi Sitou </b></p>
						</div>
					</div>
				</div>
				
				<!-- Icon Box -->
				<div class="col-xl-4 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_9.svg')}}" alt=""></div>
							<div class="icon_box_title">LABORATOIRE</div>
						</div>
						<div class="icon_box_text">
						    <p><b>Prof. Ag. SALOU Mounerou</b></p>
							<p><b>Dr. KOUDOKPO Délali N.D. A </b></p>
							<p><b>Prof Ag.  DORKENOO Améyo N. </b></p>
							<p><b>Dr. KOUASSI Kafui Codzo </b></p>
						</div>
					</div>
				</div>
				
				
				

			</div>
			<div class="row">
				<div class="col">
					<div class="button services_button ml-auto mr-auto"><a href="{{route('services')}}"><span>voir plus</span><span>voir plus</span></a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Departments -->

	<div class="departments">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">GALERIE</div>
					<div class="section_subtitle">le CHU Campus en image</div>
				</div>
			</div>
			<div class="row dept_row">
				<div class="col">
					<div class="dept_slider_container_outer">
						<div class="dept_slider_container">

							<!-- Slider -->
							<div class="owl-carousel owl-theme dept_slider">
								
								<!-- Slide -->
								<div class="owl-item dept_item">
									<div class="dept_image"><img src="{{asset('/assets/images/IMG_4426.jpg')}}" alt=""></div>
									<!--<div class="dept_content">
										<div class="dept_title">Neonatologie</div>
										<div class="dept_link"><a href="#">Read More</a></div>
									</div>-->
								</div>

								<!-- Slide -->
								<div class="owl-item dept_item">
									<div class="dept_image"><img src="{{asset('/assets/images/IMG_4430.jpg')}}" alt=""></div>
									<!--<div class="dept_content">
										<div class="dept_title">Dentistry</div>
										<div class="dept_link"><a href="#">Lire Plus</a></div>
									</div>-->
								</div>

								<!-- Slide -->
								<div class="owl-item dept_item">
									<div class="dept_image"><img src="{{asset('/assets/images/IMG_4543.jpg')}}" alt=""></div>
									<!--<div class="dept_content">
										<div class="dept_title">Orthopedics</div>
										<div class="dept_link"><a href="#">Lire Plus</a></div>
									</div>-->
								</div>

								<!-- Slide -->
								<div class="owl-item dept_item">
									<div class="dept_image"><img src="{{asset('/assets/images/IMG_4545.jpg')}}" alt=""></div>
									<!--<div class="dept_content">
										<div class="dept_title">Laboratoire</div>
										<div class="dept_link"><a href="#">Lire Plus</a></div>
									</div>-->
								</div>

							</div>
							
						</div>

						<!-- Dept Slider Nav -->
						<div class="dept_slider_nav"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- FAQ & News -->

	<div class="stuff">
		<div class="container">
			<div class="row">

				<!-- FAQ -->
				<div class="col-lg-7">
					<div class="faq">
						<div class="faq_title">FAQ</div>
						<div class="faq_subtitle">réponses à quelques questions</div>
						<div class="elements_accordions">
							<div class="accordions">

								<div class="accordion_container">
									<div class="accordion d-flex flex-row align-items-center active"><div>Comment puis-je prendre rendez vous?</div></div>
									<div class="accordion_panel">
										<div>
											<p align="justify">Vous avez la possiblité de nous écrire directement du site par via le formulaire de contact ou vous connectez et accéder au menu <b></b>Prendre rendez-vous</b> de votre espace d'activté pour un nouveau rendez-vous</p>
										</div>
									</div>
								</div>

								<div class="accordion_container">
									<div class="accordion d-flex flex-row align-items-center"><div>Puis-je soumettre mes résultats d'examens?</div></div>
									<div class="accordion_panel">
										<div>
											<p align="justify">Une fois connecté, grâce au menu <b></b>Soumettre Résultat</b> de votre espace d'activité vous pouvez envoyer le(s) fichier(s) scanné(s) de votre examen à votre médecin traitant. Dès qu'il le verra il vous contactera dès que possible</p>
										</div>
									</div>
								</div>

								<div class="accordion_container">
									<div class="accordion d-flex flex-row align-items-center"><div>Puis-je télécharger mes ordonnances à partir de l'application</div></div>
									<div class="accordion_panel">
										<div>
											<p align="justify">Vous avez la possibité de consulter vos historiques de consultations, examens et ordonnances à partir de votre espace d'activité. Vous pouvez également y télécharger vos ordonnances.</p>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!-- Latest News -->
				<div class="col-lg-5">
					<div class="news">
						<div class="news_title">DERNIERES ARTICLES</div>
						<div class="news_subtitle">Tout lire à ce propos</div>
						<div class="news_container">

							<!-- Latest News Post -->
								@foreach($lastposts as $post)
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div><div class="latest_image"><img src="{{ Storage::disk('public')->url('/app/public/public/cover_images/'.$post->cover_image) }}" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="{{route('sante.show', $post->slug)}}">{{ $post->title}}</a></div>
										<div class="latest_info">
											<ul class="d-flex flex-row align-items-start justify-content-start">
												<li><a href="#">{{ $post->username}}</a></li>
												<li><a href="#">{{ $post->created_at}}</a></li>
											</ul>
										</div>
										<!--<div class="latest_comments"><a href="#">2 Comments</a></div>-->
									</div>
								</div>
								@endforeach

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('/assets/images/footer.jpg')}}" data-speed="0.8"></div>
		<div class="footer_content">
			<div class="container">
				<div class="row">

					<!-- Footer About -->
					<div class="col-lg-4 footer_col">
						<div class="footer_about">
							<div class="logo">
								<a href="#">CHU CAMPUS<span> +</span></a>	
							</div>
							<div class="footer_about_text">Le CHU-CAMPUS est un centre de soins, de formation et de recherche en science de la santé.</div>
							<div class="footer_social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									<!--<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>-->
									
								</ul>
							</div>
							<div class="copyright">
								&copy; <script>document.write(new Date().getFullYear());</script> CHU CAMPUS | Développé <!--<i class="fa fa-heart-o" aria-hidden="true"></i>--> par l'<a href="https://telemedchucampus.tg/about#unite" target="_blank"> Unité de Télémedecine du CHU-CAMPUS</a>
							</div>
						</div>
					</div>
					
					<!-- Newsletter -->
					<div class="col-lg-4 footer_col">
						<div class="footer_contact">
							<div class="footer_contact_title">Newsletter</div>
							@include('inc.messages')
							<div class="footer_contact_form_container">
								<form method="POST" action="{{url('newsletter')}}" class="footer_contact_form" id="footer_contact_form">
								    @csrf
									<input type="email" class="footer_contact_input" placeholder="Votre email" required="required" name="email">
									<button class="footer_contact_button" type="submit">souscrire</button>
								</form>
							</div>
						</div>
					</div>
					
					<!-- Footer Contact -->
					<!--<div class="col-lg-5 footer_col">
						<div class="footer_contact">
							<div class="footer_contact_title">Contact Rapide</div>
							<div class="footer_contact_form_container">
								<form action="#" class="footer_contact_form" id="footer_contact_form">
									<div class="d-flex flex-xl-row flex-column align-items-center justify-content-between">
										<input type="text" class="footer_contact_input" placeholder="Votre Nom" required="required">
										<input type="email" class="footer_contact_input" placeholder="Votre Adresse Email" required="required">
									</div>
									<textarea class="footer_contact_input footer_contact_textarea" placeholder="Message" required="required"></textarea>
									<button class="footer_contact_button">envoyer message</button>
								</form>
							</div>
						</div>
					</div>-->

					<!-- Footer Hours -->
					<div class="col-lg-4 footer_col">
						<div class="footer_hours">
							<div class="footer_hours_title">Heures d'ouverture</div>
							<ul class="hours_list">
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Tous les jours</div>
									<div class="ml-auto">7j/7,  24h/24</div>
								</li>
								<!--<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Vendredi</div>
									<div class="ml-auto">7.00 - 18.30</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Samedi</div>
									<div class="ml-auto">9.00 – 15.00</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Dimanche</div>
									<div class="ml-auto">9.00 – 15.00</div>-->
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_bar_content d-flex flex-sm-row flex-column align-items-lg-center align-items-start justify-content-start">
							<nav class="footer_nav">
								<ul class="d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
									<li class="active"><a href="{{route('index')}}">Accueil</a></li>
									<li><a href="{{route('about')}}">A Propos</a></li>
									<li><a href="{{route('services')}}">Services</a></li>
									<li><a href="{{route('blog.index')}}">Santé</a></li>
									<li><a href="{{route('timeline')}}">Actualités</a></li>
									<li><a href="{{route('contact')}}">Contact</a></li>
								</ul>
							</nav>
							<div class="footer_links">
								<ul class="d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
									<li><a href="#">Assistance</a></li>
									<li><a href="#">Urgence</a></li>
									<!--<li><a href="#">Rendez-vous</a></li>-->
								</ul>
							</div>
							<div class="footer_phone ml-lg-auto">
								<i class="fa fa-phone" aria-hidden="true"></i>
								<span>22254739 | 22257768 | 22259709</span>
								<!--<span>22 25 47 39 | 22 25 77 68 | 22 25 97 09</span>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

<!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="date" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>

</div>
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
<script src="{{asset('/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{asset('/assets/styles/bootstrap4/popper.js') }}"></script>
<script src="{{asset('/assets/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{asset('/assets/styles/bootstrap4/bootstrap-datepicker.js') }}"></script>
<script src="{{asset('/assets/styles/bootstrap4/jquery.timepicker.min.js') }}"></script>
<script src="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{asset('/assets/plugins/easing/easing.js') }}"></script>
<script src="{{asset('/assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{asset('/assets/js/custom.js') }}"></script>

</body>
</html>