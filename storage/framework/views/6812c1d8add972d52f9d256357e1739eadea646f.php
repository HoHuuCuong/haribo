<a href="#" class="bg-primary py-2 d-none">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md10"><h2 class="text-white"><?php echo e(__('Let\'s Get Started')); ?></h2></div>
      </div>
    </div>
  </a>
<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <h2 class="footer-heading mb-4"><?php echo e(__('About Us')); ?></h2>
              <p>
                   Haribo là thương hiệu kẹo dẻo cao cấp lớn nhất thế giới, được thành lập năm 1921 tại
                        Đức bởi Johannes (Hans) Riegel.
                </ul>
              </p>
            </div>
            <div class="col-md-6 ml-auto">
              <h2 class="footer-heading mb-4"><?php echo e(__('Features')); ?></h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo e(route('f.registration')); ?>"><?php echo e(__('Registration')); ?></a></li>
                <li><a href="<?php echo e(route('f.products')); ?>"><?php echo e(__('Products')); ?></a></li>
                <li><a href="<?php echo e(route('f.program')); ?>"><?php echo e(__('Program rules')); ?></a></li>
                <li><a href="<?php echo e(route('f.contact')); ?>"><?php echo e(__('Contact Us')); ?></a></li>
              </ul>
            </div>
            <div class="col-md-3 d-none">
              <h2 class="footer-heading mb-4"><?php echo e(__('Follow Us')); ?></h2>
              <?php if($config['FB']->value): ?>
                <a href="<?php echo e($config['FB']->value); ?>" target="_new" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <?php endif; ?>
              <?php if($config['TW']->value): ?>
              <a href="<?php echo e($config['TW']->value); ?>" target="_new" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <?php endif; ?>
              <?php if($config['IN']->value): ?>
              <a href="<?php echo e($config['IN']->value); ?>" target="_new" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <?php endif; ?>
              <?php if($config['LI']->value): ?>
              <a href="<?php echo e($config['LI']->value); ?>" target="_new" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-none">
          <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
          <form action="#" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
	<div class="container-fluid">
	<div class="row border-top text-center" style="position: relative;">
	<div class="bear-footer"><img src="<?php echo e(imgApp('/frontend/images/bear-standard.svg',[],0,0,true)); ?>" ></div>
        <div class="col-md-12" style="background-color:#582E90">
          <div class="pt-3">
          <p>
            <?php echo e($config['FOOTER']->value); ?>

          </p>
          </div>
        </div>
      </div>
	   </div>
  </footer>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/frontend/widgets/footer.blade.php ENDPATH**/ ?>