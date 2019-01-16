<?php $__env->startSection('content'); ?>

 

<div id="page-wrapper" ng-init="intilizeData(<?php echo e($item); ?>)" ng-controller="couponsController">



<?php echo Form::open(array('url' => URL_PAYNOW.$item->slug, 'method' => 'POST', 'id'=>'payform')); ?> 

								 

					<input type="hidden" name="item_name" id="item_name" ng-model="item_name" value="<?php echo e($item->slug); ?>">

					<input type="hidden" name="gateway" id="gateway" value="" >

				    <input type="hidden" name="type" ng-model="item_type" value="<?php echo e($item_type); ?>" >

					<input type="hidden" name="is_coupon_applied" id="is_coupon_applied"  value="0" >

					<input type="hidden" name="coupon_id" id="coupon_id"  value="0" >

					<input type="hidden" name="actual_cost" id="actual_cost" value="<?php echo e($item->cost); ?>" >

					<input type="hidden" name="discount_availed" id="discount_availed"  value="0" >

					<input type="hidden" name="after_discount" id="after_discount" value="<?php echo e($item->cost); ?>" >

					 <input type="hidden" name="parent_user" value="<?php echo e($parent_user); ?>">	

									 <?php 

									 		$selected_child_id = 0;

									 		if($parent_user) {

									 			if(count($children))

									 			{

									 				$selected_child_id = $children[0]->id;

									 			}

									 		}

									 ?>

									 <input type="hidden" name="parent_user" value="<?php echo e($parent_user); ?>">	

									 <input type="hidden" id="selected_child_id" name="selected_child_id" value="<?php echo e($selected_child_id); ?>">	

									<?php echo Form::close(); ?>






			<div class="container-fluid">

				<!-- Page Heading -->

				<div class="row">

					<div class="col-lg-12">

						<ol class="breadcrumb">

							<li><a href="<?php echo e(PREFIX); ?>"><i class="mdi mdi-home"></i></a> </li>

							<?php if($item_type=='combo' || $item_type=='exam'): ?>

							<li> <a href="<?php echo e(URL_STUDENT_EXAM_SERIES_LIST); ?>"><?php echo e(getPhrase('exam_series')); ?> </a> </li>

							<?php else: ?>

							<li> <a href="<?php echo e(URL_STUDENT_LMS_SERIES); ?>"><?php echo e(getPhrase('learning_management_series')); ?> </a> </li>

							<?php endif; ?>

							

							<li class="active"> <?php echo e($title); ?> </li>

						</ol>

					</div>

				</div>

				<!-- /.row -->

				<div class="panel panel-custom">

					 

					 

					<div class="panel-heading">

						<h1><?php echo e(getPhrase('checkout')); ?></h1>



					</div>

					<div class="panel-body">

						<div class="row">

							<div class="checkout-table-heading">

								<div class="col-md-6"><strong><?php echo e(getPhrase('item')); ?></strong></div>

								<div class="col-md-3 text-right"><strong><?php echo e(getPhrase('cost')); ?></strong></div>

								<div class="col-md-3 text-right"><strong><?php echo e(getPhrase('total')); ?></strong></div>

							</div>



						</div>

						

						<div class="row">

							<div class="ordered-item">

								<div class="col-md-6 centered">

									<div class="box">

										

									<?php if($item_type=='combo' || $item_type=='lms')	{

										$image = IMAGE_PATH_UPLOAD_LMS_DEFAULT;

										if($item->image)

											$image = IMAGE_PATH_UPLOAD_SERIES_THUMB.$item->image;

										$image_path = $image;

										



										if($item_type=='lms') {

											if($item->image)

											$image_path = IMAGE_PATH_UPLOAD_LMS_SERIES_THUMB.$item->image;

										}

									?>



										<i class="icon"><img class="icon-images" src="<?php echo e($image_path); ?>" alt="<?php echo e($item->title); ?>" height="70" width="70" ></i>

									<?php } ?>

										<h3><?php echo e($item->title); ?></h3>

										<p><?php echo e(getPhrase('valid_for').' '.$item->validity.' '.getPhrase('days')); ?></p>

									</div>

								</div>

								<div class="col-md-3  text-right">
									<strong><?php echo e(getCurrencyCode().$item->cost); ?></strong>
								</div>

								<div class="col-md-3  text-right">
								<strong><?php echo e(getCurrencyCode().$item->cost); ?></strong>
								</div>

							</div>

						</div>

						 

						<div class="row">

							<div class="ordered-item">

							

								<div class="col-md-6 centered">

									<div class="apply-coupon" >

								<?php if(getSetting('coupons', 'module') ==  '1'): ?>

									<div class="input-group" >

										<input type="text" ng-model="coupon_code" class="form-control apply-input-lg" placeholder="<?php echo e(getPhrase('enter_coupon_code')); ?>" ng-disabled="isApplied" >

										<span class="input-group-btn">

              								<button class="btn btn-success button apply-input-button" ng-click="validateCoupon('<?php echo e($item->slug); ?>','<?php echo e($item_type); ?>', <?php echo e($item->cost); ?>, <?php echo e($selected_child_id); ?>)" type="button" ng-disabled="isApplied"><?php echo e(getPhrase('apply')); ?></button>

              							</span> 

              						</div>

                  				<?php endif; ?>

									</div>

								</div>



								<div class="col-md-6 ">

									<ul class="budget">

										<li>

											<p class="pull-left light"><?php echo e(getPhrase('cart_subtotal')); ?></p>

											<p class="pull-right "><?php echo e(getCurrencyCode().$item->cost); ?></p>



										</li>

										<li>

											<p class="pull-left light"><?php echo e(getPhrase('discount')); ?></p>

											<p class="pull-right"><?php echo e(getCurrencyCode()); ?>


											<span contenteditable="false" ng-bind="ngdiscount">0</span></p>



										</li>

										<hr>

										<li class="order-total">

											<p class="pull-left"><?php echo e(getPhrase('order_total')); ?></p>

											<p class="pull-right "><?php echo e(getCurrencyCode()); ?>


											<span contenteditable="false" ng-bind="ngtotal"><?php echo e($item->cost); ?></span></p>



										</li>



									</ul>



								</div>



							</div>

						</div>



					 <?php if($parent_user): ?>

					 	<?php if(count($children)): ?>
					 	
							<div id="childrens_list_div">
							<?php echo $__env->make('student/payments/childrens-list', array('children'=>$children, 'item_type'=>$item_type, 'item_id'=>$item->id ) , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							</div>

						<?php else: ?>

							<h3><?php echo e(getPhrase('please_add_children_to_continue_payment')); ?></h3>

						<?php endif; ?>

					 <?php endif; ?>

					

					<?php 

							$is_eligible_for_payment = TRUE;

							if($parent_user) {

								if(!count($children))

									$is_eligible_for_payment = FALSE;

							}



					?>

					<?php if($is_eligible_for_payment): ?>

						<div class="row">

							<div class="col-md-12 text-center">

								<div class="payment-type">

									<div class="text-center">

									

									<?php 

									$payu = getSetting('payu', 'module'); 

									$paypal = getSetting('paypal', 'module'); 

									$offline = getSetting('offline_payment', 'module'); 

									$razorpay_gateway = getSetting('razorpay', 'module'); 
                                      
                                    if($razorpay_gateway == '1'){
                 
                                    
                                   ?>

                                    <button onclick="submitForm('razorpay');" class="btn-lg btn button btn-primary"><i class="icon-razorpay"></i><?php echo e(getPhrase('razorpay')); ?></button>	

                                    <?php }

									if($payu == '1'){ 

									?>

									<button type="submit" onclick="submitForm('payu');"  class="btn-lg btn button btn-card"><i class="icon-credit-card"></i> <?php echo e(getPhrase('payu')); ?></button> 

									<?php } 



									if($paypal=='1') {

									?>

									

									<button type="submit" class="btn-lg btn button btn-paypal" onclick="submitForm('paypal');"><i class="icon-paypal"></i> <?php echo e(getPhrase('paypal')); ?></button>

									<?php } 

									if($offline=='1') {

									?>

									<button type="submit" class="btn-lg btn button btn-info" onclick="submitForm('offline');" data-toggle="tooltip" data-placement="right" title="<?php echo e(getPhrase('click_here_to_update_payment_details')); ?>"><i class="fa fa-money" ></i> <?php echo e(getPhrase('offline_payment')); ?></button>

									<?php } ?>

									</div>

								</div>

							</div>

						</div>

					<?php endif; ?>

					</div>

				 



				</div>

			</div>

		

<script type="text/javascript">

	function submitForm(gatewayType) {

		$('#gateway').val(gatewayType);

		$('#payform').submit();

	}

</script>



</div>

		<!-- /#page-wrapper -->



			



<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>

<?php echo $__env->make('coupons.scripts.js-scripts', array('item'=>$item), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('common.alertify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   

<script>


     var options = {
  
    "key"        : "<?php echo e(env('RAZORPAY_APIKEY')); ?>",
    "amount"     :  100 * 100, // 2000 paise = INR 20
    "name"       : "Merchant Name",
    "description": "Purchase Description",
    
    "handler": function (response){
        alert(response.razorpay_payment_id);
        $('#razorpay_payment_id').val(response.razorpay_payment_id);
        $('#paymentform').submit();
    },
    "prefill": {
        "name": "Harshil Mathur",
        "email": "harshil@razorpay.com"
    },
    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#2397c7"
    }
};
var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){

    rzp1.open();
    e.preventDefault();
}




</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>