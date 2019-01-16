@extends('layouts.student.studentlayout')
@section('content')

<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">

<li>{{ $title}}</li>
</ol>
</div>
</div>
<div class="row">
	<div class="col-md-4 col-sm-6">
 		<div class="media state-media box-ws">
 			<div class="media-left">
 				<a href="{{URL_STUDENT_EXAM_CATEGORIES}}"><div class="state-icn bg-icon-info"><i class="fa fa-list-alt"></i></div></a>
 			</div>
 			<div class="media-body">
 				<h4 class="card-title">{{ count(App\User::getUserSeleted('categories'))}}</h4>
				<a href="{{URL_STUDENT_EXAM_CATEGORIES}}">{{ getPhrase('exam_categories')}}</a>
 			</div>
 		</div>
 	</div>
 	<div class="col-md-4 col-sm-6">
 		<div class="media state-media box-ws">
 			<div class="media-left">
 				<a href="{{ URL_STUDENT_EXAM_ALL }}"><div class="state-icn bg-icon-pink"><i class="fa fa-desktop"></i></div></a>
 			</div>
 			<div class="media-body">
 				<h4 class="card-title">{{ App\User::getUserSeleted('quizzes') }}</h4>
				<a href="{{ URL_STUDENT_EXAM_ALL }}">{{ getPhrase('Exams')}}</a>
 			</div>
 		</div>
 	</div>
 	<div class="col-md-4 col-sm-6">
 		<div class="media state-media box-ws">
 			<div class="media-left">
 				<a href="{{ URL_STUDENT_LMS_CATEGORIES }}"><div class="state-icn bg-icon-purple"><i class="fa fa-tv"></i></div></a>
 			</div>
 			<div class="media-body">
 				<h4 class="card-title">{{  App\User::getUserSeleted('lms_categories') }}</h4>
				<a href="{{ URL_STUDENT_LMS_CATEGORIES }}">LMS {{ getPhrase('categories')}}</a>
 			</div>
 		</div>
 	</div>
 	{{-- <div class="col-md-3 col-sm-6">
 		<div class="media state-media box-ws">
 			<div class="media-left">
 				<a href="{{ URL_STUDENT_LMS_CATEGORIES }}"><div class="state-icn bg-icon-success"><i class="fa fa-diamond"></i></div></a>
 			</div>
 			<div class="media-body">
 				<h4 class="card-title">Num</h4>
				<a href="{{ URL_STUDENT_LMS_CATEGORIES }}">Add Item</a>
 			</div>
 		</div>
 	</div> --}}
<!-- <div class="col-md-4">
<div class="card card-blue text-xs-center">
<div class="card-block">
<h4 class="card-title">{{ count(App\User::getUserSeleted('categories'))}}</h4>
<p class="card-text">{{ getPhrase('quiz_categories')}}</p>
</div>
<a class="card-footer text-muted" href="{{URL_STUDENT_EXAM_CATEGORIES}}">
{{ getPhrase('view_all')}}
</a>
</div>
</div>

<div class="col-md-4">
<div class="card card-yellow text-xs-center">
<div class="card-block">
<h4 class="card-title">{{ App\User::getUserSeleted('quizzes') }}</h4>
<p class="card-text">{{ getPhrase('quizzes')}}</p>
</div>
<a class="card-footer text-muted" href="{{URL_STUDENT_EXAM_ALL}}">
{{ getPhrase('view_all')}}
</a>
</div>
</div>

<div class="col-md-4">
<div class="card card-green text-xs-center">
<div class="card-block">
<h4 class="card-title">{{  App\User::getUserSeleted('lms_categories') }}</h4>
<p class="card-text">LMS {{ getPhrase('categories')}}</p>
</div>
<a class="card-footer text-muted" href="{{ URL_STUDENT_LMS_CATEGORIES }}">
{{ getPhrase('view_analysis')}}
</a>
</div>
</div>-->


</div>

<div class="row"><?php $ids=[];?>
@for($i=0; $i<count($chart_data); $i++)
<?php 
$newid = 'myChart'.$i;
$ids[] = $newid; ?>
<div class="col-md-6">  				  <div class="panel panel-primary dsPanel">				   				    <div class="panel-body" >



<canvas id="{{$newid}}" width="100" height="60"></canvas>					   </div>				  </div>				</div>

@endfor	
 			
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@stop

@section('footer_scripts')
@include('common.chart', array($chart_data,'ids' =>$ids));
@stop