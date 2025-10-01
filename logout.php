<?php
require_once "./app/classes/User.php";
require_once "./config/config.php";

$user = new User($conn);
$user->logout();

header("Location: login.php");
exit();
