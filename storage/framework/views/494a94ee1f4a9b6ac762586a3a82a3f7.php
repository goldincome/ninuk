<?php $__env->startSection('title'); ?>
    Email Reminder Notification Settings
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <style>
        .admin-sidebar-reminder-settings{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="page-title-account">
            <div>
               Email Reminder Notification Settings
            </div>
            <div class="pull-right">
                <a href="<?php echo e(route('admin.reminder-setting.create')); ?>" class="btn btn-nin-green">
                    Add New Reminder Notification
                </a>
            </div>
        </div>
        <div>
            <?php echo $__env->make('common.error-and-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Number Of Days</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__empty_1 = true; $__currentLoopData = $reminderSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reminderSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>
                                <td>
                                    <?php echo e($reminderSetting->number_of_days); ?>

                                </td>

                                <td>
                                    <?php if($reminderSetting->status): ?>
                                        <div class="label label-blue">
                                            Active
                                        </div>
                                    <?php else: ?>
                                        <div class="label label-red">
                                            Inactive
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown<?php echo e($reminderSetting->id); ?>" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown<?php echo e($reminderSetting->id); ?>" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="<?php echo e(route('admin.reminder-setting.edit', $reminderSetting->id)); ?>" class="dropdown-menu-option">
                                                        Edit Reminder Notification
                                                    </a>
                                                </li>
                                                <li>
                                                    <form  method="POST" id= "dform" action="<?php echo e(route('admin.reminder-setting.destroy', $reminderSetting->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <button type="submit" onclick="confirmation()" class="dropdown-menu-option" >Delete Closed Date</button>
                                                    </form>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        
                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3">
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

            <?php echo e($reminderSettings->links()); ?>


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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/reminder-setting/list.blade.php ENDPATH**/ ?>