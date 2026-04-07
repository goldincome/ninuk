<?php $__env->startSection('title'); ?>
    Update Closed Dates and Time - <?php echo e($closedDuration->title); ?>

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
               
                    Update Closed Date - <?php echo e($closedDuration->title); ?>

                
            </div>
            <div class="pull-right flex space-x-4">
                <a href="<?php echo e(route('admin.closed-durations.index')); ?>" class="btn btn-transparent-black">
                    <span class="fa fa-angle-left mr-2"></span>
                    Back
                </a>
            </div>
        </div>


        <div class="grid grid-cols-1 xl:grid-cols-1 gap-10">


            <div class="p-6 bg-white">
                <form method="POST" name="duration" action="<?php echo e(route('admin.closed-durations.update', $closedDuration->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div>

                        <div class="font-bold">
                            Update Block dates and time for appointment bookings
                        </div><p></p> 
                        
                        <div class="form-group">
                            <label>
                                Title
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="text" name="title" value="<?php echo e($closedDuration->title ? $closedDuration->title : old('title')); ?>" required  class="form-input" />
                        </div>

                        <div class="form-group">
                            <label>
                                Date From 
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="date" name="date_from" value="<?php echo e($closedDuration->date_from ? $closedDuration->date_from->format("Y-m-d") : old('date_from')); ?>" required  class="form-input" />
                        </div>
                       
                        <div class="form-group">
                            <label>
                                Date To 
                                <span class="form-input-required">*</span>
                            </label>
                            <input type="date" name="date_to" value="<?php echo e($closedDuration->date_to ? $closedDuration->date_to->format("Y-m-d") : old('date_to')); ?>" required  class="form-input" />
                        </div>
                        
                        <div class="form-group">
                            <label>
                                Location
                                <span class="form-input-required">*</span>
                            </label>
                            <select name="location_id" id="location_id" required class="form-input">
                                <option value="">-- select --</option>
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($location->id); ?>" <?php echo e($location->id == $closedDuration->location_id ? 'selected' : ''); ?>><?php echo e($location->location_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                        </div>
                       
                       
                        <div class="form-group">
                            <label>
                                Status
                                <span class="form-input-required">*</span>
                            </label>
                            <select name="status" id="" class="form-input">
                                <option value="1" <?php echo e($closedDuration->status ? 'selected' : ''); ?> >Active</option>
                                <option value="0" <?php echo e(!$closedDuration->status ? 'selected' : ''); ?> >Inactive</option>
                            </select>
                        </div>



                            <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                                Create
                            </button>
                        

                    </div>
                </form>
            </div>



        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/closed-duration/edit.blade.php ENDPATH**/ ?>