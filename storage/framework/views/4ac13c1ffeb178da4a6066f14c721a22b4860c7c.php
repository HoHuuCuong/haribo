<section class="site-section bg-light" id="reg-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center bg-purple rounded">
                <h2 class="h1 site-section-heading text-light pt-3 text-uppercase"><?php echo e(__('Registration')); ?></h2>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-md-4 d-none d-lg-block ">
                <div class="p-4 mb-3">
                    <img src="<?php echo e(imgApp($config['REGIMG']->value,[],0,0,true)); ?>" class="img-fluid" />
                </div>

            </div>
            <div class="col-12 col-lg-8  mb-5">
                <form action="<?php echo e(route('f.register')); ?>" method="post" class="p-md-5 needs-validation" novalidate
                    enctype="multipart/form-data">
                    <?php if(session('reg')): ?><?php echo msg(session('msg'),session('type'),session('title')); ?><?php endif; ?>
                    <div class="row form-group">
                        <div class="bg-xam rounded col-md-4 mb-3 mb-md-0 <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <label class="text-purple" for="fname"><?php echo e(__('Họ & tên')); ?></label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <input type="text" id="name" required name="name" value="<?php echo e(old('name')); ?>"
                                class="rounded text-light bg-purple form-control  <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <span id="helpname" data-msg="<?php echo e(__('backend.validate.requied',['name'=>__('Họ & tên')])); ?>"
                                class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="bg-xam rounded col-md-4 mb-3 mb-md-0 <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <label class="text-purple" for="phone"><?php echo e(__('Phone')); ?></label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <input type="text" id="phone" data-regix="<?php echo e(HD::REGIX_PHONE); ?>" required name="phone"
                                value="<?php echo e(old('phone')); ?>" class="rounded text-light bg-purple form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <span id="helpphone" data-msg="<?php echo e(__('backend.validate.regix',['name'=>__('Phone')])); ?>"
                                class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="bg-xam rounded col-md-4 mb-3 mb-md-0 <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <label class="text-purple" for="email"><?php echo e(__('Email')); ?></label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <input type="email" id="email" data-regix="<?php echo e(HD::REGIX_EMAIL); ?>" required name="email"
                                value="<?php echo e(old('email')); ?>" class="rounded text-light bg-purple form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <span id="helpemail" data-msg="<?php echo e(__('backend.validate.regix',['name'=>__('Email')])); ?>"
                                class="text-danger"><?php echo e($errors->first('email')); ?></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="bg-xam rounded" style="margin-right: -15px;margin-left: -15px;padding-left:15px">
                                <label class="bg-xam rounded text-purple"><?php echo e(__('Address')); ?></label>
                            </div>
                        </div>
                        <div class="col-md-8 ">
                            <div class="row mb-3">
                                <div class="col-md-5 <?php if ($errors->has('city_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city_id'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                    <div class="bg-xam rounded pl-2">
                                    <label class="text-purple" for="city_id"><?php echo e(__('Tỉnh/TP')); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-7 <?php if ($errors->has('city_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city_id'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                    <select id="city_id" required name="city_id"
                                        data-api="<?php echo e(route('f.ajax.getdistricts')); ?>"
                                        class="rounded text-light bg-purple form-control <?php if ($errors->has('city_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city_id'); ?> is-invalid  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                        <option value=""><?php echo e(__('Select').' '.__('City')); ?></option>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($citem->id); ?>" <?php echo e(old('city_id')==$citem->
                                            id?'selected':''); ?>><?php echo e($citem->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span id="helpcity_id"
                                        data-msg="<?php echo e(__('backend.validate.requied',['name'=>__('Tỉnh/TP')])); ?>"
                                        class="text-danger"><?php echo e($errors->first('city_id')); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <div class="col-md-5 <?php if ($errors->has('district_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('district_id'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                    <div class="bg-xam rounded pl-2">
                                    <label class="text-purple" for="district_id"><?php echo e(__('Phường/Quận')); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-7 <?php if ($errors->has('district_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('district_id'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                    <select id="district_id" required name="district_id"
                                        class="rounded text-light bg-purple form-control <?php if ($errors->has('district_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('district_id'); ?> is-invalid  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                        <option value=""><?php echo e(__('Select').' '.__('District')); ?></option>
                                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ditem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ditem->id); ?>" <?php echo e(old('district_id')==$ditem->
                                            id?'selected':''); ?>><?php echo e($ditem->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span id="helpdistrict_id"
                                        data-msg="<?php echo e(__('backend.validate.requied',['name'=>__('Phường/Quận')])); ?>"
                                        class="text-danger"><?php echo e($errors->first('district_id')); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5 <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                    <div class="bg-xam rounded pl-2">
                                    <label class="text-purple" for="address"><?php echo e(__('Số nhà')); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-7 <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                    <input type="text" id="address" required name="address" value="<?php echo e(old('address')); ?>"
                                        class="rounded text-light bg-purple form-control <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?> is-invalid  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                    <span id="helpaddress"
                                        data-msg="<?php echo e(__('backend.validate.requied',['name'=>__('Số nhà')])); ?>"
                                        class="text-danger"><?php echo e($errors->first('address')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="bg-xam rounded col-md-4 mb-3 mb-md-0 <?php if ($errors->has('bonus_code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bonus_code'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <label class="text-purple" for="bonus_code"><?php echo e(__('Bonus Code')); ?></label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 <?php if ($errors->has('bonus_code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bonus_code'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <input type="text" id="bonus_code" data-regix="^[a-zA-Z0-9]{9}$" name="bonus_code"
                                value="<?php echo e(old('bonus_code')); ?>"
                                class="rounded text-light bg-purple form-control <?php if ($errors->has('bonus_code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bonus_code'); ?> is-invalid  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <span id="helpbonus_code"
                                data-msg="<?php echo e(__('Bonus Code').' '.__('bao gồm chữ cái, số và có độ dài 9 ký tự')); ?>"
                                class="text-danger"><?php echo e($errors->first('bonus_code')); ?></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class=" bg-xam rounded col-md-4 mb-3 mb-md-0 <?php if ($errors->has('attach')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('attach'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <label class="text-purple" for="attach"><?php echo e(__('Photograph packaging & bonus code')); ?></label>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0 <?php if ($errors->has('attach')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('attach'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <div class="custom-file <?php if ($errors->has('attach')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('attach'); ?> has-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                <input type="file" id="attach" onchange="ValidateSingleInput(this)" required
                                    name="attach" value="<?php echo e(old('attach')); ?>"
                                    class="rounded text-light bg-purple custom-file-input <?php if ($errors->has('attach')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('attach'); ?> is-invalid  <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                <label class="rounded text-light bg-purple  custom-file-label" for="file"><?php echo e(__('Choose file')); ?></label>
                                <span id="helpattach"
                                    data-msg="<?php echo e(__('backend.validate.requied',['name'=>__('Photograph packaging & bonus code')])); ?>"
                                    class="text-danger"><?php echo e($errors->first('attach')); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php echo csrf_field(); ?>
                    <div class="row form-group">
                        <div class="col-md-10">
                            <label class="text-purple"><input required checked name="allow" id="allow" value="1"
                                    type="checkbox" /> <?php echo e(__('Tôi đồng ý với điều kiện & điều khoản của chương
                                trình')); ?></label>
                        </div>
                        <div class="col-md-2 text-right">
                            <input type="submit" value="<?php echo e(__('Submit')); ?>" class="btn bg-purple text-light btn-md">
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
<script>
    var _validFileExtensions = [".png", ".jpg"];
        function ValidateSingleInput(oInput) {
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        $('.custom-file-label').html(sFileName);
                        break;
                    }
                }
                if (!blnValid) {
                    $.alert("Xin lỗi, " + sFileName + " không hợp lệ, chỉ cho phép các định dạng: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
        }
</script>
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/frontend/widgets/formreg.blade.php ENDPATH**/ ?>