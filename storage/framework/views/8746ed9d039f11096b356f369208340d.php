<?php $__env->startSection('title'); ?>
    Admins
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <style>
        .admin-sidebar-users{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="page-title-account">
            <div>
                All Admins
            </div>
            <div class="pull-right">
                <a href="<?php echo e(route('admin.newAdmin')); ?>" class="btn btn-nin-green">
                    Manage Admin
                </a>
            </div>
        </div>
        <div>

            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                               <?php echo e($admin->name); ?>

                            </td>

                            <td>
                               <?php echo e($admin->email); ?>

                            </td>
                            <td>
                               <?php echo e($admin->phone); ?>

                            </td>
                            <td>
                               <?php echo e($admin->location->location_name); ?>

                            </td>
                            <td>
                               <?php echo e($admin->status ? 'Active' : 'Disabled'); ?>

                            </td>
                            <td>
                                <?php if($admin->user_type ==  2): ?>
                                    Super Admin
                                <?php else: ?>
                                    Admin
                                <?php endif; ?>
                            </td>
                            <td>
                                <div>
                                    
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7">
                                    <div class="table-info">
                                        <span class="fa fa-list"></span>
                                        <div class="italic mt-3 text-lg">
                                            No results found
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php echo e($admins->links()); ?>


        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/admins/list.blade.php ENDPATH**/ ?>