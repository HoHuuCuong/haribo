<?php $__env->startSection('container'); ?>
<!-- start: page -->
<section class="body-sign">
        <div class="center-sign">
            <a href="<?php echo e(route('b.home')); ?>" class="logo float-left">
                <img src="<?php echo e(asset('/backend')); ?>/img/logo.png" height="54" alt="" />
            </a>

            <div class="panel card-sign">
                <div class="card-title-sign mt-3 text-right">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> <?php echo e(__('backend.pagename.login')); ?></h2>
                </div>
                <div class="card-body">
                <?php echo msg(session('msg'),session('type')); ?>

                <form action="<?php echo e(route('b.account.login')); ?>" method="post">
                        <div class="form-group mb-3 <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <label><?php echo e(__('backend.label.username')); ?></label>
                            <div class="input-group ">
                                <input name="username" type="text" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </span>
                            </div>
                            <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?>
                                <span class="help-text text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group mb-3 <?php if ($errors->has('pwd')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pwd'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <div class="clearfix">
                                <label class="float-left"><?php echo e(__('backend.label.password')); ?></label>
                                <a href="pages-recover-password.html" class="float-right d-none"><?php echo e(__('backend.label.lostpass')); ?></a>
                            </div>
                            <div class="input-group">
                                <input name="pwd" type="password" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                            <?php if ($errors->has('pwd')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pwd'); ?>
                            <span class="help-text text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input value="1" id="RememberMe" name="rememberme" type="checkbox"/>
                                    <label for="RememberMe"><?php echo e(__('backend.label.remember')); ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary mt-2"><?php echo e(__('backend.button.login')); ?></button>
                            </div>
                        </div>
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-3 mb-3">&copy; Copyright <?php echo e(date('Y')); ?>. All Rights Reserved. By Hiếu Nguyễn</p>
        </div>
    </section>
    <!-- end: page -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.empty', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/backend/auth/login.blade.php ENDPATH**/ ?>