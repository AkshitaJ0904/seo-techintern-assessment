</div>

    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Product Listing Platform</h5>
                    <p>Explore our wide range of products at competitive prices.</p>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url(); ?>" class="text-light">Home</a></li>
                        <?php foreach($this->CategoryModel->get_all_categories() as $footer_category): ?>
                        <li><a href="<?= base_url('products/' . $footer_category->slug); ?>" class="text-light"><?= $footer_category->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>SEO Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('sitemap.xml'); ?>" class="text-light">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-3">
            <div class="text-center">
                <p>&copy;  Akshita's Product Listing Platform. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
</body>
</html>