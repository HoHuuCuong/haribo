<?php $__env->startSection('container'); ?>
<!-- start: page -->
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                </div>

                <h2 class="card-title"><?php echo e($pagename); ?></h2>
            </header>
            <?php echo msg(session('msg'),session('type')); ?>

            <div class="card-body">
                <form class="p-3 needs-validation" method="POST" action="<?php echo e($action); ?>" novalidate>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group <?php if ($errors->has('ten')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ten'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                <label class="col-form-label" for="ten"><?php echo e(__('Name')); ?></label>
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="<?php echo e(__('Name')); ?>"
                                    required value="<?php echo e($item->name??old('name')); ?>">
                                <span id="helten" data-msg="<?php echo e(__('backend.validate.requied',['name'=>__('Name')])); ?>"
                                    class="text-danger"><?php echo e($errors->first('ten')); ?></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group <?php if ($errors->has('status')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('status'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                <label class="col-form-label" for="status"><?php echo e(__('Status')); ?></label>
                                <select  class="form-control" id="status" name="status" required>
                                    <?php $__currentLoopData = $STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($item->status) && $item->status == $sitem->id): ?>
                                        selected
                                    <?php endif; ?> value="<?php echo e($sitem->id); ?>"><?php echo e($sitem->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span id="helpstatus"
                                    data-msg="<?php echo e(__('backend.validate.requied',['name'=>__('Status')])); ?>"
                                    class="text-danger"><?php echo e($errors->first('status')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="form-group <?php if ($errors->has('mota')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mota'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                <label class="col-form-label" for="mota"><?php echo e(__('Description')); ?></label>
                                <textarea type="mota" name="mota" class="form-control"
                                    required=""><?php echo e($item->description??old('description')); ?></textarea>
                                <span id="helmota" data-msg="<?php echo e(__('backend.validate.requied',['name'=>__('Description')])); ?>"
                                    class="text-danger"><?php echo e($errors->first('mota')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">

                    </div>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field($method); ?>
                    <div class="form-group row">
                        <div class="col-lg-12 text-right">
                            <a href="<?php echo e(route('b.account.group')); ?>" class="btn btn-sm btn-default"><i class="fa fa-reply"></i>
                                <?php echo e(__('backend.button.cancel')); ?></a> <button class="btn btn-sm btn-primary"
                                type="submit"><i class="fa fa-save"></i> <?php echo e(__('backend.button.save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/backend/accounts/groups/form.blade.php ENDPATH**/ ?>