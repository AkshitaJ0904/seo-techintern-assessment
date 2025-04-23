<div class="row mb-4">
    <div class="col-md-12">
        <h1>Admin Dashboard</h1>
        <p class="lead">Welcome to the Product Listing Platform admin area.</p>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Categories</h5>
                        <h2 class="display-4"><?= $categories_count; ?></h2>
                    </div>
                    <i class="fas fa-folder fa-3x opacity-50"></i>
                </div>
                <a href="<?= base_url('admin/categories'); ?>" class="btn btn-light mt-3">Manage Categories</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Products</h5>
                        <h2 class="display-4"><?= $products_count; ?></h2>
                    </div>
                    <i class="fas fa-box fa-3x opacity-50"></i>
                </div>
                <a href="<?= base_url('admin/products'); ?>" class="btn btn-light mt-3">Manage Products</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">SEO Tools</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Sitemap</h6>
                        <p>View your sitemap to ensure all pages are indexed properly by search engines.</p>
                        <a href="<?= base_url('sitemap.xml'); ?>" class="btn btn-sm btn-primary" target="_blank">View Sitemap</a>
                    </div>
                    <div class="col-md-6">
                        <h6>Robots.txt</h6>
                        <p>Check your robots.txt file configuration for search engine crawlers.</p>
                        <a href="<?= base_url('robots.txt'); ?>" class="btn btn-sm btn-primary" target="_blank">View Robots.txt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
