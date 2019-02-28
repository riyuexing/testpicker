@extends('layouts.admin.adminlayout')

@section('header_scripts')
<link rel="stylesheet" type="text/css" href="{{CSS}}select2.css">
@stop

@section('content')
<div id="page-wrapper">
			<div class="container-fluid">
				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="/"><i class="mdi mdi-home"></i></a> </li>
							<li><a href="{{URL_QUIZ_SUB_CATEGORIES}}">{{ getPhrase('sub_category')}}</a> </li>
							<li class="active">{{isset($title) ? $title : ''}}</li>
						</ol>
					</div>
				</div>
					@include('errors.errors')
				<!-- /.row -->
				
					<div class="panel panel-custom col-lg-6 col-lg-offset-3">
					<div class="panel-heading">
						<div class="pull-right messages-buttons">
							<a href="{{URL_QUIZ_SUB_CATEGORIES}}" class="btn  btn-primary button" >{{ getPhrase('list')}}</a>
						</div>
					<h1>{{ $title }}  </h1>
					</div>
					<div class="panel-body  form-auth-style" ng-controller="angTopicsController">
					<?php $button_name = getPhrase('create'); ?>
					@if ($record)
					 <?php $button_name = getPhrase('update'); ?>
						{{ Form::model($record, 
						array('url' => URL_QUIZ_SUB_CATEGORY_EDIT.'/'.$record->slug, 
						'method'=>'patch' ,'novalidate'=>'','name'=>'formTopics ')) }}
					@else
						{!! Form::open(array('url' => URL_QUIZ_SUB_CATEGORY_ADD, 'method' => 'POST', 
						'novalidate'=>'','name'=>'formTopics ')) !!}
					@endif

					 @include('exams.quizsubcategories.form_elements', 
					 array('button_name'=> $button_name),
					 array('subjects'=>$subjects))
					 
					{!! Form::close() !!}
					 
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
@stop
