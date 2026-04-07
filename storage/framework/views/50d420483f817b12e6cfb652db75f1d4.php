<?php $__env->startSection('title'); ?>
    Closed Dates
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <style>
        .admin-sidebar-closed-durations{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="page-title-account">
            <div>
                All Closed Dates
            </div>
            <div class="pull-right">
                <a href="<?php echo e(route('admin.closed-durations.create')); ?>" class="btn btn-nin-green">
                    Add New Closed Date
                </a>
            </div>
        </div>
        <div>
            <?php echo $__env->make('common.error-and-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__empty_1 = true; $__currentLoopData = $closedDurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $closedDuration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>
                                <td>
                                    <?php echo e($closedDuration->title); ?>

                                </td>

                                <td>
                                    <div>
                                        <?php echo e($closedDuration->date_from->format("M d, Y")); ?>

                                    </div>
                                   
                                </td>
                                <td>  
                                    <div>
                                        <?php echo e($closedDuration->date_to->format("M d, Y")); ?>

                                    </div>
                                    
                                </td>
                                <td>
                                    <?php echo e($closedDuration->location->location_name ?? ''); ?>

                                </td>
                                <td>
                                    <?php if($closedDuration->status): ?>
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
                                    
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown<?php echo e($closedDuration->id); ?>" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown<?php echo e($closedDuration->id); ?>" class="dropdown-menu-nav hidden">
                                            <ul class="py-1" aria-labelledby="dropdownButton">
                                                <li>
                                                    <a href="<?php echo e(route('admin.closed-durations.edit', $closedDuration->id)); ?>" class="dropdown-menu-option">
                                                        Edit Closed Date
                                                    </a>
                                                </li>
                                                <li>
                                                    <form  method="POST" id= "dform" action="<?php echo e(route('admin.closed-durations.destroy', $closedDuration->id)); ?>">
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

            <?php echo e($closedDurations->links()); ?>


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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/closed-duration/list.blade.php ENDPATH**/ ?>