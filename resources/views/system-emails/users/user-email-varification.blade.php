 @include('system-emails.header')
 
 <div class="row">
    <div class="col-lg-12" style="margin:65px 0px;">
	  <h5 class="text-center" style="font-size:20px;font-weight:600;">Forgot Password</h5>
	</div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
    	<p style="font-size:20px;margin:11px 0;">Dear {{$user_name}}, </p>
      <p style="font-size:20px;margin:11px 0;">Greetings,</p>
	<p style="font-size:20px;margin:11px 0;">Your Resend Email Varification Link Request Is Received Successfully.Here Is The New Link</p>
  
  <p style="font-size:20px;margin:11px 0;">Username / Email : {{$username}} / {{$email}}</p>
  <p style="font-size:20px;margin:11px 0;">Link : <a href="{{$token}}"> Click Here To Verify Email</a></p>

<p style="font-size:20px;margin:11px 0;">Sincerely, </p>
<p style="font-size:20px;margin:11px 0;">Customer Support Services</p>

	</div>
   </div>

@include('system-emails.disclaimer')