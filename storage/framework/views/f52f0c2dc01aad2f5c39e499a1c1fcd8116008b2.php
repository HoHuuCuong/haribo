<section class="site-section" id="work-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-12 text-center bg-purple rounded">
                <h2 class="h1 site-section-heading  text-light pt-3 text-uppercase"><?php echo e(__('Danh sách mã dự thưởng trúng
                    giải đợt 2')); ?></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-4 mb-4" data-aos="fade-up">
                <img src="<?php echo e(asset('frontend/images/bgrs.png')); ?>" class="img-fluid"/>
            </div>
            <div class="col-8 mb-4" data-aos="fade-up">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="nhat-tab" data-toggle="tab" href="#nhat" role="tab"
                            aria-controls="nhat" aria-selected="true"><?php echo e(count($nhats)); ?> Giải nhất</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nhi-tab" data-toggle="tab" href="#nhi" role="tab"
                            aria-controls="nhi" aria-selected="false"><?php echo e(count($nhis)); ?> Giải nhì</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="nhat" role="tabpanel" aria-labelledby="nhat-tab">
                        <div class="row mt-4">
                            <div class="col-12">
                                <input class="form-control mr-sm-2 search" type="text" placeholder="Tìm kiếm"
                                    aria-label="Tìm kiếm">
                            </div>
                        </div>
                        <ul class="ketqua" id="nhatkq">
                            <li class="item-rs row mb-2"><span class="col-6"><strong>Số điện thoại</strong></span><span class="col-6"><strong>Mã trúng giải</strong></span></li>
                            <?php $__currentLoopData = $nhats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li id="item-<?php echo e($item->code); ?>" class="item-rs row"><span class="col-6"><?php echo e($item->phone); ?></span><span class="col-6"><?php echo e($item->code); ?></span></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <ul>
                    </div>
                    <div class="tab-pane fade" id="nhi" role="tabpanel" aria-labelledby="nhi-tab">
                        <div class="row mt-4">
                            <div class="col-12">
                                <input class="form-control mr-sm-2 search" type="text" placeholder="Tìm kiếm"
                                    aria-label="Tìm kiếm">
                            </div>
                        </div>
                        <ul class="ketqua" id="nhikq">
                            <li class="item-rs row mb-2"><span class="col-6"><strong>Số điện thoại</strong></span><span class="col-6"><strong>Mã trúng giải</strong></span></li>
                            <?php $__currentLoopData = $nhis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li id="item-<?php echo e($item->code); ?>" class="item-rs row"><span class="col-6"><?php echo e($item->phone); ?></span><span class="col-6"><?php echo e($item->code); ?></span></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/frontend/widgets/result.blade.php ENDPATH**/ ?>