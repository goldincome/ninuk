
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <title><?php echo $__env->yieldContent('title'); ?> - NIN UK</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="msapplication-TileImage" content="<?php echo e(asset('favicon.png')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta name="author" content="NIN UK">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>"/>
    <meta property="og:description" content="<?php echo $__env->yieldContent('description'); ?>"/>
    <meta name="robots" content= "index, follow">
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
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q89NWC5BZH"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-Q89NWC5BZH');
    </script>
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="https://kit.fontawesome.com/841fd16d98.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        // toastr.options.timeOut = 300000;
    </script>



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

    <?php echo $__env->make('common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main" style="min-height: 500px;">
        <?php echo $__env->make('includes.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <?php echo $__env->make('includes.info-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH E:\xampp\htdocs\nin-uk\resources\views/layouts/app.blade.php ENDPATH**/ ?>