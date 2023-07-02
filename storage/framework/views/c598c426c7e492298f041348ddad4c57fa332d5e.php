<!doctype html>
<html class="fixed">

<head>
    <?php echo $__env->make('backend.widgets.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <section class="body">
        <?php echo $__env->make('backend.widgets.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="inner-wrapper">
            <?php echo $__env->make('backend.widgets.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section role="main" class="content-body" data-loading-overlay>
                <?php echo $__env->make('backend.widgets.header_title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- start: page -->
                <?php echo $__env->yieldContent('container'); ?>
                <!-- end: page -->
            </section>
        </div>
        <?php echo $__env->make('backend.widgets.header_title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    <?php echo $__env->make('backend.widgets.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/backend/master.blade.php ENDPATH**/ ?>