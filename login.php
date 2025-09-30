<?php
require_once "./public/header.php";
require_once "./app/classes/User.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($conn);
    $result = $user->login($username, $password);

    if (!$result) {
        $_SESSION['message']['type'] = "danger";
        $_SESSION['message']['text'] = "Netacan username ili sifra";
        header("Location: login.php");
        exit();
    }
    header("Location: index.php");
    exit();
}

?>



<form action="" method="post">
    <div class="form-group">
        <label for="email">Username :</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>

    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <button type="submit" class="btn btn-default btn-primary">Login</button>
</form>

<a href="register.php"> Register</a>

<?php require_once "./public/footer.php" ?>