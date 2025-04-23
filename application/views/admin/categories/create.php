<div class="mb-4">
    <h1>Create Category</h1>
</div>

<div class="card">
    <div class="card-body">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        
        <?= form_open('admin/categories/create'); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Enter category name">
            <small class="form-text text-muted">The slug will be automatically generated from the category name.</small>
        </div>
        <div class="d-flex">
            <button type="submit" class="btn btn-primary me-2">Create Category</button>
            <a href="<?= base_url('admin/categories'); ?>" class="btn btn-outline-secondary">Cancel</a>
        </div>
        <?= form_close(); ?>
    </div>
</div>