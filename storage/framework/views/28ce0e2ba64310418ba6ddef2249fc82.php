<?php $__env->startSection('title'); ?>
    Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-xl p-8 sm:p-14 mx-auto md:my-auto">
        <div class="pb-14 md:pt-20 lg:pl-4 lg:pr-4">

            <div class="font-boing font-semibold text-2xl sm:text-3xl text-center md:text-left">
                Welcome, Admin
            </div>

            <div>
                <form method="post" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="mt-10 w-full max-w-md mx-auto md:mx-0 lg:w-96">

                        <div class="form-group">
                            <label>
                                Email Address
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="email" name="email" placeholder="email@example.com" class="form-input" value="<?php echo e(old('email')); ?>" />
                        </div>

                        <div class="form-group">
                            <label>
                                Password
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="password" name="password" placeholder="XXXX" class="form-input" />
                        </div>

                        <div class="mt-3 text-sm font-semibold text-gray-500">
                            <div class="captcha">
                                <div class="flex space-x-2">
                                    <span class="captchaImage"><?php echo captcha_img(); ?></span>
                                    <button type="button" class="reload btn bg-black text-white btn-md" id="reload">
                                        <span class="text-2xl relative -top-2">
                                            &#x21bb;
                                        </span>
                                    </button>
                                </div>
                                <div class="captcha span mt-2">
                                    <input id="captcha" type="text" class="form-input" placeholder="Enter Captcha" name="captcha">
                                </div>
                            </div>
                        </div>

                        <div class=" mt-3 text-sm font-semibold text-gray-500">
                            <a href="<?php echo e(route('password.request')); ?>" class="text-nin-green hover:underline">Forgot password</a>
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                            Login
                        </button>

                        

                    </div>

                </form>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha .captchaImage").html(data.captcha);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', ['title' => 'Login'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>