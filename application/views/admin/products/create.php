<div class="mb-4">
    <h1>Create Product</h1>
</div>

<div class="card">
    <div class="card-body">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <!-- IMPORTANT: add enctype="multipart/form-data" -->
        <?= form_open_multipart('admin/products/create'); ?>

        <div class="mb-3">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title'); ?>" placeholder="Enter product title" required>
            <small class="form-text text-muted">The slug will be automatically generated from the title.</small>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                <?php foreach($categories as $category): ?>
                <option value="<?= $category->id; ?>" <?= set_select('category_id', $category->id); ?>><?= $category->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="price" name="price" value="<?= set_value('price'); ?>" min="0" step="0.01" placeholder="0.00" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter product description" required><?= set_value('description'); ?></textarea>
            <small class="form-text text-muted">Use HTML tags for formatting if needed.</small>
        </div>

        <div class="mb-3">
            <label for="features" class="form-label">Features</label>
            <textarea class="form-control" id="features" name="features" rows="5" placeholder="Enter product features (one per line)" required><?= set_value('features'); ?></textarea>
            <small class="form-text text-muted">Enter one feature per line.</small>
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-primary me-2">Create Product</button>
            <a href="<?= base_url('admin/products'); ?>" class="btn btn-outline-secondary">Cancel</a>
        </div>

        <?= form_close(); ?>
    </div>
</div>
