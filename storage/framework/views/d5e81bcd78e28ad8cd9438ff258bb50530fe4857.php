<title><?php echo e($config['TITLE']->value); ?></title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#000000">
<meta name="keywords" content="<?php echo e($config['TITLE']->value); ?>" />
<meta name="description" content="<?php echo e($config['TITLE']->value); ?>">
<meta name="author" content="hieunguyen">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- Bootstrap CSS -->
<link rel="icon" type="image/png" href="<?php echo e(imgApp($config['FAVICON']->value,[],0,0,true)); ?>">

<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/fonts/icomoon/style.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/jquery-ui.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/owl.carousel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/owl.theme.default.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/owl.theme.default.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/confirm/confirm.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/jquery.fancybox.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/bootstrap-datepicker.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('/frontend/fonts/flaticon/font/flaticon.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/pnotify/pnotify.custom.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/aos.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/font-awesome/css/all.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/style.css?t='.time())); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/frontend/css/haribo-2023/main.css?t='.time())); ?>">
<script src="<?php echo e(asset('/frontend/js/jquery-3.3.1.min.js')); ?>"></script>

<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/frontend/widgets/head.blade.php ENDPATH**/ ?>