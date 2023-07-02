<!Doctype html>
<html lang="en">

<head>
    <?php echo $__env->make('frontend.widgets.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <?php echo $config['ANACODE']->value; ?>

    <div class="site-wrap">
        <?php echo $__env->make('frontend.widgets.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.widgets.space', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('frontend.widgets.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('frontend.widgets.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/frontend/master.blade.php ENDPATH**/ ?>