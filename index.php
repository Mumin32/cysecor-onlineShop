<?php
require_once "./public/header.php";
require_once "./app/classes/Product.php";

$product = new Product($conn);
$products = $product->fetchAllProducts();

?>
<div class="row">
    <?php foreach ($products as $product) : ?>
        <div class="card" style="width: 18rem;">
            <img src="<?= $product["image"] ?> " class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $product["name"] ?> </h5>
                <p class="card-text"><?= $product["size"] ?> </p>
                <p class="card-text"><?= $product["price"] ?> </p>
                <a href="product.php?product_id=<?= $product["product_id"] ?>" class="btn btn-primary"> View Product</a>
            </div>
        </div>
    <?php endforeach ?>
</div>


<?php
require_once "./public/footer.php";
?>