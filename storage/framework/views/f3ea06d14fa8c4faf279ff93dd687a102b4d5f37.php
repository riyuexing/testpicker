<?php $__env->startSection('header_scripts'); ?>

<link href="<?php echo e(CSS); ?>ajax-datatables.css" rel="stylesheet">

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

					<div class="panel-heading">

						<?php if($user->subscription_ends_at != null): ?>
							<a href="<?php echo e(route('subscription.list')); ?>" class="btn btn-primary pull-right">Extend Subscription</a>
						<?php else: ?>
							<a href="<?php echo e(route('subscription.list')); ?>" class="btn btn-primary pull-right">Get Subscription</a>
						<?php endif; ?>

						<h1><?php echo e($title); ?></h1>


					</div>

					<div class="panel-body packages">

						<div class="table-responsive"> 

						<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">

							<thead>

								<tr>
								<?php if($is_parent): ?>
								 <th><?php echo e(getPhrase('image')); ?></th>
                                    <th><?php echo e(getPhrase('user_name')); ?></th>
                                <?php endif; ?>

									<th><?php echo e(getPhrase('name')); ?></th>

									<th><?php echo e(getPhrase('plan_type')); ?></th>

									<th><?php echo e(getPhrase('start_date')); ?></th>

									<th><?php echo e(getPhrase('end_date')); ?></th>

									<th><?php echo e(getPhrase('paid_from')); ?></th>

									<th><?php echo e(getPhrase('datetime')); ?></th>

									<th><?php echo e(getPhrase('status')); ?></th>

									

								  

								</tr>

							</thead>

							 

						</table>

						</div>



					</div>

				</div>

			</div>

			<!-- /.container-fluid -->

		</div>

<?php $__env->stopSection(); ?>

 



<?php $__env->startSection('footer_scripts'); ?>

  

 <?php echo $__env->make('common.datatables', array('route'=>URL_PAYPAL_PAYMENTS_AJAXLIST.$user->slug, 'route_as_url' => TRUE), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

 <?php echo $__env->make('common.deletescript', array('route'=>'/exams/quiz/delete/'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<?php $__env->stopSection(); ?>


<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>