<?php $__env->startSection('content'); ?>

   <div class="cs-gray-bg" style="margin-top: 101px;">
        <div class="container">
            <div class="row cs-row">
                <!-- Side Bar -->
                <div class="col-md-3">
                    <!-- Icon List  -->
                    <ul class="cs-icon-list">

                    <?php if(count($lms_cates)): ?>

                         <?php $__currentLoopData = $lms_cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <li id=<?php echo e($category->slug); ?>><a href="<?php echo e(URL_VIEW_ALL_LMS_CATEGORIES.'/'.$category->slug); ?>"><?php echo e($category->category); ?></a></li>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	                   <?php else: ?>

	                     <h4><?php echo e(getPhrase('no_categories_are_available')); ?></h4> 

	               <?php endif; ?> 
                       
                    </ul>
                    <!-- /Icon List  -->
                </div>
                <!-- Main Section -->
                 <?php if(count($all_series)): ?>
                <div class="col-md-9">
                    <!-- Product Filter Bar -->
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="cs-filter-bar clearfix">
                                <li class="active"><a href="#"><?php echo e($title); ?> <?php echo e(getPhrase('series')); ?></a></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Products Grid -->
                    <div class="row">
                
                    <?php $__currentLoopData = $all_series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
                        <div class="col-md-4 col-sm-6">
                        <!-- Product Single Item -->
                       <div class="cs-product cs-animate">
                            <a href="<?php echo e(URL_VIEW_LMS_CONTENTS.$series->slug); ?>">
                                <div class="cs-product-img">
                                    <?php if($series->image): ?>
                                    <img src="<?php echo e(IMAGE_PATH_UPLOAD_LMS_SERIES.$series->image); ?>" alt="exam" class="img-responsive">
                                    <?php else: ?>
                                    <img src="<?php echo e(IMAGE_PATH_EXAMS_DEFAULT); ?>" alt="exam" class="img-responsive">
                                    <?php endif; ?>
                                </div>
                            </a>
                            <div class="cs-product-content mt-0">
                             <a href="<?php echo e(URL_VIEW_LMS_CONTENTS.$series->slug); ?>" class="cs-product-title"><?php echo e(ucfirst($series->title)); ?></a>

                               <div class="text-center mt-2">
                                 <a href="<?php echo e(URL_VIEW_LMS_CONTENTS.$series->slug); ?>" class=" btn btn-blue btn-sm btn-radius">View </a>
                            </div>
                            </div>
                            
                        </div>
                        <!-- /Product Single Item -->
                    </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                   
                       
                       
                    </div>
                    <!-- Pagination -->
              
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <ul class="pagination cs-pagination ">
                                <?php echo e($all_series->links()); ?>

                            </ul>
                        </div>
                    </div>
                    <!-- /Pagination -->
                    
                </div>
                 <?php endif; ?>
            </div>
        </div>
    </div>


  

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

<script>
	var my_slug  = "<?php echo e($lms_cat_slug); ?>";

	if(!my_slug){

        $(".cs-icon-list li").first().addClass("active");
    }
    else{

    	$("#"+my_slug).addClass("active");
    }


    

</script>
 
 
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sitelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>