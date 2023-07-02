<section class="site-section" id="work-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-12 text-center bg-purple rounded">
        <h2 class="h1 site-section-heading  text-light pt-3 text-uppercase"><?php echo e(__('Sales product')); ?></h2>
        </div>
		<div class="col-md-12 text-center">
          <p class="lead pt-3">
            <?php echo $config['BOXPRO']->value; ?>

          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6  col-md-4 col-lg-4">
          <a href="<?php echo e(imgApp($p->image,[],0,0,1)); ?>" class="media-1" data-fancybox="gallery">
            <img src="<?php echo e(imgApp($p->image,[],0,0,1)); ?>" alt="<?php echo e($p->name); ?>" class="img-fluid">
            <div class="media-1-content">
              <span class="category">Haribo</span>
              <h2><?php echo e($p->name); ?></h2>
            </div>
          </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </section>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/frontend/widgets/product.blade.php ENDPATH**/ ?>