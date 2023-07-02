<div class="site-section" id="about-section">

    <div class="container">
	<div class="row mb-5">
        <div class="col-12 text-center bg-purple rounded">
          <h2 class="h1 site-section-heading  text-light  pt-3 text-uppercase"><?php echo e(__('About Us')); ?></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-md-4 d-flex align-items-center bg-xanh p-0">
                <img src="<?php echo e(imgApp($config['ABOUTIMG1']->value,[],0,0,true)); ?>" alt="Image" class="img-fluid mx-auto">
            </div>
            <div class="col-md-4 bg-dat p-0 d-flex align-items-center" >
                <div class="row">
                    <div class="col-12 ">
                        <div class="lead text-light my-2">
                            <?php echo $config['ABOUTCONTENT1']->value; ?>

                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-4 d-flex align-items-center bg-xanh2 p-0" >
                <img src="<?php echo e(imgApp($config['ABOUTIMG2']->value,[],0,0,true)); ?>" alt="Image" class="img-fluid mx-auto">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 bg-dat p-0 d-flex align-items-center">
                <div class="row">
                    <div class="col-12 ">
                        <div class="lead text-light my-2">
                            <?php echo $config['ABOUTCONTENT2']->value; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center bg-xanh2 p-0" >
                <img src="<?php echo e(imgApp($config['ABOUTIMG3']->value,[],0,0,true)); ?>" alt="Image" class="img-fluid mx-auto">
            </div>
			<div class="col-md-4 d-flex align-items-center bg-dat p-0" >
                <img src="<?php echo e(imgApp($config['ABOUTIMG4']->value,[],0,0,true)); ?>" alt="Image" class="img-fluid mx-auto">
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/frontend/widgets/about2.blade.php ENDPATH**/ ?>