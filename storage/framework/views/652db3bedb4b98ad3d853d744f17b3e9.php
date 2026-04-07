<?php $__env->startSection('title'); ?>
    Admin
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
                <?php if(Route::currentRouteName() != 'admin.editAdmin'): ?>
                    Add New Admin
                <?php else: ?>
                    Edit Admin:  <?php echo e($admin->name); ?>

                <?php endif; ?>
            </div>
            <div class="pull-right flex space-x-4">
                <a href="/admin/admin" class="btn btn-transparent-black">
                    <span class="fa fa-angle-left mr-2"></span>
                    Back
                </a>
            </div>
        </div>


     <div class="bg-white p-4">
        <form action="<?php echo e(route('register')); ?>" class="max-w-md border p-4" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>
                    Full Name
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="name" class="form-input" value="<?php echo e(old('name')); ?>"/>
            </div>
            <div class="form-group">
                <label>
                    Email
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="email" class="form-input" value="<?php echo e(old('email')); ?>"/>
            </div>
            <div class="form-group">
                <label>
                    Phone
                    <span class="form-input-required">*</span>
                </label>
                <input type="text" name="phone" class="form-input" value="<?php echo e(old('phone')); ?>"/>
            </div>
            <div class="form-group">
                <label>
                    Location
                    <span class="form-input-required">*</span>
                </label>
                <select name="location_id" id="" class="form-input">
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($location->id); ?>"><?php echo e($location->location_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Role
                    <span class="form-input-required">*</span>
                </label>
                <select name="user_type" id="" class="form-input">
                    <option value="1">Admin</option>
                    <option value="2">Super Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Status
                    <span class="form-input-required">*</span>
                </label>
                <select name="status" id="" class="form-input">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="pt-2">
                <button type="submit" class="btn btn-nin-green btn-block">
                    Add Admin
                </button>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/admins/add-admin.blade.php ENDPATH**/ ?>