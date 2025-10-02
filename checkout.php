<?php
require_once "./public/header.php";
require_once "./app/classes/Cart.php";
require_once "./app/classes/Order.php";

if (!$user->is_logged()) {
    header('Location: login.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $order = new Order($conn);
    $order = $order->create();
}
?>
<form action="" method="post">
    <div class="form-group">
        <label for="email">Country :</label>
        <input type="text" class="form-control" id="country" name="country">
    </div>

    <div class="form-group">
        <label for="pwd">City:</label>
        <input type="city" class="form-control" id="pwd" name="city">
    </div>
    <div class="form-group">
        <label for="pwd">Zip:</label>
        <input type="zip" class="form-control" id="pwd" name="zip">
    </div>
    <div class="form-group">
        <label for="pwd">Address:</label>
        <input type="address" class="form-control" id="pwd" name="address">
    </div>
    <button type="submit" class="btn btn-default btn-primary">Order</button>
</form>


<?php require_once "./public/footer.php" ?>