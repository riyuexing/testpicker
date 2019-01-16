<?php $__env->startSection('header_scripts'); ?>
<link href="<?php echo e(CSS); ?>ajax-datatables.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(CSS); ?>price-table.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
			<div class="container-fluid">
				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo e(PREFIX); ?>"><i class="mdi mdi-home"></i></a> </li>
							<li><?php echo e($title); ?></li>
						</ol>
					</div>
				</div>
								
				<!-- /.row -->
				<div class="panel panel-custom">
					<div class="panel-body packages">


	<div class="pricing-wrapper clearfix">
        
        <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     
        <div class="pricing-table">

            <?php if($subscription->title == 'Platinum'): ?>
                <h3 class="pricing-title" style="background: #D7D3C8"><?php echo e($subscription->title); ?></h3>
            <?php elseif($subscription->title == 'Silver'): ?>
                <h3 class="pricing-title" style="background: #CBCBCB"><?php echo e($subscription->title); ?></h3>
            <?php elseif($subscription->title == 'Gold'): ?>
                <h3 class="pricing-title" style="background: #CB9C4E"><?php echo e($subscription->title); ?></h3>
            <?php endif; ?>


            <div class="price">&#x20b9;<?php echo e($subscription->cost); ?><sup>/ INR</sup></div>
            <!-- Feature -->
                <ul class="table-list">
                    <li>All Free Feature</li>
                    <li>All Paid Feature</li>
                    <li>Duration <?php echo e($subscription->validity); ?> Days</li>
                </ul>
            <!-- Buy Button -->
                <div class="table-buy">
                    <p>&#x20b9;<?php echo e($subscription->cost); ?><sup>/ INR</sup></p>
                    <a href="<?php echo e(SUBSCRIPTION_PLAN.$subscription->slug); ?>" class="pricing-action">Subscribe</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>