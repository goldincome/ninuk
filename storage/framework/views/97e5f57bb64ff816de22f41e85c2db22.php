<?php $__env->startSection('title'); ?>
    Payments
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <style>
        .admin-sidebar-payments{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="page-title-account">
            <div>
                All Payments
            </div>
            <div>
                
            </div>
        </div>


        <div class="p-6 pb-2 mb-6 bg-white rounded-lg shadow">
            <form action="" id="dateSearchForm" method="get">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 pb-4">

                    <div>
                        <label>
                            Start Date
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="date" name="start_date" class="form-input" id="dateSearchInput1" value="<?php echo e(request('start_date')); ?>">
                    </div>

                    <div>
                        <label>
                            End Date
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="date" name="end_date" class="form-input" id="dateSearchInput2" value="<?php echo e(request('end_date')); ?>">
                    </div>

                    <div>
                        <label>
                            Search
                            <span class="form-input-required">*</span>
                        </label>
                        <input type="search" name="search" placeholder="Search Payment" class="form-input" value="<?php echo e(request('search')); ?>">
                    </div>

                    <div>
                        <label class="block md:hidden lg:block"> &nbsp;</label>
                        <div class="">
                            <button class="btn btn-nin-green btn-block" type="submit">Submit</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div>

            <div class="tabs">
                <div class="grid grid-cols-3">
                    <a href="<?php echo e(route('admin.payments.index')); ?>" class="active">
                        All Payments
                    </a>
                    <a href="<?php echo e(route('admin.payments.index')); ?>?status=<?php echo e(\App\Models\Payment::PAYMENTSTATUS['completed']); ?>">
                        Successful Payments
                    </a>
                    <a href="<?php echo e(route('admin.payments.index')); ?>?status=<?php echo e(\App\Models\Payment::PAYMENTSTATUS['failed']); ?>">
                        Failed Payments
                    </a>
                </div>
            </div>

            <div class="mt-4 table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Appointment Reference No</th>
                            <th>Amount Paid</th>
                            <th>Payment Status</th>
                            <th>Payment Gateway</th>
                            <th>Payment Reference No</th>
                            <th style="min-width: 150px;">Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($payments->isNotEmpty()): ?>
                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        #<?php echo e($payment->appointment->ref); ?>

                                    </td>
                                    <td>
                                        <div>
                                            £  <?php echo e($payment->amount_paid); ?>

                                        </div>
                                    </td>
                                    <td>
                                    <?php if($payment->payment_status == $payment::PAYMENTSTATUS['failed'] ): ?>
                                        <div class="label label-red">
                                            Failed
                                        </div>
                                    <?php endif; ?>

                                    <?php if($payment->payment_status == $payment::PAYMENTSTATUS['completed'] ): ?>
                                        <div class="label label-green">
                                            Completed
                                        </div>
                                    <?php endif; ?>

                                    <?php if($payment->payment_status == $payment::PAYMENTSTATUS['cancelled'] ): ?>
                                        <div class="label label-red">
                                            Cancelled/Refunded
                                        </div>
                                    <?php endif; ?>
                                    <?php if($payment->payment_status == $payment::PAYMENTSTATUS['awaiting'] ): ?>
                                        <div class="label label-red">
                                        To Pay Cash In Office
                                        </div>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($payment->payment_gateway); ?>

                                    </td>
                                    <td>
                                        #<?php echo e($payment->payment_ref_no); ?>

                                    </td>
                                    <td>
                                        <?php echo e($payment->created_at->format('M d, Y')); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">
                                    <div class="table-info">
                                        <span class="fa fa-list"></span>
                                        <div class="italic mt-3 text-lg">
                                            No payments yet
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>


                    </tbody>
                </table>
            </div>

            <?php echo e($payments->links()); ?>


        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
   <script>
        $(function() {
            let selectedTime = $(this).attr('data-selectedTime');
            $("#dateSearchInput").change(function(e) {
                e.preventDefault();
                $("#dateSearchForm").submit()
            });
        });
   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/payments/list.blade.php ENDPATH**/ ?>