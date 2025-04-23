<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('products/' . $product->category_slug); ?>"><?= $product->category_name; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $product->title; ?></li>
    </ol>
</nav>

<div class="row mb-4">
    <div class="col-md-8">
        <h1><?= $product->title; ?></h1>
        <div class="category-badge mb-2">
            <span class="badge bg-secondary"><?= $product->category_name; ?></span>
        </div>
        <div class="product-description mt-4">
            <h2 class="h4">Description</h2>
            <div><?= $product->description; ?></div>
        </div>
        
        <?php if(!empty($features)): ?>
        <div class="product-features mt-4">
            <h2 class="h4">Features</h2>
            <ul class="list-group">
                <?php foreach($features as $feature): ?>
                <li class="list-group-item"><?= $feature; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-4">
        <div class="card sticky-top" style="top: 20px;">
            <div class="card-body">
                <h3 class="card-title price-display">$<?= number_format($product->price, 2); ?></h3>
                <hr>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" >Add to Cart</button>
                    <button class="btn btn-outline-primary" type="button" >Save for Later</button>
                </div>
                <hr>
                <div class="product-meta">
                    <small class="text-muted">
                        <i class="fas fa-box"></i> In Stock<br>
                        <i class="fas fa-truck"></i> Fast Delivery Available
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <h2 class="h4 mb-3">Related Products</h2>
        <div class="alert alert-secondary">
            Related products feature coming soon.
        </div>
    </div>
</div>