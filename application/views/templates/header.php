<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $meta_description ?? 'Explore our wide range of products at competitive prices.'; ?>">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/images/favicon.ico'); ?>" type="image/x-icon">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $meta_description ?? 'Explore our wide range of products at competitive prices.'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo current_url(); ?>">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $meta_description ?? 'Explore our wide range of products at competitive prices.'; ?>">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo current_url(); ?>">
    
    <?php if(isset($product) && !empty($product)): ?>
    <!-- Product Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "<?php echo $product->title; ?>",
        "description": "<?php echo strip_tags($product->description); ?>",
        "offers": {
            "@type": "Offer",
            "priceCurrency": "USD",
            "price": "<?php echo $product->price; ?>",
            "availability": "https://schema.org/InStock",
            "url": "<?php echo current_url(); ?>"
        }
    }
    </script>
    <?php endif; ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">Product Listing</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <?php foreach($this->CategoryModel->get_all_categories() as $nav_category): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('products/' . $nav_category->slug); ?>"><?= $nav_category->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="d-flex">
                    <a href="<?= base_url('admin'); ?>" class="btn btn-outline-light">Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-4">