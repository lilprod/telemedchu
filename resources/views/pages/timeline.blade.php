<!DOCTYPE html>
<html lang="fr">
<head>
<title>Actualités | {{config('app.name', 'Telemedecine')}}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Les actualités du Centre Hospitalier Universitaire CAMPUS">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:site_name" content="CHU CAMPUS +" />
<meta property="og:url" content="https://telemedchucampus.tg/timeline" />
<meta property="og:title" content="Les actualités du CHU CAMPUS de Lomé" />
<meta property="og:type" content="website" />
<meta property="og:image" content="https://telemedchucampus.tg/assets/images/index-hero2.jpg" />

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="Les actualités du CHU CAMPUS de Lomé">
<meta property="twitter:description" content="Les actualités du Centre Hospitalier Universitaire CAMPUS de Lomé">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/assets/img/favicon.ico') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{asset('/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/news.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/styles/news_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/btn.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166262765-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166262765-1');
</script>
<style type="text/css">
	.results{
		background: #de1919;
		color: #eeee;
	}
</style>
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
	                        {{ __('Logout') }}
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
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('/assets/images/news.jpg') }}" data-speed="0.8"></div>

		<!-- Header -->

		<header class="header" id="header">
			<div>
				<div class="header_top">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="header_top_content d-flex flex-row align-items-center justify-content-start">
									<div class="logo">
										<a href="#">CHU CAMPUS <span>+</span></a>	
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
													<li><a href="{{ route('index') }}">Accueil</a></li>
													<li><a href="{{ route('about') }}">A Propos</a></li>
													<li><a href="{{ route('services') }}">Services</a></li>
													<li><a href="{{ route('blog.index') }}">Santé</a></li>
													<li class="active"><a href="{{ route('timeline') }}">Actualités</a></li>
													<li><a href="{{ route('contact') }}">Contact</a></li>
													<li><a class="" href="{{ route('login') }}">Connexion</a></li>
									                <li>
								                      @if (Route::has('register'))
								                          <a class="" href="{{ route('register') }}">Inscription</a>
								                      @endif
									                </li>
									                @else
									                <li><a href="{{ route('index') }}">Accueil</a></li>
													<!--<li><a href="{{ route('about') }}">A Propos</a></li>-->
													<li><a href="{{ route('services') }}">Services</a></li>
													<li><a href="{{ route('blog.index') }}">Santé</a></li>
													<li class="active"><a href="{{ route('timeline') }}">Actualités</a></li>
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
							<div class="home_title">Actualités</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Posts -->
				<div class="col-lg-8">
					<div class="news_posts">
            
						<!-- News Post -->
						@foreach($posts as $post)
						<div class="news_post">
							<div class="news_post_image"><img src="{{ Storage::disk('public')->url('/app/public/public/cover_images/'.$post->cover_image) }}" alt=""></div>
							<div class="news_post_content">
								<div class="news_post_date"><a href="{{route('timeline.show', $post->slug)}}">{{$post->created_at}}</a></div>
								<div class="news_post_title"><a href="{{route('timeline.show', $post->slug)}}">{{$post->title}}</a></div>
								<div class="news_post_info">
									<ul class="d-flex flex-row align-items-center justify-content-start">
										<li><a href="#">par {{$post->username}}</a></li>
										<li><a href="#">{{$post->created_at}}</a></li>
									</ul>
								</div>
								<div class="news_post_text">
									<p style="text-align: justify-all;">{!!  str_limit($post->body, 200) !!} {{-- Limit teaser to 100 characters --}}</p>
								</div>
								<div class="button news_post_button"><a href="{{route('timeline.show', $post->slug)}}"><span>lire plus</span><span>lire plus</span></a></div>
							</div>
						</div>
						@endforeach

						
						
						<div class="text-center">
							{!! $posts->links() !!}
						</div>

					</div>
				</div>

				<!-- Sidebar -->
				<div class="col-lg-4">
					<div class="news_sidebar">

						<!-- Search -->
						<div class="sidebar_search">
							<form action="#" id="sidebar_search" class="sidebar_search">
								<input type="text" class="sidebar_search_input" placeholder="Recherche" required="required">
								<button class="sidebar_search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
							</form>
						</div>

						<!-- Latest News -->
						<div class="sidebar_latest">
							<div class="sidebar_title">Dernières actualités</div>
							<div class="sidebar_latest_container">

								<!-- Latest News Post -->
								@foreach($lastposts as $post)
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div><div class="latest_image"><img src="{{ asset('/storage/app/public/public/cover_images/'.$post->cover_image) }}" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="{{route('timeline.show', $post->slug)}}">{{ $post->title}}</a></div>
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
						
						<!-- Advertisement -->
						<div class="sidebar_latest">
							<div class="sidebar_title">Infos</div>
							<div class="sidebar_latest_container">
        						    <div class="d-flex flex-row align-items-start justify-content-start">
        						        <img src="{{ url('/storage/app/public/public/img/ad_corona.jpg') }}" width="350px" alt="">
        						    </div>
    						</div>
						</div>

						<!-- Categories -->
						<!--<div class="sidebar_categories">
							<div class="sidebar_title">Catégories</div>
							<div class="categories">
								<ul>
									<li><a href="#"><div class="d-flex flex-row align-items-center justify-content-start">
										<div>Medicine</div>
										<div class="ml-auto">(11)</div>
									</div></a></li>
									<li><a href="#"><div class="d-flex flex-row align-items-center justify-content-start">
										<div>Pharmacy</div>
										<div class="ml-auto">(23)</div>
									</div></a></li>
									<li><a href="#"><div class="d-flex flex-row align-items-center justify-content-start">
										<div>Uncategorized</div>
										<div class="ml-auto">(6)</div>
									</div></a></li>
									<li><a href="#"><div class="d-flex flex-row align-items-center justify-content-start">
										<div>Doctors</div>
										<div class="ml-auto">(9)</div>
									</div></a></li>
									<li><a href="#"><div class="d-flex flex-row align-items-center justify-content-start">
										<div>Innovations</div>
										<div class="ml-auto">(15)</div>
									</div></a></li>
								</ul>
							</div>
						</div>-->

						<!-- Appointment -->
						<!--<div class="info_form_container">
							<div class="info_form_title">Prendre rendez-vous</div>
							<form action="#" class="info_form" id="info_form">
								<select name="info_form_dep" id="info_form_dep" class="info_form_dep info_input info_select">
									<option>Department</option>
									<option>Department</option>
									<option>Department</option>
								</select>
								<select name="info_form_doc" id="info_form_doc" class="info_form_doc info_input info_select">
									<option>Doctor</option>
									<option>Doctor</option>
									<option>Doctor</option>
								</select>
								<input type="text" class="info_input" placeholder="Name" required="required">
								<input type="text" class="info_input" placeholder="Phone No">
								<button class="info_form_button">prendre rendez-vous</button>
							</form>
						</div>-->
						
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
								<a href="#">CHU CAMPUS <span>+</span></a>	
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
								&copy; <script>document.write(new Date().getFullYear());</script> CHU CAMPUS | Développé <!--<i class="fa fa-heart-o" aria-hidden="true"></i>--> par l'<a href="https://telemedchucampus.tg#unite" target="_blank"> Unité de Télémedecine</a> du CHU-CAMPUS
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
										<input type="text" class="footer_contact_input" placeholder="Name" required="required">
										<input type="email" class="footer_contact_input" placeholder="E-mail" required="required">
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ec357348157f5ae"></script>

<script src="{{asset('/assets/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
	$(".sidebar_search_input").on("keyup", function(){

		var v = $(this).val();
		$(".results").removeClass("results");
		$("div.news_post_text").each(function() {
			if(v != "" && $(this).text().search(new RegExp(v, 'gi')) != -1){
				$(this).addClass("results");
			}
		});
	});
});
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
<script src="{{asset('/assets/js/news.js') }}"></script>
</body>
</html>