<?php $__env->startSection('title'); ?>
    404 not found
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div>
        
        <div class="container">

            <div class="py-10">
                <div class="table-info">
                    <span class="fa fa-unlink" aria-hidden="true"></span>
                    <div class="font-bold text-2xl mt-3">
                        Page not found!
                    </div>
                    <div class="mt-3">
                        Sorry, the page you tried to access does not exist on our servers.
                    </div>
                    <div class="mt-4">
                        <a href="/" class="btn btn-nin-green mx-auto">
                            Goto homepage
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/errors/404.blade.php ENDPATH**/ ?>