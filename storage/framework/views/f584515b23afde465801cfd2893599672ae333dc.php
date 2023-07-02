<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.widgets.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.widgets.place', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/frontend/products.blade.php ENDPATH**/ ?>