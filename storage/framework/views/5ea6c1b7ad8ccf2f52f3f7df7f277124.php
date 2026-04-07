<?php $__env->startSection('title'); ?>
    Settings For All Locations
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <style>
        .admin-sidebar-settings{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="page-title-account">
            <div>
                Settings - Select a location
            </div>
            <div class="pull-left">
                
            </div>
        </div>

        
        <?php echo $__env->make('common.error-and-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="space-y-2 pt-10 border-t-2">

            
            <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <a href="<?php echo e(route('admin.settings.edit', $location->id)); ?>" class="flex space-x-4 justify-between px-8 py-6 bg-white rounded-lg border-2 border-transparent hover:border-nin-green">
                    <div class="flex-grow">
                        <div class="text-lg font-semibold">
                            <?php echo e($location->location_name); ?>

                        </div>
                        <div class="mt-1 text-fade">
                            <?php echo e($location->location_address); ?>

                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="fa fa-angle-right text-3xl"></span>
                    </div>
                </a>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="table-info">
                    <span class="fa fa-map-marker"></span>
                    <div class="italic mt-3 text-lg">
                        No locations found
                    </div>
                    <div>
                        <a href="<?php echo e(route('admin.locations.create')); ?>" class="mx-auto mt-3 btn btn-transparent-black">
                            Add location
                        </a>
                    </div>
                </div>

            <?php endif; ?>


            <?php echo e($locations->links()); ?>

            
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>