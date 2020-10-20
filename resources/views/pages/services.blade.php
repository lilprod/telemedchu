<!DOCTYPE html>
<html lang="fr">
<head>
<title>Services | {{config('app.name', 'Telemedecine')}}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Les services du Centre Hospitalier Universitaire CAMPUS de Lomé">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:site_name" content="CHU CAMPUS +" />
<meta property="og:url" content="https://telemedchucampus.tg/our-services" />
<meta property="og:title" content="Les services du site web du CHU CAMPUS de Lomé" />
<meta property="og:type" content="website" />
<meta property="og:image" content="https://telemedchucampus.tg/assets/images/index-hero2.jpg" />

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="Services du CHU CAMPUS de Lomé">
<meta property="twitter:description" content="Les services du Centre Hospitalier Universitaire CAMPUS de Lomé">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/assets/img/favicon.ico') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{asset('/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/services.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/services_responsive.css') }}">
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
				<li class="menu_item"><a href="{{ route('about') }}">À propos</a></li>
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
				<!--<li class="menu_item"><a href="{{ route('about') }}">À propos</a></li>-->
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
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				<!--<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>-->
			</ul>
		</div>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('/assets/images/services.jpg') }}" data-speed="0.8"></div>

		<!-- Header -->

		<header class="header" id="header">
			<div>
				<div class="header_top">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="header_top_content d-flex flex-row align-items-center justify-content-start">
									<div class="logo">
										<a href="{{ route('index') }}">CHU CAMPUS<span> +</span></a>	
									</div>
									<div class="header_top_extra d-flex flex-row align-items-center justify-content-start ml-auto">
										<div class="header_top_nav">
											<ul class="d-flex flex-row align-items-center justify-content-start">
												<li><a href="#">Assistance</a></li>
												<li><a href="#">Urgence</a></li>
												<!--<li><a href="#">Rendez-vous</a></li>-->
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
													<li><a href="{{ route('index') }}">Accueil</a></li>
													<li><a href="{{ route('about') }}">À propos</a></li>
													<li class="active"><a href="{{ route('services') }}">Services</a></li>
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
									                <li><a href="{{ route('index') }}">Accueil</a></li>
													<!--<li><a href="{{ route('about') }}">À propos</a></li>-->
													<li class="active"><a href="{{ route('services') }}">Services</a></li>
													<li><a href="{{ route('blog.index') }}">Santé</a></li>
													<li><a href="{{ route('timeline') }}">Actualités</a></li>>
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
							<div class="home_title">Services</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Services -->
	
	<div class="services" style="padding-bottom: 0px;">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">NOS SERVICES ADMINISTRATIFS</div>
					<div class="section_subtitle">Nos services administratifs</div>
				</div>
			</div>
			<div class="row icon_boxes_row">
				
				<!-- Icon Box -->
				<div class="col-lg-2">	
				</div>
				
				<div class="col-lg-8">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_3.svg')}}" alt=""></div>
							<div class="icon_box_title">DIRECTION GENERALE</div>
						</div>
						<div class="icon_box_text">
							<p align="justify">La Direction Générale administrée par le <b>Dr. AGBOBLI Yawo Apélété</b> assure les échanges efficaces entre les services de soins de l'établissement.</p>
						</div>
					</div>
				</div>
				
				<div class="col-lg-2">
				</div>
				
				<div class="col-xl-6 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_3.svg')}}" alt=""></div>
							<div class="icon_box_title">DIRECTION DES RESSOURCES HUMAINES</div>
						</div>
						<div class="icon_box_text">
							<p align="justify">Elle a la responsabilité de :</p>
							<p align="justify">- La qualité de vie au travail. Elle doit permettre à chacun de se situer dans la collectivité hospitalière en comprenant le sens de sa mission et en connaissant ses droits et obligations.</p>
						    <p align="justify">- L'accompagnement des professionnels dans le déroulement de leur carrière permettant une véritable adéquation des ressources aux besoins de l'hôpital. La gestion des ressources humaines ne doit plus seulement être réactive face aux évolutions démographiques qui affectent le personnel et aux changements de l'environnement technologique, mais travailler dans la prospective. </p>
						</div>
					</div>
				</div>
				
				<div class="col-xl-6 col-lg-6">
					<div class="icon_box">
						<div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_3.svg')}}" alt=""></div>
							<div class="icon_box_title">DIRECTION DES AFFAIRES FINANCIERES ET COMPTABLE</div>
						</div>
						<div class="icon_box_text">
							<p align="justify">Elle a pour mission :</p>
							<p align="justify">- La conception du budget prévisionnel de l'hôpital, anticipation des recettes et dépenses qui interviendront dans l'année à venir </p>
							<p align="justify">- Le suivi du budget en cours d'année avec éventuellement l'élaboration de décisions modificatives permettant de mettre à disposition des fonds supplémentaires sur un secteur </p>
						    <p align="justify">- La vérification des comptes </p>
						    <p align="justify">- La proposition d'axes prioritaires pour maintenir l'équilibre budgétaire</p>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

	<div class="services" style="padding-top: 0px;">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">NOS SERVICES MEDICAUX</div>
					<div class="section_subtitle">Les services médicaux</div>
				</div>
			</div>
			<div class="row icon_boxes_row">
				
				<!-- Icon Box -->
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
							<p><b>Dr. DUSABE Angélique </b> (Psychologue Clinicienne) Mercredi : 07H00 - 12H00</p>
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
							<div class="icon_box_icon"><img src="{{asset('/assets/images/icon_7.svg')}}" alt=""></div>
							<div class="icon_box_title">PSYCHIATRIE</div>
						</div>
						<div class="icon_box_text">
							<p><b>Prof. DASSA K.</b> Lundi - Vendredi : 07H00 - 12H00</p>
							<p><b>Dr. Sonia KANEKATOUA AGBOLO-N. </b> Mardi : 14H30 - 17H30 | Jeudi : 07H00- 12H00/ 14H30 - 17H30</p>
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
							<p><b>Prof. BOKO E. </b> Lundi - Mercredi - Vendredi 07H00 - 12H00</p>
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
							<p><b>Dr. AGBA A. </b> Mercredi - Vendredi : 07H00 - 12H00</p>
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
							<p align="center"><b style="text-decoration-color: red">URGENCES : 24h/24</b></p>
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
							<div class="icon_box_title">ORTHOPEDIE – TRAUMATOLOGIE -  KINÉSITHÉRAPIE</div>
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
	</div>
	</div>

	<!-- Boxes -->

	<div class="boxes d-flex flex-lg-row flex-column align-items-start justify-content-start">

		<!-- Box -->
		<div class="box">
			<div class="background_image" style="background-image:url({{asset('/assets/images/box_2.jpg)') }}"></div>
			<div class="box_title">Notre centre</div>
			<div class="box_subtitle">Regarder</div>
			<div class="box_text">Le CHU-CAMPUS est un centre de soins, de formation et de recherche en science de la santé constitué en unités confiées à des chefs, investis d’une fonction universitaire. Il reçoit des malades qui, en raison de leurs états, ne peuvent être traités dans les établissements de soins de niveau inférieur.
			</div>
			<!--<div class="button box_button"><a href="#"><span>lire plus</span><span>lire plus</span></a></div>-->
		</div>

		<!-- Box -->
		<div class="box">
			<div class="background_image" style="background-image:url({{asset('/assets/images/box_1.jpg)') }}"></div>
			<div class="box_title">Nos objectifs</div>
			<div class="box_subtitle">Regarder</div>
			<div class="box_text">L’accueil, les soins, l’éducation des patients et visiteurs; La planification familiale et de la consultation prénatale; L'éxécution de vastes programmes de santé publique; La réduction du taux de mortalité maternelle et hospitalière; L’enseignement, la recherche en collaboration avec l’université et les partenaires (...).</div>
			<!--<div class="button button_2 box_button"><a href="#"><span>lire plus</span><span>lire plus</span></a></div>-->
		</div>
		
		<!-- Box -->
		<div class="box">
			<div class="background_image" style="background-image:url({{asset('/assets/images/box_3.jpg)') }}"></div>
			<div class="box_title">Nos activités</div>
			<div class="box_subtitle">Regarder</div>
			<div class="box_text">Les principales activités du CHU CAMPUS se résument à des prestations de soins à l’égard de ses patients :<br>
				- La consultation médicale ;<br>
				- L’hospitalisation adulte et enfant ;<br>
				- La recherche médicale ;<br>
				- La formation des étudiants.</div>
			<!--<div class="button box_button"><a href="#"><span>lire plus</span><span>lire plus</span></a></div>-->
		</div>

		

	</div>

	<!-- Tabs -->

	<div class="tabs_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">

					<!-- Tabs -->
					<div class="tabs d-flex flex-row align-items-center justify-content-start flex-wrap">
						<div class="tab active">
							<div class="tab_title">Discuter</div>
							<div class="tab_text">Nous mettons à votre disposotion dès maintenant une application pour échanger avec nos médecins.</div>
						</div>
						<div class="tab">
							<div class="tab_title">Soumettre résultat</div>
							<div class="tab_text">Sans toutefois vous rendre au Centre Hospitalier Campus, vous pouvez à partir de l'application envoyer vos résultats d'exames à votre médecin traitant.</div>
						</div>
						<div class="tab">
							<div class="tab_title">Télécharger ordonnance</div>
							<div class="tab_text">Télécharger à n'importe quel endroit où vous vous trouvez vos ordonnances médicaux.</div>
						</div>
						<div class="tab">
							<div class="tab_title">Prendre rendez-vous</div>
							<div class="tab_text">Vous avez la possiblité de planifier à l'avance vos prises de rendez-vous avec votre médecin pour consultation.</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7">

					<!-- Panels -->
					<div class="tab_panels">

						<!-- Panel -->
						<div class="tab_panel active">
							<div class="tab_panel_content">
								<div class="row">
									<!--<div class="col-lg-5">
										<div class="tab_image"><img src="{{asset('/assets/images/tabs.jpg') }}" alt=""></div>
									</div>-->
									<div class="col-lg-7">
										<div class="tab_list">
											<p align="justify">
												Nous mettons à votre disposotion dès maintenant une application pour échanger avec nos médecins.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Panel -->
						<div class="tab_panel">
							<div class="tab_panel_content">
								<div class="tab_list">
									<p align="justify">
										Sans toutefois vous rendre au Centre Hospitalier Campus, vous pouvez à partir de l'application envoyer vos résultats d'examens à votre médecin traitant.
									</p>
								</div>
							</div>
						</div>

						<!-- Panel -->
						<div class="tab_panel">
							<div class="tab_panel_content">
								<div class="tab_list">
									<p align="justify">
										Télécharger à n'importe quel endroit où vous vous trouvez vos ordonnances médicaux.
									</p>
								</div>
							</div>
						</div>

						<!-- Panel -->
						<div class="tab_panel">
							<div class="tab_panel_content">
								<div class="tab_list">
									<p align="justify">
										Vous avez la possiblité de planifier à l'avance vos prises de rendez-vous avec votre médecin pour consultation.
									</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('/assets/images/footer.jpg') }}" data-speed="0.8"></div>
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
										<input type="text" class="footer_contact_input" placeholder="Vote Nom" required="required">
										<input type="email" class="footer_contact_input" placeholder="Votre Adresse Email" required="required">
									</div>
									<textarea class="footer_contact_input footer_contact_textarea" placeholder="Votre Message" required="required"></textarea>
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
									<div class="ml-auto">8.00 - 17.00</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Samedi</div>
									<div class="ml-auto">9.00 – 15.00</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Dimanche</div>
									<div class="ml-auto">9.00 – 15.00</div>
								</li>-->
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
									<li ><a href="{{route('index')}}">Accueil</a></li>
									<li><a href="{{route('about')}}">A propos</a></li>
									<li class="active"><a href="{{route('services')}}">Services</a></li>
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

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
<script src="{{asset('/assets/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{asset('/assets/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{asset('/assets/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{asset('/assets/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{asset('/assets/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{asset('/assets/plugins/easing/easing.js') }}"></script>
<script src="{{asset('/assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{asset('/assets/js/services.js') }}"></script>
</body>
</html>