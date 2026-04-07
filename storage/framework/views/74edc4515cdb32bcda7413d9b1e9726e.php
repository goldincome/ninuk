
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo e(route('home')); ?>/</loc>
        <lastmod><?php echo e(now()->toAtomString()); ?></lastmod>
    </url>
    <url>
        <loc><?php echo e(route('contactUs')); ?></loc>
        <lastmod><?php echo e(now()->toAtomString()); ?></lastmod>
    </url>
    <url>
        <loc><?php echo e(route('bvn')); ?></loc>
        <lastmod><?php echo e(now()->toAtomString()); ?></lastmod>
    </url>
    <url>
        <loc><?php echo e(route('nigerianPassport')); ?></loc>
        <lastmod><?php echo e(now()->toAtomString()); ?></lastmod>
    </url>
    <url>
        <loc><?php echo e(route('flightTicket')); ?></loc>
        <lastmod><?php echo e(now()->toAtomString()); ?></lastmod>
    </url>
</urlset><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/sitemap.blade.php ENDPATH**/ ?>