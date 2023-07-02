
<!doctype html>
<html class="fixed">
    <head>
        <?php echo $__env->make('backend.widgets.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
	<body>
        <?php echo $__env->yieldContent('container'); ?>
        <?php echo $__env->make('backend.widgets.loginjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</body>
</html>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/backend/empty.blade.php ENDPATH**/ ?>