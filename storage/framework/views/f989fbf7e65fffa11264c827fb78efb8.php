<?php $__env->startSection('title'); ?>
    Appointments
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <style>
        .admin-sidebar-appointments{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="page-title-account">
            <div>
                All Appointments
            </div>
            <div>

            </div>
        </div>


        <div class="p-6 pb-2 mb-6 bg-white rounded-lg shadow">
            <form action="" id="searchForm" method="get">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 pb-4">

                    <div>
                        <label>
                            Start Date
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="date" name="start_date" class="form-input" value="<?php echo e(request('start_date')); ?>">
                    </div>

                    <div>
                        <label>
                            End Date
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="date" name="end_date" class="form-input" value="<?php echo e(request('end_date')); ?>">
                    </div>

                    <div>
                        <label>
                            Search
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="search" name="search" placeholder="Search appointments" class="form-input" value="<?php echo e(request('search')); ?>">
                    </div>

                    <div>
                        <label>
                            Select Location
                            <span class="form-input-required">*</span>
                        </label>
                        <select name="location_id" class="form-input">
                            <option value="">All Locations</option>
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($location->id); ?>"
                                    <?php if($location->id == request()->location_id): ?> selected <?php endif; ?>
                                ><?php echo e($location->location_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="hidden md:block lg:hidden xl:block"> &nbsp;</label>
                        <div class="flex space-x-2">
                            <button class="btn btn-nin-green" type="submit">Submit</button>
                            <button class="btn btn-transparent-black" name="download_report" id="downloadReport" value=<?php echo e(true); ?> type="submit">
                                
                                <span class="fa fa-download text-xl"></span>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <div>

            <div class="tabs">
                <div class="grid grid-cols-2">
                    <a href="/admin/appointments?status=upcoming" class="active">
                        Upcoming Appointments
                    </a>
                    <a href="/admin/appointments">
                        All Appointments
                    </a>
                </div>
            </div>

            <div class="mt-4 table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th style="min-width: 150px;">Reference No</th>
                            <th>Location</th>
                            <th>Service Type</th>
                            <th>User Details</th>
                            <th>Appointment Details</th>
                            <th>Duration</th>
                            <th>Amount Paid</th>
                            <th>Status</th>
                            <th>Card Type</th>
                            <th>Delivery Details</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    #<?php echo e($appointment->ref); ?>


                                </td>
                                <td>
                                    <?php echo e($appointment->location->location_name); ?>

                                </td>

                                <td>
                                   <?php echo e(strtoupper($appointment->serviceType->name)); ?>

                                </td>

                                <td>
                                    <div class="font-bold">
                                        <?php echo e($appointment->user_name); ?>

                                    </div>
                                    <div>
                                        <?php echo e($appointment->user_phone); ?>

                                    </div>
                                    <div>
                                        <?php echo e($appointment->user_email); ?>

                                    </div>
                                </td>

                                <td>
                                    <div class="font-bold">
                                        <?php echo e($appointment->date->format('M d, Y')); ?>

                                    </div>
                                    <div class="font-bold">
                                        <?php echo e($appointment->date->format('h:i a')); ?>

                                    </div>
                                </td>

                                <td>
                                    <?php echo e($appointment->duration); ?> mins
                                </td>

                                <td>
                                    <div>
                                        £<?php echo e($appointment->amount); ?>

                                    </div>
                                </td>

                                <td>
                                    <?php if($appointment->status == \App\Models\Appointment::UPCOMING): ?>
                                        <div class="label label-red">
                                            Upcoming
                                        </div>
                                    <?php elseif($appointment->status == \App\Models\Appointment::COMPLETED): ?>
                                        <div class="label label-green">
                                            Completed
                                        </div>
                                    <?php elseif($appointment->status == \App\Models\Appointment::PAYMENT_FAILED): ?>
                                        <div class="label label-red">
                                            Payment Failed
                                        </div>
                                    <?php elseif($appointment->status == \App\Models\Appointment::CANCELLED): ?>
                                        <div class="label label-red">
                                            Cancelled/Refunded
                                        </div>
                                    <?php elseif($appointment->status == \App\Models\Appointment::TOPAYONCAPTURE): ?>
                                        <div class="label label-red">
                                            To Pay Offline
                                        </div>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <?php echo e($appointment->card_type); ?>

                                </td>
                                <td>
                                    <div class="font-bold">
                                        <?php echo e($appointment->postal_code); ?>

                                    </div>
                                    <div>
                                        <?php echo e($appointment->delivery_address); ?>

                                    </div>

                                </td>
                                <td>
                                    <?php echo e($appointment->created_at->format('M d, Y')); ?>

                                </td>
                                <td>
                                    <div>
                                        <button id="dropdownButton" data-dropdown-toggle="dropdown<?php echo e($appointment->id); ?>" class="dropdown" type="button">
                                            Option
                                            <span class="fa fa-angle-down ml-2"></span>
                                        </button>
                                        <div id="dropdown<?php echo e($appointment->id); ?>" class="dropdown-menu-nav hidden" >
                                            <?php if($appointment->status != \App\Models\Appointment::CANCELLED): ?>
                                                <ul class="py-1" aria-labelledby="dropdownButton<?php echo e($appointment->id); ?>">
                                                    <?php if($appointment->status != \App\Models\Appointment::COMPLETED): ?>
                                                        <li>
                                                            <a href="<?php echo e(route('admin.appointmentReschedule', $appointment->id)); ?>" class="dropdown-menu-option">Reschedule</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo e(route('admin.markAsDone', $appointment->id)); ?>" class="dropdown-menu-option">Mark as Done</a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if($appointment->status == \App\Models\Appointment::UPCOMING || \App\Models\Appointment::TOPAYONCAPTURE): ?>
                                                    <form method="POST" action="<?php echo e(route('admin.cancelAppointment', $appointment->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <li><button type="submit" class="dropdown-menu-option" 
                                                            onclick="return confirm('Are you sure you want to cancel and refund this appointment\nOnce done, it cannot be undone');">
                                                            Cancel/Refund</button>
                                                            
                                                        </li>
                                                    </form>
                                                    <?php endif; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="12">
                                    <div class="table-info">
                                        <span class="fa fa-list"></span>
                                        <div class="italic mt-3 text-lg">
                                            No appointments yet
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($appointments->links()); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/appointments/list.blade.php ENDPATH**/ ?>