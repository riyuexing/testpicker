<?php $__env->startSection('header_scripts'); ?>
<style>
	.error {
      color: red;
   }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

 <!-- Page Banner -->
    <section class="cs-primary-bg cs-page-banner" style="margin-top: 110px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="cs-page-banner-title"><?php echo e(getPhrase('contact_our_experts_now')); ?></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- /Page Banner -->

    <!-- Contact Us Section -->
    <div class="container">
      <br>
        <div class="row btm50">
            <div class="col-md-8 cs-right-pad-lg">
                <h4 class="cs-section-title-lg"><?php echo e(getPhrase('feel_free_to_contact')); ?></h4>
               <!-- Contact form -->
                <div class="row">
                   <?php echo Form::open(array('url'=>URL_SEND_CONTACTUS, 'name'=>'user-contact' ,'id'=>'user-contact')); ?>


                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="NAME *" name="name">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="email" class="form-control" placeholder="EMAIL *" name="email">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="number" class="form-control" placeholder="PHONE" name="phone">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="SUBJECT" name="subject">
                        </div>
                        <div class="form-group col-sm-12">
                            <textarea rows="6" class="form-control" placeholder="YOUR MESSAGE *" name="message"></textarea>
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-primary btn-shadow"><?php echo e(getPhrase('send_message')); ?></button>
                        </div>

                    <?php echo Form::close(); ?>


                </div>
            </div>
            <!-- Contact Address -->
            <div class="col-md-4">
                <h4 class="cs-section-title-lg"><?php echo e(getPhrase('our_contact_details')); ?></h4>
                <!--  Icon Text -->
                <div class="cs-icon-text">
                    <div class="media-left">
                        <i class="fa fa-map-marker cs-icon"></i>
                    </div>
                    <div class="media-body">
                        <p><?php echo e(getSetting('site_address','site_settings')); ?></p>
                        <p><?php echo e(getSetting('site_country','site_settings')); ?></p>
                        <p><?php echo e(getSetting('site_state','site_settings')); ?></p>
                        <p><?php echo e(getSetting('site_city','site_settings')); ?></p>
                    </div>
                </div>
                <!-- Icon Text  -->
                <!--  Icon Text -->
                <div class="cs-icon-text">
                    <div class="media-left">
                        <i class="fa fa-phone cs-icon"></i>
                    </div>
                    <div class="media-body">
                        <p><?php echo e(getSetting('site_phone','site_settings')); ?></p>
                    </div>
                </div>
             
                <!-- Icon Text  -->
            </div>
        </div>
    </div>
    <!-- /Contact Us Section -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <script src='https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js'></script>
        <script>

                $(function() {
                  
                  $("form[name='user-contact']").validate({
                   
                    rules: {
                     
                      name: "required",
                      phone: "required",
                      subject: "required",
                      message: "required",
                      email: {
                        required: true,
                        
                        email: true
                      },
                    
                    },
                   
                    messages: {
                      name: "<?php echo e(getPhrase('Please enter your Name')); ?>",
                      message: "<?php echo e(getPhrase('Please enter your Message')); ?>",
                      subject: "<?php echo e(getPhrase('Please enter your Subject')); ?>",
                      phone: "<?php echo e(getPhrase('Please enter your Phone Number')); ?>",

                    
                      email: {
                        required: "<?php echo e(getPhrase('Please provide a valid email')); ?>",
                        email: "<?php echo e(getPhrase('Please enter a valid email address')); ?>"
                      }
                    },
                    
                    submitHandler: function(form) {
                      form.submit();
                    }
                  });
                });


                function ContactUsConfirmation(){
                    

				   $(function(){
				            PNotify.removeAll();
				            new PNotify({
				                title: "<?php echo e(getPhrase('congratulations')); ?>",
				                text: "<?php echo e(getPhrase('your_message_was_sent_our_team_will_contact_you_soon')); ?>",
				                type: "success",
				                delay: 4000,
				                shadow: true,
				                width: "300px",
				                
				                animate: {
				                            animate: true,
				                            in_class: 'fadeInLeft',
				                            out_class: 'fadeOutRight'
				                        }
				                });
				        });

                 }



        </script>     

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sitelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>