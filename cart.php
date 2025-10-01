<?php
require_once "./public/header.php";
require_once "./app/classes/Cart.php";

if (!$user->is_logged()) {
    header('Location: login.php');
    exit();
}
$cart = new Cart($conn);
$cart_items = $cart->get_cart_items();
var_dump($cart_items)
?>

<table class="table table-striped">
    <thead>
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Size</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart_items as $item) : ?>
            <tr>
                <th scope="row"><?php echo  $item['name'] ?></th>
                <td><?= $item['size'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['image'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php require_once "./public/footer.php"; ?>