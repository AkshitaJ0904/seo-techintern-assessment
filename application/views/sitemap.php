<?php


echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Homepage -->
    <url>
        <loc><?= base_url(); ?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>
    
    <!-- Categories -->
    <?php foreach ($categories as $category): ?>
        <url>
            <loc><?= base_url('products/' . htmlspecialchars($category->slug)); ?></loc>
            <priority>0.8</priority>
            <changefreq>weekly</changefreq>
        </url>
    <?php endforeach; ?>
    
    <!-- Products -->
    <?php foreach ($products as $product): ?>
        <url>
            <loc><?= base_url('product/' . htmlspecialchars($product->slug)); ?></loc>
            <priority>0.6</priority>
            <changefreq>weekly</changefreq>
        </url>
    <?php endforeach; ?>
</urlset>
