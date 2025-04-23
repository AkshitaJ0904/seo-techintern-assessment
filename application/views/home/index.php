<div class="row mb-4">
    <div class="col-md-12">
        <div class="bg-light p-5 rounded mb-4 text-center">
            <h1 class="display-4">Welcome to Product Listing Platform</h1>
            <p class="lead">Explore our wide range of products categorized for your convenience.</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Browse Categories</h2>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach($categories as $category): ?>
    <div class="col">
        <div class="card h-100 shadow-sm hover-effect">
            <div class="card-body">
                <h3 class="card-title h5"><?= $category->name; ?></h3>
                <a href="<?= base_url('products/' . $category->slug); ?>" class="btn btn-primary mt-3">Browse Products</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>