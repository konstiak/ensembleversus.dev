<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			{{ Lang::get('site.title') }}
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Jon Doe" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/languages.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/starter-template.css')}}">

		<style>
        body {
            padding: 0 0 60px 0;
        }	
		@section('styles')
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="versus-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/versus-icon-144-precomposed.png') }}}">
		<link rel="versus-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/versus-icon-114-precomposed.png') }}}">
		<link rel="versus-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/versus-icon-72-precomposed.png') }}}">
		<link rel="versus-icon-precomposed" href="{{{ asset('assets/ico/versus-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">
		<!-- Navbar -->
		<div class="container navbar-static-top">
			 <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <div class="languages pull-left hidden-lg hidden-md hidden-sm">
                  		<a href="{{URL::to('language', array('cs'))}}"><span class="lang-sm" lang="cs"></span></a>
                  		<a href="{{URL::to('language', array('en'))}}"><span class="lang-sm" lang="en"></span></a>
                  		<a href="{{URL::to('language', array('de'))}}"><span class="lang-sm" lang="de"></span></a>
                  		<a href="{{URL::to('language', array('fr'))}}"><span class="lang-sm" lang="fr"></span></a>
            		</div>  
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
						<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">{{ Lang::get('site.home') }}</a></li>
						<li {{ (Request::is('profile') ? ' class="active"' : '') }}><a href="{{{ URL::to('profile') }}}">{{ Lang::get('site.profile') }}</a></li>
						<li {{ (Request::is('members') ? ' class="active"' : '') }}><a href="{{{ URL::to('members') }}}">{{ Lang::get('site.members') }}</a>
						

						{{--

							Ready for choirmaster and vocalist teacher pages.

						 <li class="dropdown {{ (Request::is('members') ? ' active' : '') }}">
							<a class="dropdown-toggle" data-toggle="dropdown" href="{{{ URL::to('members') }}}">{{ Lang::get('site.members') }}</a>
    						<ul class="dropdown-menu">
    							<li{{ (Request::is('members') ? ' class="active"' : '') }}><a href="{{{ URL::to('members') }}}">{{ Lang::get('site.choir_members') }}</a></li>
    							<li{{ (Request::is('choirmaster') ? ' class="active"' : '') }}><a href="{{{ URL::to('choirmaster') }}}">{{ Lang::get('site.choirmaster') }}</a></li>
    							<li{{ (Request::is('voice-teacher') ? ' class="active"' : '') }}><a href="{{{ URL::to('voice-teacher') }}}">{{ Lang::get('site.voice_teacher') }}</a></li>
    						</ul>
    					</li>

    					--}}


						<li {{ (Request::is('contact-us') ? ' class="active"' : '') }}><a href="{{{ URL::to('contact-us') }}}">{{ Lang::get('site.contact_us') }}</a></li>
					</ul>


                    <ul class="nav navbar-nav pull-right">
                        @if (Auth::check())
                        @if (Auth::user()->can('use_admin_panel'))
                        <li><a href="{{{ URL::to('admin') }}}">{{ Lang::get('site.admin_panel') }}</a></li>
                        @endif
                        <li><a href="{{{ URL::to('user') }}}">{{{ Auth::user()->username }}}</a></li>
                        <li><a href="{{{ URL::to('user/logout') }}}">{{ Lang::get('site.logout') }}</a></li>
                        @else
                        <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">{{ Lang::get('site.login') }}</a></li>
                        <li {{ (Request::is('user/create') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
                        @endif
                    </ul>
					<!-- ./ nav-collapse -->
				</div>
			</div>
		</div>
		<!-- ./ navbar-static-top -->


      		<div class="container">
          		<div class="row">
              		<div class="col-lg-5 col-md-5 col-sm-5 logo">
              		<a href="{{{ URL::to('') }}}"><img id="logo" class="img-responsive" src="{{{ asset('assets/img/logo.png') }}}" alt="Logo"></a>
              		</div>
              		<div class="col-lg-7 col-md-7 col-sm-7 hidden-xs">
              	        <div class="languages pull-right">
                  			<a href="{{URL::to('language', array('cs'))}}"><span class="lang-sm" lang="cs"></span></a>
                  			<a href="{{URL::to('language', array('en'))}}"><span class="lang-sm" lang="en"></span></a>
                  			<a href="{{URL::to('language', array('de'))}}"><span class="lang-sm" lang="de"></span></a>
                  			<a href="{{URL::to('language', array('fr'))}}"><span class="lang-sm" lang="fr"></span></a>
                  		</div>  
                  		<div id="myCarousel" class="carousel slide" data-ride="carousel">
        					<div class="carousel-inner">
								<div class="item active">
                					<img class="img-responsive" src="{{{ asset('assets/img/md/1.jpg') }}}" alt="slide1">
            					</div>
            					<div class="item">
					                <img class="img-responsive" src="{{{ asset('assets/img/md/2.jpg') }}}" alt="slide2">
					            </div>
					            <div class="item">
					                <img class="img-responsive" src="{{{ asset('assets/img/md/3.jpg') }}}" alt="slide3">
					            </div>
					                                      
					            <div class="item">
					                <img class="img-responsive" src="{{{ asset('assets/img/md/4.jpg') }}}" alt="slide4">
					            </div>
					            
					            <div class="item">
					                <img class="img-responsive" src="{{{ asset('assets/img/md/5.jpg') }}}" alt="slide5">
					            </div>
					            <div class="item">
					                <img class="img-responsive" src="{{{ asset('assets/img/md/6.jpg') }}}" alt="slide6">
					            </div>
					            <div class="item">
					                <img class="img-responsive" src="{{{ asset('assets/img/md/7.jpg') }}}" alt="slide7">
					            </div>
					            <div class="item">
					                <img class="img-responsive" src="{{{ asset('assets/img/md/8.jpg') }}}" alt="slide8">
					            </div>            
					            <div class="item">
					                <img class="img-responsive" src="{{{ asset('assets/img/md/9.jpg') }}}" alt="slide9">
					            </div>
            				</div>
        				</div> <!-- /#myCarousel -->
		          	</div>
      			</div> <!-- /header row -->
			</div> <!-- /header container -->

		<!-- Container -->
		<div class="container content">
			<div class="col-sm-8 col-md-8 col-lg-8">
				<!-- Notifications -->
				@include('notifications')
				<!-- ./ notifications -->

				<!-- Content -->
				@yield('content')
				<!-- ./ content -->
			</div>
		</div>
		<!-- ./ container -->

		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>
		</div>
		<!-- ./wrap -->


	    <div id="footer">
	      <div class="container">
	      </div>
	    </div>

		<!-- Javascripts
		================================================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

        @yield('scripts')
	</body>
</html>
