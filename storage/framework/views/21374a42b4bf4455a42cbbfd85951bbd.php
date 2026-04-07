<?php $__env->startSection('title'); ?>
    Settings - <?php echo e($location->location_name); ?>

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
                Settings
            </div>
            <div class="pull-right">
                <a href="<?php echo e(route('admin.settings.index')); ?>" class="btn btn-nin-green">
                    All Location Settings
                </a>
                <a href="<?php echo e(route('admin.our-services.show', $location->id)); ?>" class="btn btn-nin-green">
                    View/Edit Services
                </a>
            </div>
        </div>

        <div class="bg-white px-4 py-4 mb-4">
            <?php echo e($location->location_name); ?> - <?php echo e($location->location_address); ?>

        </div>


        <div class="grid grid-cols-1 xl:grid-cols-2 gap-10">


            <div>
                <?php echo $__env->make('common.error-and-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="p-6 bg-white">
                    <form method="POST" name="settings" action="<?php echo e(route('admin.settings.update', $location->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div>

                            <div class="form-group">
                                <label>
                                    Allow appointment booking
                                    <span class="form-input-required">*</span>
                                </label>
                                <select name="allow_appointment_booking" id="allow_appointment_booking" required class="form-input">
                                    <option value="" disabled>-- select --</option>
                                    <option value="yes" <?php if($generalSettings->allow_appointment_booking == 'yes'): ?> selected <?php endif; ?>>Yes</option>
                                    <option value="no" <?php if($generalSettings->allow_appointment_booking == 'no'): ?> selected <?php endif; ?>>No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>
                                    Duration per appointment
                                    <span class="form-input-required">*</span>
                                </label>
                                <select name="duration_per_appointment" id="duration_per_appointment" required class="form-input">
                                    <option value="">-- select --</option>
                                    <option value="10" <?php if($generalSettings->duration_per_appointment == 10): ?> selected <?php endif; ?>>10 mins</option>
                                    <option value="15" <?php if($generalSettings->duration_per_appointment == 15): ?> selected <?php endif; ?>>15 mins</option>
                                    <option value="20" <?php if($generalSettings->duration_per_appointment == 20): ?> selected <?php endif; ?>>20 mins</option>
                                    <option value="25" <?php if($generalSettings->duration_per_appointment == 25): ?> selected <?php endif; ?>>25 mins</option>
                                    <option value="30" <?php if($generalSettings->duration_per_appointment == 30): ?> selected <?php endif; ?>>30 mins</option>
                                    <option value="45" <?php if($generalSettings->duration_per_appointment == 45): ?> selected <?php endif; ?>>45 mins</option>
                                    <option value="60" <?php if($generalSettings->duration_per_appointment == 60): ?> selected <?php endif; ?>>1 hour</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>
                                    Price per duration
                                    <span class="form-input-required">*</span>
                                </label>
                                <label class="relative block">
                                    <div class="pointer-events-none w-10 h-full absolute flex">
                                        <span class="m-auto">
                                            £
                                        </span>
                                    </div>
                                    <input type="number" name="nin_capture_price" value="<?php echo e($generalSettings->nin_capture_price ? $generalSettings->nin_capture_price : old('nin_capture_price')); ?>" placeholder="Eg: 50" class="form-input w-full" style="padding-left: 40px !important;">
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    Number of access points per duration
                                    <span class="form-input-required">*</span>
                                </label>
                                <input type="number"  name="no_of_access_points_per_duration" value="<?php echo e($generalSettings->no_of_access_points_per_duration ? $generalSettings->no_of_access_points_per_duration  : old('no_of_access_points_per_duration')); ?>" placeholder="Eg: 2" required class="form-input" />
                            </div>

                            <div class="form-group">
                                <label>
                                    PVC print & home delivery cost
                                    <span class="form-input-required">*</span>
                                </label>
                                <label class="relative block">
                                    <div class="pointer-events-none w-10 h-full absolute flex">
                                        <span class="m-auto">
                                            £
                                        </span>
                                    </div>
                                    <input type="number" step="00.01" name="pvc_print_delivery_cost" value="<?php echo e($generalSettings->pvc_print_delivery_cost ? $generalSettings->pvc_print_delivery_cost : old('pvc_print_delivery_cost')); ?>" placeholder="Eg: 50" class="form-input w-full" style="padding-left: 40px !important;">
                                </label>
                            </div>


                            <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                                Update
                            </button>

                        </div>
                    </form>
                </div>
            </div>



            <div class="p-6 bg-white">
                <form method="POST" name="duration" action="<?php echo e(route('admin.durations.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="location_id" value="<?php echo e($location->id); ?>" />
                    <div>

                        <div class="font-bold">
                            Work hours
                        </div>
                        <?php if($openingDurations->isEmpty()): ?>
                            Please, run Opening Duration Seeder
                        <?php else: ?>
                            <div class="mt-4 table-container">
                                <table class="table table-auto table-border table-align-middle">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Days</th>
                                            <th>Open time</th>
                                            <th>Close time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $openingDurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $openingDuration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="day_of_week[]" value="<?php echo e($openingDuration->id); ?>" <?php if($openingDuration->status): ?> checked <?php endif; ?> class="form-input-checkbox" />
                                                </td>
                                                <td>
                                                    <?php echo e($openingDuration->day_of_week); ?>

                                                </td>
                                                <td>
                                                    <input type="time" name="start_time[]" value="<?php echo e($openingDuration->start_time); ?>" class="form-input" />
                                                </td>
                                                <td>
                                                    <input type="time" name="end_time[]" value="<?php echo e($openingDuration->end_time); ?>" class="form-input" />
                                                </td>
                                                <input type="hidden" name="duration_ids[]" value="<?php echo e($openingDuration->id); ?>" />
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>


                            <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                                Update
                            </button>
                        <?php endif; ?>

                    </div>
                </form>
            </div>



        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/settings/list.blade.php ENDPATH**/ ?>