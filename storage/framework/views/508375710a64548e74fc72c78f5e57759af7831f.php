<!-- Basic -->
<meta charset="UTF-8">

<title><?php echo e($pagename??__('backend.page.title :site',['site'=>'Backend'])); ?></title>
<meta name="keywords" content=""<?php echo e($pagename??__('backend.page.title :site',['site'=>'Backend'])); ?>" />
<meta name="description" content="<?php echo e($pagename??__('backend.page.title :site',['site'=>'Backend'])); ?>">
<meta name="author" content="hieunguyen">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="shortcut icon" href="<?php echo e(asset('/backend')); ?>/img/favicon.png">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/animate/animate.css">
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/select2/css/select2.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/confirm/confirm.min.css" />
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/jquery-ui/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/jquery-ui/jquery-ui.theme.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/morris/morris.css" />
<?php if(isset($styles)): ?>
    <?php $__currentLoopData = $styles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/backend')); ?><?php echo e($sty); ?>" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/animate/animate.css">
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/vendor/pnotify/pnotify.custom.css" />
<!-- Theme CSS -->
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/css/theme.css" />

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="<?php echo e(asset('/backend')); ?>/css/custom.css">

<!-- Head Libs -->
<script>
    var BASE = '<?php echo e(asset('/backend')); ?>/';
    var PUBLIC = '<?php echo e(asset('')); ?>';
    var DOMAIN = '<?php echo e(url('/')); ?>';
</script>
<script src="<?php echo e(asset('/backend')); ?>/vendor/modernizr/modernizr.js"></script>
<script src="<?php echo e(asset('/backend')); ?>/master/style-switcher/style.switcher.localstorage.js"></script>
<script src="<?php echo e(asset('/backend')); ?>/vendor/jquery/jquery.js"></script>
<style>
    #styleSwitcher{
        display: none;
    }
</style>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/backend/widgets/head.blade.php ENDPATH**/ ?>