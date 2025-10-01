<?php
require_once "./config/config.php";
require_once "./app/classes/User.php";

$user = new User($conn);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    </nav>
    <div class="container">



        <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show " role="alert">
                <?php
                echo $_SESSION['message']['text'];
                unset($_SESSION['message']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cysecor Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
                        </li>


                        <?php if (!$user->is_logged()) : ?>

                            <li class="nav-item">
                                <a class="nav-link" href="/register.php">Register</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/login.php">Login</a>
                            </li>
                        <?php else :  ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/orders.php">My Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cart.php">Cart</a>

                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/logout.php">Logout</a>
                            </li>


                        <?php endif; ?>
                    </ul>
                    <span class="navbar-text">
                        Navbar text with an inline element
                    </span>
                </div>
            </div>
        </nav>