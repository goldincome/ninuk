<?php $__env->startSection('css'); ?>
<style>
.active-link::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 4px; /* move it up slightly */
    width: 70%;
    height: 6px;
    background-color: black;
    transform: translateX(-50%);
    z-index: 50;
}

</style>

<?php $__env->stopSection(); ?>
<div class="relative z-10 container">
    <div class="mx-auto grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-8">

        <a href="<?php echo e(route('home')); ?>" 
            class="h-full block p-2 xl:p-4 rounded-xl shadow-sm header-links-highlight bg-nin-green relative <?php echo e(request()->routeIs('home') ? 'active-link' : ''); ?>">
            <div class="flex items-center justify-center">      
            </div>
            <div class="text-m lg:text-xl font-semibold text-center">
                <span class="fa fa-calendar text-xl text-orange"></span> 
                Enroll For Your NIN
            </div>
        </a>

        <a href="<?php echo e(route('tin')); ?>" 
            class="h-full block p-2 xl:p-4 rounded-xl shadow-sm text-white bg-nin relative <?php echo e(request()->routeIs('tin') ? 'active-link' : ''); ?>" 
            style="background-color: orange"> 
            <div class="flex items-center justify-center">    
            </div>
            <div class="text-m lg:text-xl font-semibold text-center">
                <span class="fa fa-id-card text-xl text-white"></span> 
                Enroll For Your Tax Indentification Number (TIN)
            </div>  
        </a> 
        
        <a href="<?php echo e(route('nigerianPassport')); ?>" 
            class="h-full block p-2 xl:p-4 rounded-xl shadow-sm header-links-highlight bg-nin-green relative <?php echo e(request()->routeIs('nigerianPassport') ? 'active-link' : ''); ?>"
             >
            <div class="flex items-center justify-center">      
            </div>
            <div class="text-m lg:text-xl font-semibold text-center">
                <span class="fa fa-book text-xl text-orange"></span> 
                Passport Application Assistance
            </div>  
        </a>
  <a href="<?php echo e(route('flightTicket')); ?>" 
   class="relative h-full block p-2 xl:p-4 rounded-xl shadow-sm text-white bg-nin" 
   style="background-color: orange;"> 
    <div class="flex items-center justify-center"></div> 
    <div class="text-m lg:text-xl font-semibold text-center relative" style="position: relative; z-index: 1;"> 
        <span class="fa fa-plane text-xl text-white"></span> 
        Book Your Flight Ticket 
        <?php if(request()->routeIs('flightTicket')): ?>
            <span style="
                position: absolute;
                left: 50%;
                bottom: -15px; /* moved lower */
                width: 70%;
                height: 6px;
                background-color: black;
                transform: translateX(-50%);
                z-index: 0;
                display: block;
                border-radius: 3px;
            "></span>
        <?php endif; ?>
    </div> 
</a>

    </div>
</div>



<?php /**PATH E:\xampp\htdocs\nin-uk\resources\views/common/page-navlink.blade.php ENDPATH**/ ?>