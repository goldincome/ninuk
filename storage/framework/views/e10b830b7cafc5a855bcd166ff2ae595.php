
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <title><?php echo $__env->yieldContent('title'); ?> - Admin - NIN UK</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="msapplication-TileImage" content="<?php echo e(asset('favicon.png')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta name="author" content="NIN UK">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>"/>
    <meta property="og:description" content="NIN UK - offers its esteemed users, the opportunity to choose awesome places where they would love to spend their vacation. Our users can browse through all places on the platform anytime, anywhere in the world, and select any vacation spot they desire."/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo e(request()->url()); ?>"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('og'); ?>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon.png')); ?>">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>

    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="https://kit.fontawesome.com/841fd16d98.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){
            $("#dropdownButtonHeaderNav").click(() => {
                if ($("#dropdownHeaderNav").hasClass("block")){
                    $("#dropdownHeaderNav").css({"transform":"none"});
                }
            });
            $("#dropdownButtonHeaderUser").click(() => {
                if ($("#dropdownHeaderUser").hasClass("block")){
                    $("#dropdownHeaderUser").css({"transform":"none"});
                }
            });
        });
    </script>
    <?php echo $__env->yieldContent('js'); ?>

</head>


<body>
    <noscript id="jsc">
        <div>
            Please enable JavaScript in your browser.
            <span class="d-none d-sm-inline">
                Some functionality will not work if this is disabled.
                <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
            </span>
        </div>
        <div></div>
    </noscript>

    <div class="flex min-h-screen bg-gray-100">
        <?php echo $__env->make('common.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="h-screen flex-none hidden lg:block" style="width: 250px;"></div>
        <div class="flex-grow overflow-hidden">
            <?php echo $__env->make('common.admin-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="pt-6 sm:pt-10 pb-24 md:px-10">
                <?php echo $__env->make('includes.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/layouts/admin.blade.php ENDPATH**/ ?>