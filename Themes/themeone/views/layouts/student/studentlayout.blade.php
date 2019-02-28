<!DOCTYPE html>

<html lang="en" dir="{{ (App\Language::isDefaultLanuageRtl()) ? 'rtl' : 'ltr' }}">



<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="{{getSetting('meta_description', 'seo_settings')}}">

	<meta name="keywords" content="{{getSetting('meta_keywords', 'seo_settings')}}">

	 	<meta name="csrf_token" content="{{ csrf_token() }}">


	<link rel="icon" href="{{IMAGE_PATH_SETTINGS.getSetting('site_favicon', 'site_settings')}}" type="image/x-icon" />

	<title>@yield('title') {{ isset($title) ? $title : getSetting('site_title','site_settings') }}</title>

	<!-- Bootstrap Core CSS -->

 @yield('header_scripts')

	   <link href="{{themes('css/bootstrap.min.css')}}" rel="stylesheet">
	   <link href="{{themes('css/sweetalert.css')}}" rel="stylesheet">
	   <link href="{{themes('css/sb-admin.css')}}" rel="stylesheet">
	   <link href="{{themes('css/custom-fonts.css')}}" rel="stylesheet">
	   <link href="{{themes('css/materialdesignicons.css')}}" rel="stylesheet">
	   <link href="{{themes('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">



	 
	<	<link href="{{themes('css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
	
	<!-- Morris Charts CSS -->
	<link href="{{themes('css/plugins/morris.css')}}" rel="stylesheet">

	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

 <?php
    $theme_color  = getThemeColor();
    ?>
    @if($theme_color == 'blueheader')      
	 <link href="{{themes('css/theme-colors/header-blue.css')}}" rel="stylesheet">
    @elseif($theme_color == 'bluenavbar')	 
	 <link href="{{themes('css/theme-colors/blue-sidebar.css')}}" rel="stylesheet">
    @elseif($theme_color == 'darkheader')	 
	 <link href="{{themes('css/theme-colors/dark-header.css')}}" rel="stylesheet">
    @elseif($theme_color == 'darktheme')	 
	 <link href="{{themes('css/theme-colors/dark-theme.css')}}" rel="stylesheet">
    @elseif($theme_color == 'whitecolor')	 
	 <link href="{{themes('css/theme-colors/white-theme.css')}}" rel="stylesheet">]
	@endif 
	


</head>



<body ng-app="academia">

 @yield('custom_div')

 <?php 

 $class = '';

 if(!isset($right_bar))

 	$class = 'no-right-sidebar';

$block_class = '';

if(isset($block_navigation))

	$block_class = 'non-clickable';

 ?>

	<div id="wrapper" class="{{$class}}">

		<!-- Navigation -->

		<nav class="navbar navbar-custom navbar-fixed-top {{$block_class}}" role="navigation">
			
		<?php 
		if(isset($block_navigation)) { ?>
			<div class="alert alert-danger alert-norefresh">
			  <strong>{{getPhrase('warning')}} !</strong> {{getPhrase('do_not_press_back/refresh_button')}}
			</div>

		<?php } ?>

			<!-- Brand and toggle get grouped for better mobile display -->

			<div class="navbar-header">

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

				<a class="navbar-brand" href="{{PREFIX}}"><img src="{{IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')}}" alt="{{getSetting('site_title','site_settings')}}"></a>

			</div>

			<!-- Top Menu Items -->

			<ul class="nav navbar-right top-nav">

				 

				 

				 

				<li class="dropdown profile-menu">

					<div class="dropdown-toggle top-profile-menu" data-toggle="dropdown">

						@if(Auth::check())

						<div class="username">

							<h2>{{Auth::user()->name}}</h2>

							 

						</div>

						@endif

						

						<div class="profile-img"> <img src="{{ getProfilePath(Auth::user()->image, 'thumb') }}" alt=""> </div>

						<div class="mdi mdi-menu-down"></div>

					</div>

					<ul class="dropdown-menu">

						

						<li>

							<a href="{{URL_BOOKMARKS.Auth::user()->slug}}">

								<sapn>{{ getPhrase('my_bookmarks') }}</sapn>

							</a>

						</li>

						<li>

							<a href="{{URL_USERS_EDIT.Auth::user()->slug}}">

								<sapn>{{ getPhrase('my_profile') }}</sapn>

							</a>

						</li>

						 <li>

							<a href="{{URL_USERS_CHANGE_PASSWORD.Auth::user()->slug}}">

								<sapn>{{ getPhrase('change_password') }}</sapn>

								</a>

						</li>

						 <li>

							<a href="{{URL_USERS_SETTINGS.Auth::user()->slug}}">

								<sapn>{{ getPhrase('settings') }}</sapn>

								</a>

						</li>

						<li>

							<a href="{{URL_FEEDBACK_SEND}}">

								<sapn>{{ getPhrase('feedback') }}</sapn>

							</a>

						</li>

						 

						<li>

							<a href="{{URL_USERS_LOGOUT}}">

								<sapn>{{ getPhrase('logout') }}</sapn>

							</a>

						</li>

					</ul>

				</li>

			</ul>

			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

			<!-- /.navbar-collapse -->

		</nav>
		 @if(env('DEMO_MODE')) 
		<div class="alert alert-info demo-alert">
		&nbsp;&nbsp;&nbsp;<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  			<strong>{{getPhrase('info')}}!</strong> CRUD {{getPhrase('operations_are_disabled_in_demo_version')}}
		</div>
		@endif

		<aside class="left-sidebar">

			<div class="collapse navbar-collapse navbar-ex1-collapse">

				<ul class="nav navbar-nav side-nav {{$block_class}}">

					<li {{ isActive($active_class, 'dashboard') }}> 

						<a href="{{DASHBOARD}}">

							<i class="fa fa-fw fa-window-maximize"></i>  {{ getPhrase('dashboard') }} 

						</a> 

					</li>





					<li {{ isActive($active_class, 'exams') }} > 



					<a data-toggle="collapse" data-target="#exams"><i class="fa fa-fw fa-desktop" ></i> 

					{{ getPhrase('exams') }} </a> 

					

					<ul id="exams" class="collapse sidemenu-dropdown">

						<li><a href="{{URL_STUDENT_EXAM_CATEGORIES}}"> <i class="fa fa-random"></i>{{ getPhrase('categories') }}</a></li>

						<li><a href="{{URL_STUDENT_EXAM_SERIES_LIST}}"> <i class="fa fa-list-ol"></i>{{ getPhrase('exam_series') }}</a></li>

						

						

					</ul>



					</li>

					<li {{ isActive($active_class, 'analysis') }} > 



					<a data-toggle="collapse" data-target="#analysis"> 
					<i class="fa fa-fw fa-bar-chart" aria-hidden="true"></i>

					{{ getPhrase('analysis') }} </a> 

					

					<ul id="analysis" class="collapse sidemenu-dropdown">

						<li><a href="{{URL_STUDENT_ANALYSIS_SUBJECT.Auth::user()->slug }}"> <i class="fa fa-key"></i>{{ getPhrase('by_subjcet') }}</a></li>

						<li><a href="{{URL_STUDENT_ANALYSIS_BY_EXAM.Auth::user()->slug }}"> <i class="fa fa-suitcase"></i>{{ getPhrase('by_exam') }}</a></li>

						<li><a href="{{URL_STUDENT_EXAM_ATTEMPTS.Auth::user()->slug }}"> <i class="fa fa-history"></i>{{ getPhrase('history') }} </a></li>

					</ul>



					</li>





					<li {{ isActive($active_class, 'lms') }} > 



					<a data-toggle="collapse" data-target="#lms"><i class="fa fa-fw fa-tv" ></i> 

					LMS </a> 

					

					<ul id="lms" class="collapse sidemenu-dropdown">

							<li><a href="{{ URL_STUDENT_LMS_CATEGORIES }}"> <i class="fa fa-random"></i>{{ getPhrase('categories') }}</a></li>

							 

							<li><a href="{{ URL_STUDENT_LMS_SERIES }}"> <i class="fa fa-list-ol"></i>{{ getPhrase('series') }}</a></li>

					</ul>

					</li>



					@if(getSetting('messaging', 'module'))

					<li {{ isActive($active_class, 'messages') }} > 

