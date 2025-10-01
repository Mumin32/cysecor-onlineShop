<?php
require_once "./public/header.php";
require_once "./app/classes/Product.php";
require_once "./app/classes/Cart.php";

$product = new Product($conn);
$product = $product->read($_GET['product_id']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];

    $cart = new Cart($conn);
    $cart->add_to_cart($product_id, $user_id);

    header("Location: cart.php");
    exit();
}
?>

<div>
    <div class="row">

        <div class="card" style="width: 18rem;">
            <img src="<?= $product["image"] ?> " class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $product["name"] ?> </h5>
                <p class="card-text"><?= $product["size"] ?> </p>
                <p class="card-text"><?= $product["price"] ?> </p>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>

            </div>
        </div>
    </div>
    <?php require_once "./public/footer.php"; ?>