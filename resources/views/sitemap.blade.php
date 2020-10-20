<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://telemedchucampus.tg//</loc>
    </url>
    <url>
        <loc>https://telemedchucampus.tg/about</loc>
    </url>
    <url>
        <loc>https://telemedchucampus.tg/our-services</loc>
    </url>
    <url>
        <loc>https://telemedchucampus.tg/contact</loc>
    </url>
    <url>
        <loc>https://telemedchucampus.tg/login</loc>
    </url>
    <url>
        <loc>https://telemedchucampus.tg/register</loc>
    </url>
    @foreach($timelines as $timeline)
        <url>
            <loc>https://telemedchucampus.tg/timeline/{{ $timeline->slug }}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($timeline->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    
    @foreach($posts as $post)
        <url>
            <loc>https://telemedchucampus.tg/sante/{{ $post->slug }}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($post->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>