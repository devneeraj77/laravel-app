<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @foreach ($staticPages as $page)
    <url>
        <loc>{{ $page['url'] }}</loc>
        <lastmod>{{ $page['lastmod'] }}</lastmod>
        <changefreq>{{ $page['changefreq'] }}</changefreq>
        <priority>{{ $page['priority'] }}</priority>
    </url>
    @endforeach
    @foreach ($categories as $category)
    <url>
        <loc>{{ url('/blog/' . $category->slug) }}</loc>
        <lastmod>{{ $category->updated_at->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    @foreach ($posts as $post)
        <url>
            <loc>{{ url('/blog/' . $post->category->slug . '/' . $post->slug) }}</loc>
            <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
            @if ($post->imageAsset)
            <image:image>
                <image:loc>{{ $post->imageAsset->image_url }}</image:loc>
                <image:title>{{ $post->title }}</image:title>
                <image:caption>{{ $post->excerpt }}</image:caption>
            </image:image>
            @endif
        </url>
    @endforeach
</urlset>
