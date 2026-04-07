<?php $__env->startSection('title'); ?>
    Locations
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <style>
        .admin-sidebar-locations{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="page-title-account">
            <div>
                All Locations
            </div>
            <div class="pull-right">
                <a href="<?php echo e(route('admin.locations.create')); ?>" class="btn btn-nin-green">
                    Add Location
                </a>
            </div>
        </div>
        <div>
            <?php echo $__env->make('common.error-and-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Location Name</th>
                            <th>Address</th>
                            <th>Contact Info</th>
                            <th>Admin</th>

                            
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>
                                <td>
                                    <?php echo e($location->location_name); ?>

                                </td>

                                <td>
                                    <?php echo e($location->location_address); ?>

                                </td>
                                <td>
                                    <div>
                                        <a href="mail:<?php echo e($location->contact_phone); ?>">
                                            <?php echo e($location->contact_phone); ?>

                                        </a>
                                    </div>
                                    <div>
                                        <a href="<?php echo e($location->contact_email); ?>">
                                            <?php echo e($location->contact_email); ?>

                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <?php echo e($location->contact_name); ?>

                                    </div>
                                    <a href="mail:<?php echo e($location->contact_email); ?>">
                                        <?php echo e($location->contact_email); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php if($location->status): ?>
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
                                    
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown<?php echo e($location->id); ?>" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown<?php echo e($location->id); ?>" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="<?php echo e(route('admin.locations.edit', $location->id)); ?>" class="dropdown-menu-option">
                                                        Edit Location
                                                    </a>
                                                </li>
                                                <li>
                                                    <form  method="POST" id= "dform" action="<?php echo e(route('admin.locations.destroy', $location->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <a href="#" onclick="confirmation()" class="dropdown-menu-option">Delete Location</a>
                                                    </form>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(route('admin.settings.edit', $location->id)); ?>" class="dropdown-menu-option">Manage Settings</a>
                                                
                                                </li>
                                            </ul>
                                        </div>
                                        
                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4">
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

            <?php echo e($locations->links()); ?>


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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/locations/list.blade.php ENDPATH**/ ?>