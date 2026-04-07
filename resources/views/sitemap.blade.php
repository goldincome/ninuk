
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{route('home')}}/</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{route('contactUs')}}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{route('bvn')}}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{route('nigerianPassport')}}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{route('flightTicket')}}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </url>
</urlset>