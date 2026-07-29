<?php require_once __DIR__ . '/../data/products.php'; ?>
<section class="hero">
    <h1>Fine art prints, framed for real life</h1>
    <p>Curated wall art, photography prints, and home decor — shipped ready to hang.</p>
</section>

<section class="product-grid">
    <?php foreach (getProducts() as $product): ?>
        <div class="product-card">
            <img src="image.php?file=<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <div class="card-body">
                <span class="category"><?php echo htmlspecialchars($product['category']); ?></span>
                <span class="name"><?php echo htmlspecialchars($product['name']); ?></span>
                <span class="price">$<?php echo number_format($product['price'], 2); ?></span>
                <div class="card-links">
                    <a href="index.php?page=pages/product.php&id=<?php echo (int) $product['id']; ?>">Details</a>
                    <a href="image.php?file=<?php echo htmlspecialchars($product['image']); ?>">View full-size image</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
