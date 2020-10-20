<!DOCTYPE html>
<html lang="fr">
<head>
<title>A propos | {{config('app.name', 'Telemedecine')}}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="A propos du site web du Centre Hospitalier Universitaire CAMPUS de Lomé">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:site_name" content="CHU CAMPUS +" />
<meta property="og:url" content="https://telemedchucampus.tg/about" />
<meta property="og:title" content="A Propos du site web du CHU CAMPUS de Lomé" />
<meta property="og:type" content="website" />
<meta property="og:image" content="https://telemedchucampus.tg/assets/images/index-hero2.jpg" />

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="A Propos du site web du CHU CAMPUS de Lomé">
<meta property="twitter:description" content="A Propos du site web du Centre Hospitalier Universitaire CAMPUS de Lomé">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/assets/img/favicon.ico') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{asset('/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/about.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/about_responsive.css') }}">
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
				<li class="menu_item"><a href="{{ route('about') }}">A Propos</a></li>
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
		<!-- <div class="background_image" style="background-image:url(images/about.jpg)"></div> -->
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('/assets/images/about.jpg') }}" data-speed="0.8"></div>

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
													<li class="active"><a href="{{ route('about') }}">A Propos</a></li>
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
									                <li><a href="{{ route('index') }}">Accueil</a></li>
													<!--<li class="active"><a href="{{ route('about') }}">A Propos</a></li>-->
													<li><a href="{{ route('services') }}">Services</a></li>
													<li><a href="{{ route('blog.index') }}">Conseils-Santé</a></li>
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
							<div class="home_title">À propos</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- About -->
	<div class="about" style="padding-bottom: 0px;">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">Unité de Télémedecine du CHU-CAMPUS de Lomé</div>
					<div class="section_subtitle">Présentation et Mission</div>
				</div>
			</div>
			<div class="row about_row row-eq-height">
				<div class="col-lg-6">
					<div class="logo">
						<a href="#" name="unite">Unité de Télémedecine</a>	
					</div>
					<div class="about_text_highlight">Qu'est ce que c'est?</div>
					<div class="about_text">
						<p align="justify">L’<b>Unité de Télémédecine</b> du CHU - CAMPUS est une unité de prestation et de recherche en Télémédecine rattachée au Laboratoire de Biophysique et Imagerie médicale qui a été créée en 2010 et dirigée par le <b>Professeur Agrégé ADAMBOUNOU Kokou.</b></p>
						<p align="justify">Elle a pour mission non seulement de concevoir des plateformes de Télémedecine mais aussi de réaliser des actes de télémédecine (Téléconsulation, Téléexpertise, Téléassistance et Télésurveillance médicales) dans toutes les spécialités médicales.</p>
					    <p align="justify">Cliquez <a href="{{ Storage::disk('public')->url('/app/public/public/pdf/CV_Abrege_Kokou_2019.pdf') }}" target="_blank">ici</a> pour voir le CV du Pr. Ag. ADAMBOUNOU Kokou</p>
					</div>
				</div>
			
				<div class="col-lg-6">
					<div class="about_image"><img src="{{asset('/assets/images/unite.jpg') }}" alt="" width="500px"></div>
				</div>
			</div>
			<!--<div class="row">
				<div class="col">
					<div class="button about_button ml-auto mr-auto"><a href="{{route('contact')}}"><span>nous écrire</span><span>nous écrire</span></a></div>
				</div>
			</div>-->
		</div>
	</div>

	<div class="about">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">But de la plateforme</div>
					<div class="section_subtitle">Ce que nous faisons réelement</div>
				</div>
			</div>
			<div class="row about_row row-eq-height">
				<div class="col-lg-4">
					<div class="logo">
						<a href="#">Telemed CHU Campus<span> +</span></a>	
					</div>
					<div class="about_text_highlight">Qu'est ce que c'est?</div>
					<div class="about_text">
						<p align="justify">Cette plateforme a été conçue pour répondre aux besoins de rester proches de nos patients pour une prise en charge et un suivi plus efficaces.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="about_text_2">
						<p align="justify">Nous mettons à disposition de nos aimables patients une application interne liée à ce site web pour vous servir d'espace d'activités. <br>
							Vous avez la possiblité : 
								<li>de consulter vos historiques de consultaions, d'examens médicaux</li>
								<li>Télécharger des ordonnances qui vous ont été presrites</li>
								<li>Soumettre des résultats examens demandés par votre médecin traitant</li>	
						</p>
						<p align="justify">
							Si vous ne disposez pas encore de compte, veuillez vous inscrire <a href="{{route('register')}}">ici</a>, sinon connectez-vous <a href="{{route('login')}}">ici</a>
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="about_image"><img src="{{asset('/assets/images/12side.jpg') }}" alt=""></div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="button about_button ml-auto mr-auto"><a href="{{route('contact')}}"><span>nous écrire</span><span>nous écrire</span></a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Milestones -->

	<!--<div class="milestones">
		<div class="container">
			<div class="row">

				
				<div class="col-lg-3 milestone_col">
					<div class="milestone d-flex flex-row align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="{{asset('/assets/images/icon_7.svg') }}" alt=""></div>
						<div class="milestone_content">
							<div class="milestone_counter" data-end-value="365">0</div>
							<div class="milestone_text">Jours par an</div>
						</div>
					</div>
				</div>

			
				<div class="col-lg-3 milestone_col">
					<div class="milestone d-flex flex-row align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="{{asset('/assets/images/icon_6.svg') }}" alt=""></div>
						<div class="milestone_content">
							<div class="milestone_counter" data-end-value="25" data-sign-after="k">0</div>
							<div class="milestone_text">Patients par an</div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 milestone_col">
					<div class="milestone d-flex flex-row align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="{{asset('/assets/images/icon_8.svg') }}" alt=""></div>
						<div class="milestone_content">
							<div class="milestone_counter" data-end-value="125">0</div>
							<div class="milestone_text">Docteurs Expérimentés</div>
						</div>
						
					</div>
				</div>

				
				<div class="col-lg-3 milestone_col">
					<div class="milestone d-flex flex-row align-items-center justify-content-start">
						<div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="{{asset('/assets/images/icon_9.svg') }}" alt=""></div>
						<div class="milestone_content">
							<div class="milestone_counter" data-end-value="12" data-sign-after="k">0</div>
							<div class="milestone_text"> Résultats Labo</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>-->

	<!-- CTA -->

	<!--<div class="cta">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('/assets/images/cta_1.jpg') }}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta_container d-flex flex-xl-row flex-column align-items-xl-start align-items-center justify-content-xl-start justify-content-center">
						<div class="cta_content text-xl-left text-center">
							<div class="cta_title">Prendre Rendez-vous avec un de nos professionels Docteurs.</div>
							<div class="cta_subtitle">Morbi arcu neque, scelerisque eget ligula ac, congue tempor felis. Integer tempor, eros a egestas.</div>
						</div>
						<div class="button cta_button ml-xl-auto"><a href="#"><span>écrivez-nous</span><span>écrivez-nous</span></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>-->

	<!-- Doctors -->

	<!--<div class="doctors">
		<div class="doctors_image"><img src="{{asset('/assets/images/doctors.jpg') }}" alt=""></div>
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">Nos Docteurs</div>
					<div class="section_subtitle">Pour votre choix</div>
				</div>
			</div>
			<div class="row doctors_row">
				
				
				<div class="col-xl-3 col-md-6">
					<div class="doctor">
						<div class="doctor_image"><img src="{{asset('/assets/images/doc_1.jpg') }}" alt=""></div>
						<div class="doctor_content">
							<div class="doctor_name"><a href="#">Michael Smith</a></div>
							<div class="doctor_title">Surgeon</div>
							<div class="doctor_link"><a href="#">+</a></div>
						</div>
					</div>
				</div>

				
				<div class="col-xl-3 col-md-6">
					<div class="doctor">
						<div class="doctor_image"><img src="{{asset('/assets/images/doc_2.jpg') }}" alt=""></div>
						<div class="doctor_content">
							<div class="doctor_name"><a href="#">Christian Williams</a></div>
							<div class="doctor_title">Surgeon</div>
							<div class="doctor_link"><a href="#">+</a></div>
						</div>
					</div>
				</div>

				
				<div class="col-xl-3 col-md-6">
					<div class="doctor">
						<div class="doctor_image"><img src="{{asset('/assets/images/doc_3.jpg') }}" alt=""></div>
						<div class="doctor_content">
							<div class="doctor_name"><a href="#">Jessica Walsh</a></div>
							<div class="doctor_title">Surgeon</div>
							<div class="doctor_link"><a href="#">+</a></div>
						</div>
					</div>
				</div>

				
				<div class="col-xl-3 col-md-6">
					<div class="doctor">
						<div class="doctor_image"><img src="{{asset('/assets/images/doc_4.jpg') }}" alt=""></div>
						<div class="doctor_content">
							<div class="doctor_name"><a href="#">Martha James</a></div>
							<div class="doctor_title">Surgeon</div>
							<div class="doctor_link"><a href="#">+</a></div>
						</div>
					</div>
				</div>

			
				<div class="col-xl-3 col-md-6">
					<div class="doctor">
						<div class="doctor_image"><img src="{{asset('/assets/images/doc_5.jpg') }}" alt=""></div>
						<div class="doctor_content">
							<div class="doctor_name"><a href="#">Michael Smith</a></div>
							<div class="doctor_title">Surgeon</div>
							<div class="doctor_link"><a href="#">+</a></div>
						</div>
					</div>
				</div>

				
				<div class="col-xl-3 col-md-6">
					<div class="doctor">
						<div class="doctor_image"><img src="{{asset('/assets/images/doc_6.jpg') }}" alt=""></div>
						<div class="doctor_content">
							<div class="doctor_name"><a href="#">Christina Smith</a></div>
							<div class="doctor_title">Laboratory</div>
							<div class="doctor_link"><a href="#">+</a></div>
						</div>
					</div>
				</div>

				
				<div class="col-xl-3 col-md-6">
					<div class="doctor">
						<div class="doctor_image"><img src="{{asset('/assets/images/doc_7.jpg') }}" alt=""></div>
						<div class="doctor_content">
							<div class="doctor_name"><a href="#">Jessica Walsh</a></div>
							<div class="doctor_title">Pediatrist</div>
							<div class="doctor_link"><a href="#">+</a></div>
						</div>
					</div>
				</div>

			
				<div class="col-xl-3 col-md-6">
					<div class="doctor">
						<div class="doctor_image"><img src="{{asset('/assets/images/doc_8.jpg') }}" alt=""></div>
						<div class="doctor_content">
							<div class="doctor_name"><a href="#">Martha James</a></div>
							<div class="doctor_title">Eye Doctor</div>
							<div class="doctor_link"><a href="#">+</a></div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col">
					<div class="button doctors_button ml-auto mr-auto"><a href="#"><span>tous les docteurs</span><span>tous les docteurs</span></a></div>
				</div>
			</div>
		</div>
	</div>-->

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
								</ul>
							</div>
							<div class="copyright">
								&copy;<script>document.write(new Date().getFullYear());</script> CHU CAMPUS | Développé<!--<i class="fa fa-heart-o" aria-hidden="true"></i>--> par <a href="https://telemedchucampus.tg/about#unite" target="_blank"> Unité de Télémedecine du CHU-CAMPUS</a>
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
									<div class="ml-auto"> 7j/7,  24h/24</div>
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
									<li ><a href="{{route('index')}}">Accueil</a></li>
									<li class="active"><a href="{{route('about')}}">A propos</a></li>
									<li><a href="{{route('services')}}">Services</a></li>
									<li><a href="{{ route('blog.index') }}">Santé</a></li>
									<li><a href="{{ route('timeline') }}">Actualités</a></li>
									<li ><a href="{{route('contact')}}">Contact</a></li>
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
<script src="{{asset('/assets/js/about.js') }}"></script>
</body>
</html>