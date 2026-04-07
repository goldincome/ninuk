<?php $__env->startSection('title'); ?>
    All Services Offered at <?php echo e($location->location_name); ?>

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
                All <?php echo e($location->location_name); ?> Services
            </div>
            <div class="pull-right">
                <a href="<?php echo e(route('admin.settings.edit', $location->id)); ?>" class="btn btn-nin-green">
                    View Location Settings
                </a>
            </div>
        </div>
        <div>
            <?php echo $__env->make('common.error-and-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-container">
                <form method="POST" name="our-services" action="<?php echo e(route('admin.our-services.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="location_id" value="<?php echo e($location->id); ?>" />
                    <table class="table table-auto table-border table-align">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Service Type</th>
                                <th>Price</th>
                                <th>PVC Print & Delivery Cost</th>
                                <th>Use Online Payment</th>
                                <th>Enabled</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $__empty_1 = true; $__currentLoopData = $ourServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ourService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <tr>
                                    <td>
                                        <?php echo e($loop->iteration); ?>

                                    </td>
                                    <td>
                                        <?php echo e($ourService->serviceType->name); ?>

                                        <input type="hidden" name="service_type_ids[]" value="<?php echo e($ourService->serviceType->id); ?>" class="form-input" />
                                    </td>
                                    <td>
                                        <input type="text" name="price[]" value="<?php echo e($ourService->price); ?>" class="form-input" />
                                    </td>
                                    <td>  
                                        <input type="text" name="pvc_print_delivery_cost[]" value="<?php echo e($ourService->pvc_print_delivery_cost); ?>" class="form-input" />
                                    </td>
                                    <td>
                                        <input type="checkbox" name="allow_online_payment[<?php echo e($ourService->id); ?>]" value="<?php echo e($ourService->allow_online_payment ? 1 : 0); ?>" <?php if($ourService->allow_online_payment): ?> checked <?php endif; ?> class="form-input-checkbox" />
                                    </td>
                                    
                                    <td>
                                        <input type="checkbox" name="mystatus[<?php echo e($ourService->id); ?>]" value="<?php echo e($ourService->status ? 1 : 0); ?>" <?php if($ourService->status): ?> checked <?php endif; ?> class="form-input-checkbox" />
                                    </td>

                                    <input type="hidden" name="our_services_ids[]" value="<?php echo e($ourService->id); ?>" />
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="table-info">
                                            <span class="fa fa-list"></span>
                                            <div class="italic mt-3 text-lg">
                                                No results found
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                                    
                            <?php endif; ?>
                            <?php if(count($ourServices) > 0): ?>
                                <tr>
                                    <td colspan="5">
                                        <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                                            Update
                                        </button>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function confirmation(){
                var result = confirm("Are you sure to delete?");
                if(result){
                    document.getElementById('dform').submit();
                }
        }
    
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/our-services/list.blade.php ENDPATH**/ ?>