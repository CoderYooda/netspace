<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {% for page in pages %}

        <url>
            <loc>{{ url(page) }}</loc>
            <lastmod>2020-05-25T19:20:30+04:00</lastmod>
            <changefreq>monthly</changefreq>
            <priority>1</priority>
        </url>

    {% endfor %}

</urlset>
