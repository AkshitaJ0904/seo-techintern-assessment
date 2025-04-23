<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Manage Categories</h1>
    <a href="<?= base_url('admin/categories/create'); ?>" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add New Category
    </a>
</div>

<?php if(empty($categories)): ?>
<div class="alert alert-info">
    No categories found. Create your first category using the button above.
</div>
<?php else: ?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?= $category->id; ?></td>
                        <td><?= $category->name; ?></td>
                        <td><?= $category->slug; ?></td>
                        <td><?= date('M d, Y', strtotime($category->created_at)); ?></td>
                        <td>
                            <a href="<?= base_url('admin/categories/edit/' . $category->id); ?>" class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/categories/delete/' . $category->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category?');">
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