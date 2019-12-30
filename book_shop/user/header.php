<?php 
    $loged= new logedin;
    $result = $loged-> loginCheck();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><a href="#" class="web-url">www.bookstore.com</a></div>
                    <div class="col-md-6">
                        <h5>Free Shipping Over $99 + 3 Free Samples With Every Order</h5></div>
                    <div class="col-md-3">
                        <span class="ph-number">Call : 800 1234 5678</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="home.php"><img src="images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="navbar-item active">
                                <a href="home.php" class="nav-link">Home</a>
                            </li>
                            <li class="navbar-item">
                                <a href="shop.php" class="nav-link">Shop</a>
                            </li>
                             <?php 
                                  $id = 0;
                                  if($result)
                                  {
                                    $id = $_SESSION['id'];
                                    ?>
                                      <li class="navbar-item">
                                        <a href="addbook.php" class="nav-link">Add Books</a>
                                    </li>
                                    <li class="navbar-item">
                                        <a href="mybook.php" class="nav-link">My Books</a>
                                    </li>
                                      <?php
                                  }
                                 ?>
                            <li class="navbar-item">
                                <a href="about.html" class="nav-link">About</a>
                            </li>
                            <li class="navbar-item">
                                <a href="faq.html" class="nav-link">FAQ</a>
                            </li>
                            <li class="navbar-item">
                                <?php 
                                
                                  if($result)
                                  {?>
                                      <a href="logout.php" class="nav-link">Logout</a>
                                      <?php
                                  }
                                  else
                                  {?>
                                    <a href="login.php" class="nav-link">Login</a>
                                    <?php
                                 }
                                 ?>
                               
                            </li>
                        </ul>
                        <?php
                            if($result):
                            ?>
                        <div class="cart my-2 my-lg-0">
                            <span>
                               <a href="cart.php"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
                            <span class="quntity">3</span>
                        </div>
                        <?php
                            endif;
                        ?>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search here..." aria-label="Search">
                            <span class="fa fa-search"></span>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </header>