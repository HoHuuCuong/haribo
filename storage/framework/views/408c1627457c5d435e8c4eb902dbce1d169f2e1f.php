<header class="page-header">
<h2><?php echo e($pagename); ?></h2>

    <div class="right-wrapper text-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo e(route('b.home')); ?>">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $href=>$britem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($href!='#'): ?>
                <li><a href="<?php echo e($href); ?>"><span><?php echo e($britem); ?></span></a></li>
                <?php else: ?>
                <li><span><?php echo e($britem); ?></span></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
    </div>
</header>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/backend/widgets/header_title.blade.php ENDPATH**/ ?>