<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!-- Homepage -->
    <url>
        <loc><?= base_url(); ?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
        <lastmod><?= date('Y-m-d'); ?></lastmod>
    </url>
    
    <!-- Categories -->
    <?php foreach($categories as $category): ?>
    <url>
        <loc><?= base_url('products/' . htmlspecialchars($category->slug, ENT_XML1)); ?></loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
        <?php if(isset($category->updated_at)): ?>
        <lastmod><?= date('Y-m-d', strtotime($category->updated_at)); ?></lastmod>
        <?php endif; ?>
    </url>
    <?php endforeach; ?>
    
    <!-- Products -->
    <?php foreach($products as $product): ?>
    <url>
        <loc><?= base_url('product/' . htmlspecialchars($product->slug, ENT_XML1)); ?></loc>
        <priority>0.6</priority>
        <changefreq>weekly</changefreq>
        <?php if(isset($product->updated_at)): ?>
        <lastmod><?= date('Y-m-d', strtotime($product->updated_at)); ?></lastmod>
        <?php endif; ?>
    </url>
    <?php endforeach; ?>
</urlset>
