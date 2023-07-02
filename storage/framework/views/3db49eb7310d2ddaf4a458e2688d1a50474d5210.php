
<?php echo $__env->make('frontend.widgets.mobilemenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header class="site-navbar py-2 py-md-4  js-sticky-header site-navbar-target bg-purple" role="banner">

    <div class="container">
      <div class="row align-items-center">

        <div class="col-11 col-xl-2">
        <h1 class="mb-0 site-logo"><a href="<?php echo e(route('f.home')); ?>" class="text-black h2 mb-0"><img src="<?php echo e(imgApp($config['LOGO']->value,[],0,0,true)); ?>"/></a></h1>
        </div>
        <div class="col-12 col-md-10 d-none d-xl-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li><a href="<?php echo e(route('f.home')); ?>" class="nav-link"><?php echo e(__('Home')); ?></a></li>
                <li><a href="<?php echo e(route('f.registration')); ?>" class="nav-link"><?php echo e(__('Registration')); ?></a></li>
              <li>
                <a href="<?php echo e(route('f.program')); ?>" class="nav-link"><?php echo e(__('Program rules')); ?></a>
              </li>
              <li>
                <a href="<?php echo e(route('f.products')); ?>" class="nav-link"><?php echo e(__('Products')); ?></a>
              </li>
              <li>
                <a href="<?php echo e(route('f.about')); ?>" class="nav-link"><?php echo e(__('About Us')); ?></a>
              </li>
              <li>
                <a href="<?php echo e(route('f.contact')); ?>" class="nav-link"><?php echo e(__('Contact')); ?></a>
              </li>
            </ul>
          </nav>
        </div>


        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

      </div>
    </div>

  </header>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/frontend/widgets/menu.blade.php ENDPATH**/ ?>