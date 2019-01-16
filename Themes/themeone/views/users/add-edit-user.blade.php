@extends($layout)
@section('content')<div id="page-wrapper">
<div class="container-fluid">
<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="{{PREFIX}}"><i class="mdi mdi-home"></i></a> </li>
@if(checkRole(getUserGrade(2)))
<li><a href="{{URL_USERS}}">{{ getPhrase('users')}}</a> </li>
<li class="active">{{isset($title) ? $title : ''}}</li>
@else
<li class="active">{{$title}}</li>
@endif
</ol>
</div>
</div>
@include('errors.errors')
<!-- /.row -->

<div class="panel panel-custom col-lg-6  col-lg-offset-3">
<div class="panel-heading">
@if(checkRole(getUserGrade(2))) 
<div class="pull-right messages-buttons"><a href="{{URL_USERS}}" class="btn  btn-primary button" >{{ getPhrase('list')}}</a></div>
@endif
<h1>{{ $title }}  </h1>
</div>

<div class="panel-body form-auth-style">
<?php $button_name = getPhrase('create'); ?>
@if ($record)
<?php $button_name = getPhrase('update'); ?>
{{ Form::model($record, 
array('url' => URL_USERS_EDIT.$record->slug, 
'method'=>'patch','novalidate'=>'','name'=>'formUsers ', 'files'=>'true' )) }}
@else
{!! Form::open(array('url' => URL_USERS_ADD, 'method' => 'POST', 'novalidate'=>'','name'=>'formUsers ', 'files'=>'true')) !!}
@endif

@if (Auth::user()->otp_form == 0)
    @include('users.form_elements', array('button_name'=> $button_name, 'record' => $record))
@endif
{!! Form::close() !!}
@if (Auth::user()->otp_form == 1)
    <form action="{{ route('verify.otp') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
        <div class="form-group">
            <input type="number" name="otp" placeholder="Enter Otp" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit Otp" class="btn btn-primary">
        </div>
    </form>
    <p>Change Mobile Number <a href="{{ route('change.phone') }}"  >Click Me</a></p>
    <p>Resend Otp <a href="{{ route('verify.phone') }}" >Click Me</a></p>
@endif
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('footer_scripts')
@include('common.validations')
@include('common.alertify')
 <script>
 	var file = document.getElementById('image_input');

file.onchange = function(e){
    var ext = this.value.match(/\.([^\.]+)$/)[1];
    switch(ext)
    {
        case 'jpg':
        case 'jpeg':
        case 'png':

     
            break;
        default:
               alertify.error("{{getPhrase('file_type_not_allowed')}}");
            this.value='';
    }
};
 </script>
@stop