<a  href="{{URL_MESSAGES}}"> <i class="fa fa-fw fa-comments" aria-hidden="true"> </i>
					{{ getPhrase('messages')}} <small class="msg">{{$count = Auth::user()->newThreadsCount()}} </small></a>

                          <!--   <a  href="{{URL_MESSAGES}}"><span><i class="fa fa-comments-o fa-2x" aria-hidden="true"><h5 class="badge badge-success">{{$count = Auth::user()->newThreadsCount()}}</h5></i></span>
					{{ getPhrase('messages')}} </a> -->

					

					</li>

					@endif

				 

					<li {{ isActive($active_class, 'subscriptions') }} > 



					<a  href="{{URL_PAYMENTS_LIST.Auth::user()->slug}}"><i class="fa fa-fw fa-ticket" ></i> 

					{{ getPhrase('subscriptions') }} </a> 

					

	 



					</li>



					<li {{ isActive($active_class, 'notifications') }} > 

						<a href="{{URL_NOTIFICATIONS}}" ><i class="fa fa-fw fa-bell-o" aria-hidden="true"></i>

					{{ getPhrase('notifications') }} </a> 

					

					</li>


					<li {{ isActive($active_class, 'setting') }} > 

						<a href="{{URL_USERS_SETTINGS.Auth::user()->slug}}" ><i class="fa fa-cog" aria-hidden="true"></i>

					{{ getPhrase('Account Setting') }} </a> 

					

					</li>

					

					 

				</ul>

			</div>

		</aside>

		@if(isset($right_bar))

			

		<aside class="right-sidebar" id="rightSidebar">

			<button class="sidebat-toggle" id="sidebarToggle" href='javascript:'><i class="mdi mdi-menu"></i></button>

			<?php $right_bar_class_value = ''; 

			if(isset($right_bar_class))

				$right_bar_class_value = $right_bar_class;

			?>

			<div class="panel panel-right-sidebar {{$right_bar_class_value}}">

			<?php $data = '';

			if(isset($right_bar_data))

				$data = $right_bar_data;

			?>

				@include($right_bar_path, array('data' => $data))

			</div>

		</aside>

		

	@endif

		@yield('content')

	</div>

	<!-- /#wrapper -->

	<!-- jQuery -->

     <script src="{{themes('js/jquery-1.12.1.min.js')}}"></script>
	<script src="{{themes('js/bootstrap.min.js')}}"></script>
	<script src="{{themes('js/main.js')}}"></script>
	<script src="{{themes('js/sweetalert-dev.js')}}"></script>
	
    
    <script>
            var csrfToken = $('[name="csrf_token"]').attr('content');

            setInterval(refreshToken, 600000); // 1 hour 

            function refreshToken(){
                $.get('refresh-csrf').done(function(data){
                    csrfToken = data; // the new token
                });
            }

            setInterval(refreshToken, 600000); // 1 hour 

        </script>

	

	@include('common.alertify')

	

	@yield('footer_scripts')

	@include('errors.formMessages')

	@yield('custom_div_end')
	{!!getSetting('google_analytics', 'seo_settings')!!}
</body>



</html>