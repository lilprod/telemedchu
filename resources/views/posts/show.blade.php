@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Voir Article</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="blog-view">
            <article class="blog blog-single-post">
                <h3 class="blog-title">{{$post->title}}</h3>
                <div class="blog-info clearfix">
                    <div class="post-left">
                        <ul>
                            <li><a href="#."><i class="fa fa-calendar"></i> <span>{{$post->created_at}}</span></a></li>
                            <li><a href="#."><i class="fa fa-user-o"></i> <span>Publié par {{$post->username}}</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="blog-image">
                    <a href="#."><img alt="" src="{{url('/storage/cover_images/'.$post->cover_image )}}" class="img-fluid"></a>
                </div>
                <div class="blog-content">
                    <p>{!!$post->body!!}</p>
                </div>
            </article>
            <!--<div class="widget blog-share clearfix">
                <h3>Share the post</h3>
                <ul class="social-share">
                    <li><a href="#." title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#." title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#." title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#." title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#." title="Youtube"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>-->
            <div class="widget author-widget clearfix">
                <h3>A propos de l'auteur</h3>
                <div class="about-author">
                    <div class="about-author-img">
                        <div class="author-img-wrap">
                            <img class="img-fluid rounded-circle" alt="" src="/assets/assets/img/user.jpg">
                        </div>
                    </div>
                    <div class="author-details">
                        <span class="blog-author-name">{{$post->username}}</span>
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside class="col-md-4">
        <div class="widget search-widget">
            <h5>Recherche Article</h5>
            <form class="search-form">
                <div class="input-group">
                    <input type="text" placeholder="Recherche..." class="form-control">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="widget post-widget">
            <h5>Articles récents</h5>
            <ul class="latest-posts">
                @foreach($lastposts as $post)
                <li>
                    <div class="post-thumb">
                        <a href="{{route('posts.show',$post->id)}}">
                            <img class="img-fluid" src="{{ url('/storage/cover_images/'.$post->cover_image) }}" alt="">
                        </a>
                    </div>
                    <div class="post-info">
                        <h4>
							<a href="{{route('posts.show',$post->id)}}">{{ $post->title}}</a>
						</h4>
                        <p><i aria-hidden="true" class="fa fa-calendar"></i> {{ $post->created_at}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!--<div class="widget category-widget">
            <h5>Blog Categories</h5>
            <ul class="categories">
                <li><a href="#."><i class="fa fa-long-arrow-right"></i> Lorem ipsum dolor</a></li>
                <li><a href="#."><i class="fa fa-long-arrow-right"></i> Lorem ipsum dolor</a></li>
                <li><a href="#."><i class="fa fa-long-arrow-right"></i> Lorem ipsum dolor</a></li>
                <li><a href="#."><i class="fa fa-long-arrow-right"></i> Lorem ipsum dolor</a></li>
                <li><a href="#."><i class="fa fa-long-arrow-right"></i> Lorem ipsum dolor</a></li>
                <li><a href="#."><i class="fa fa-long-arrow-right"></i> Lorem ipsum dolor</a></li>
            </ul>
        </div>
        <div class="widget tags-widget">
            <h5>Tags</h5>
            <ul class="tags">
                <li><a href="#." class="tag">Heart</a></li>
                <li><a href="#." class="tag">Cancer</a></li>
                <li><a href="#." class="tag">Kids</a></li>
                <li><a href="#." class="tag">Family</a></li>
                <li><a href="#." class="tag">Medical</a></li>
                <li><a href="#." class="tag">Injection</a></li>
                <li><a href="#." class="tag">Secure</a></li>
                <li><a href="#." class="tag">Insurance</a></li>
                <li><a href="#." class="tag">Doctor</a></li>
                <li><a href="#." class="tag">Nurse</a></li>
            </ul>
        </div>-->
    </aside>
</div>

@endsection