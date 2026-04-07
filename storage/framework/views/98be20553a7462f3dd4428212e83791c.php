<div>

    <?php if($errors->all()): ?>

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                
                    <!-- <p class="alert alert-warning alert-dismissible"> -->
                    <div class="alert alert-danger alert-dismissible" style="margin-bottom: 20px;">
                        <?php echo e($message); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php elseif(session()->has('message')): ?>

        
            
                <div class="alert alert-success alert-dismissible" style="margin-bottom: 20px;">
                    <?php echo session()->get('message'); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            
        

    <?php elseif(session()->has('error')): ?>

        
            
                <div class="alert alert-danger alert-dismissible" style="margin-bottom: 20px;">
                    <?php echo e(session()->get('error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            
        
        
    <?php endif; ?>

</div><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/common/error-and-message.blade.php ENDPATH**/ ?>