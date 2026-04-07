<?php $__env->startSection('title'); ?>
    Create New Account
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-xl p-8 sm:p-14 mx-auto md:my-auto">
        <div class="pb-14 md:pt-20 lg:pl-4 lg:pr-4">
            
            <div class="font-boing font-semibold text-2xl sm:text-3xl text-center md:text-left">
                Create New Account
            </div>

            <div>
                <form method="get" action="/register/email-confirmation">

                    <div class="mt-10 w-full max-w-md mx-auto md:mx-0 lg:w-96">
                        
                        <div class="form-group">
                            <label>
                                FullName
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="text" name="name" placeholder="eg: John Doe" class="form-input" />
                        </div>

                        <div class="form-group">
                            <label>
                                Email Address
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="email" name="email" placeholder="eg: email@example.com" class="form-input" />
                        </div>

                        <div class="form-group">
                            <label>
                                Phone Number
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="email" name="email" placeholder="eg: +44 xx xxxx xxxx" class="form-input" />
                        </div>

                        <div class="form-group">
                            <label>
                                Password
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="password" name="password" placeholder="XXXXXXXX" class="form-input" />
                        </div>

                        <div class="form-group">
                            <label>
                                Retype Password
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="password" name="retype_password" placeholder="XXXXXXXX" class="form-input" />
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                            Create Account
                        </button>

                        <div class="mt-3 text-sm font-semibold text-gray-500">
                            Already have an account?
                            <a href="/login" class="text-nin-green hover:underline">Login</a>
                        </div>

                    </div>
                    
                </form>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>