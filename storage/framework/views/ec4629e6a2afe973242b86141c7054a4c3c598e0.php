<?php $__env->startSection('content'); ?>

<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">

<li><?php echo e($title); ?></li>
</ol>
</div>
</div>
<div class="row">
	<div class="col-md-4 col-sm-6">
 		<div class="media state-media box-ws">
 			<div class="media-left">
 				<a href="<?php echo e(URL_STUDENT_EXAM_CATEGORIES); ?>"><div class="state-icn bg-icon-info"><i class="fa fa-list-alt"></i></div></a>
 			</div>
 			<div class="media-body">
 				<h4 class="card-title"><?php echo e(count(App\User::getUserSeleted('categories'))); ?></h4>
				<a href="<?php echo e(URL_STUDENT_EXAM_CATEGORIES); ?>"><?php echo e(getPhrase('exam_categories')); ?></a>
 			</div>
 		</div>
 	</div>
 	<div class="col-md-4 col-sm-6">
 		<div class="media state-media box-ws">
 			<div class="media-left">
 				<a href="<?php echo e(URL_STUDENT_EXAM_ALL); ?>"><div class="state-icn bg-icon-pink"><i class="fa fa-desktop"></i></div></a>
 			</div>
 			<div class="media-body">
 				<h4 class="card-title"><?php echo e(App\User::getUserSeleted('quizzes')); ?></h4>
				<a href="<?php echo e(URL_STUDENT_EXAM_ALL); ?>"><?php echo e(getPhrase('Exams')); ?></a>
 			</div>
 		</div>
 	</div>
 	<div class="col-md-4 col-sm-6">
 		<div class="media state-media box-ws">
 			<div class="media-left">
 				<a href="<?php echo e(URL_STUDENT_LMS_CATEGORIES); ?>"><div class="state-icn bg-icon-purple"><i class="fa fa-tv"></i></div></a>
 			</div>
 			<div class="media-body">
 				<h4 class="card-title"><?php echo e(App\User::getUserSeleted('lms_categories')); ?></h4>
				<a href="<?php echo e(URL_STUDENT_LMS_CATEGORIES); ?>">LMS <?php echo e(getPhrase('categories')); ?></a>
 			</div>
 		</div>
 	</div>
 	
<!-- <div class="col-md-4">
<div class="card card-blue text-xs-center">
<div class="card-block">
<h4 class="card-title"><?php echo e(count(App\User::getUserSeleted('categories'))); ?></h4>
<p class="card-text"><?php echo e(getPhrase('quiz_categories')); ?></p>
</div>
<a class="card-footer text-muted" href="<?php echo e(URL_STUDENT_EXAM_CATEGORIES); ?>">
<?php echo e(getPhrase('view_all')); ?>

</a>
</div>
</div>

<div class="col-md-4">
<div class="card card-yellow text-xs-center">
<div class="card-block">
<h4 class="card-title"><?php echo e(App\User::getUserSeleted('quizzes')); ?></h4>
<p class="card-text"><?php echo e(getPhrase('quizzes')); ?></p>
</div>
<a class="card-footer text-muted" href="<?php echo e(URL_STUDENT_EXAM_ALL); ?>">
<?php echo e(getPhrase('view_all')); ?>

</a>
</div>
</div>

<div class="col-md-4">
<div class="card card-green text-xs-center">
<div class="card-block">
<h4 class="card-title"><?php echo e(App\User::getUserSeleted('lms_categories')); ?></h4>
<p class="card-text">LMS <?php echo e(getPhrase('categories')); ?></p>
</div>
<a class="card-footer text-muted" href="<?php echo e(URL_STUDENT_LMS_CATEGORIES); ?>">
<?php echo e(getPhrase('view_analysis')); ?>

</a>
</div>
</div>-->


</div>

<div class="row"><?php $ids=[];?>
<?php for($i=0; $i<count($chart_data); $i++): ?>
<?php 
$newid = 'myChart'.$i;
$ids[] = $newid; ?>
<div class="col-md-6">  				  <div class="panel panel-primary dsPanel">				   				    <div class="panel-body" >



<canvas id="<?php echo e($newid); ?>" width="100" height="60"></canvas>					   </div>				  </div>				</div>

<?php endfor; ?>	
 			
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php echo $__env->make('common.chart', array($chart_data,'ids' =>$ids), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.student.studentlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>