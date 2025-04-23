<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $category->name; ?></li>
    </ol>
</nav>

<div class="row mb-4">
    <div class="col-md-12">
        <h1><?= $category->name; ?></h1>
        <p class="lead">Browse our selection of <?= $category->name; ?> products.</p>
    </div>
</div>

<?php if(empty($products)): ?>
<div class="alert alert-info">
    No products found in this category. Check back later for updates.
</div>
<?php else: ?>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach($products as $product): ?>
    <div class="col">
        <div class="card h-100 shadow-sm hover-effect">
            <div class="card-body">
                <h2 class="card-title h5"><?= $product->title; ?></h2>
                <p class="card-text" style="color: #e0e0e0;"><?= character_limiter(strip_tags($product->description), 100); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="price-tag">$<?= number_format($product->price, 2); ?></div>
                    <a href="<?= base_url('product/' . $product->slug); ?>" class="btn btn-sm btn-outline-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>