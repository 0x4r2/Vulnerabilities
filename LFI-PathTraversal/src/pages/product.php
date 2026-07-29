<?php
require_once __DIR__ . '/../data/products.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$product = getProductById($id);
?>

<?php if ($product): ?>
    <div class="product-detail">
        <img src="image.php?file=<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        <div class="info">
            <span class="category"><?php echo htmlspecialchars($product['category']); ?></span>
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
            <p><a href="index.php?page=pages/home.php">&larr; Back to gallery</a></p>
        </div>
    </div>
<?php else: ?>
    <div class="static-page">
        <h1>Product not found</h1>
        <p>We couldn't find the item you were looking for.</p>
        <p><a href="index.php?page=pages/home.php">&larr; Back to gallery</a></p>
    </div>
<?php endif; ?>
