<?php $__env->startSection('title'); ?>
    Messages
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <style>
        .admin-sidebar-messages{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="page-title-account">
            <div>
                All Messages
            </div>
            <div>
                <form action="">
                    <label class="relative block">
                        <div class="pointer-events-none w-10 h-full absolute flex">
                            <i class="fas fa-search m-auto"></i>
                        </div>
                        <input type="search" name="search" placeholder="Search messages" class="form-input w-full" style="padding-left: 40px !important;">
                   </label>
                </form>
            </div>
        </div>


        <div>

            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Date Registered</th>
                            <th style="min-width: 200px;">Message</th>
                            <th>User Info</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                               <?php echo e($message->created_at->format('M d, Y')); ?>

                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                       <?php echo e($message->subject); ?>

                                    </div>
                                    <div class="text-fade ellipsis-2-lines">
                                        <?php echo e($message->message); ?>

                                    </div>
                                </div>
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        <?php echo e($message->name); ?>

                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            <?php echo e($message->email); ?>

                                        </div>
                                        <div>
                                            <?php echo e($message->phone); ?>

                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <?php if($message->read_status): ?>
                                    <div class="label label-green">
                                        Read
                                    </div>
                                <?php else: ?>
                                    <div class="label label-red">
                                        Unread
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div>
                                    <a href="<?php echo e(route('admin.viewMessage', $message)); ?>" class="btn btn-nin-green btn-sm">
                                        <span class="fa fa-envelope mr-2"></span>
                                        Open
                                    </a>
                                </div>
                                <div class="mt-1">
                                    <form action="">
                                        <button type="button" class="btn btn-red btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
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
                    </tbody>
                </table>
            </div>

            <?php echo e($messages->links()); ?>


        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/admin/messages/list.blade.php ENDPATH**/ ?>