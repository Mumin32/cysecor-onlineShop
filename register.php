<?php
require_once "./public/header.php";
require_once "./app/classes/User.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user  = new User($conn);
    $created = $user->create($name, $username, $email, $password);

    if ($created) {
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['text'] = "Uspjesno registrovan nalog";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message']['type'] = "danger";
        $_SESSION['message']['text'] = "Greska";
        header("Location: register.php");
        exit();
    }
}
?>



<form action="" method="post">
    <div class="form-group">
        <label for="email">Full Name :</label>
        <input type="text" class="form-control" id="email" name="name">
    </div>
    <div class="form-group">
        <label for="email"> Username :</label>
        <input type="text" class="form-control" id="email" name="username">
    </div>

    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <button type="submit" class="btn btn-default btn-primary">Submit</button>
</form>

<?php require_once "./public/footer.php" ?>