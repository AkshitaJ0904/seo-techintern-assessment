<?php
// Connect to your database
require_once 'application/config/database.php'; // Load your database config

// Create database connection using your CI config
$db_config = array(
    'hostname' => $db['default']['hostname'],
    'username' => $db['default']['username'],
    'password' => $db['default']['password'],
    'database' => $db['default']['database'],
    'dbdriver' => $db['default']['dbdriver']
);

$conn = new mysqli($db_config['hostname'], $db_config['username'], $db_config['password'], $db_config['database']);

// Set content type to XML
header('Content-Type: application/xml');

// Output XML declaration
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Homepage -->
    <url>
        <loc><?php echo 'https://' . $_SERVER['HTTP_HOST']; ?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>
    
    <!-- Categories -->
    <?php
    $result = $conn->query("SELECT slug FROM categories");
    while($category = $result->fetch_object()): 
    ?>
    <url>
        <loc><?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/products/' . $category->slug; ?></loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
    </url>
    <?php endwhile; ?>
    
    <!-- Products -->
    <?php
    $result = $conn->query("SELECT slug FROM products");
    while($product = $result->fetch_object()): 
    ?>
    <url>
        <loc><?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/product/' . $product->slug; ?></loc>
        <priority>0.6</priority>
        <changefreq>weekly</changefreq>
    </url>
    <?php endwhile; ?>
</urlset>
<?php
// Close connection
$conn->close();
?>
