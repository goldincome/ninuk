

<?php if(isset($errors) && $errors->any()): ?>
<ul class="alert alert-danger text-center mb-2" style="list-style: none;">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo $error; ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>
<?php endif; ?>

<?php $__currentLoopData = ['danger', 'warning', 'success', 'info', 'error']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="flash-message text-center">
    <?php if(\Illuminate\Support\Facades\Session::has(  $msg)): ?>
        <div class="mb-4 alert alert-<?php echo e(($msg == 'error' || $msg == 'danger') ? 'danger' : $msg); ?>"><?php echo \Illuminate\Support\Facades\Session::get( $msg); ?>

            
        </div>
    <?php endif; ?>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/includes/flash-messages.blade.php ENDPATH**/ ?>