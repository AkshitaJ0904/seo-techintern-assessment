<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Manage Products</h1>
    <a href="<?= base_url('admin/products/create'); ?>" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add New Product
    </a>
</div>

<?php if(empty($products)): ?>
<div class="alert alert-info">
    No products found. Create your first product using the button above.
</div>
<?php else: ?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <td><?= $product->id; ?></td>
                        <td>
                            <?= $product->title; ?>
                            <a href="<?= base_url('product/' . $product->slug); ?>" target="_blank" class="ms-1 text-muted">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </td>
                        <td><?= $product->category_name; ?></td>
                        <td>$<?= number_format($product->price, 2); ?></td>
                        <td><?= date('M d, Y', strtotime($product->created_at)); ?></td>
                        <td>
                            <a href="<?= base_url('admin/products/edit/' . $product->id); ?>" class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/products/delete/' . $product->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>