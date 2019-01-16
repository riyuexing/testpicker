 <?php echo $__env->make('system-emails.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
 <div class="row">
    <div class="col-lg-12" style="margin:65px 0px;">
	  <h5 class="text-center" style="font-size:20px;font-weight:600;">Forgot Password</h5>
	</div>
  </div>
  
   
   <div class="row">
    <div class="col-lg-12">
    	<p style="font-size:20px;margin:11px 0;">Dear <?php echo e($user_name); ?>, </p>
      <p style="font-size:20px;margin:11px 0;">Greetings,</p>
	<p style="font-size:20px;margin:11px 0;">Your Resend Email Varification Link Request Is Received Successfully.Here Is The New Link</p>
  
  <p style="font-size:20px;margin:11px 0;">Username / Email : <?php echo e($username); ?> / <?php echo e($email); ?></p>
  <p style="font-size:20px;margin:11px 0;">Link : <a href="<?php echo e($token); ?>"> Click Here To Verify Email</a></p>

<p style="font-size:20px;margin:11px 0;">Sincerely, </p>
<p style="font-size:20px;margin:11px 0;">Customer Support Services</p>

	</div>
   </div>

<?php echo $__env->make('system-emails.disclaimer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>