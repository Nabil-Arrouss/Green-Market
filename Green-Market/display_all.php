<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - All Products</title>

    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file  -->
    <link rel="stylesheet" href="style.css">

<style>
body{
    overflow-x:hidden;
}
</style>    

</head>
<body>
    <!-- NavBar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container-fluid">
                <img src="./images/Logo.jpeg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>

                    <?php
                        if(isset($_SESSION['username'])){
                             echo "<li class='nav-item'>
                                   <a class='nav-link' href='./user_area/profile.php'>My Account</a>
                                   </li>";
                        }else{
                             echo "<li class='nav-item'>
                                   <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                                   </li>";
                        }                     
                    ?>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                             cartItem(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php totalPriceCart(); ?>/ HUF</a>
                        </li>
                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <input type="submit" value="Search" class="btn btn-outline-light">
                    </form>
                </div>
            </div>
        </nav>

        <!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                              <a class='nav-link' href='#'>Welcome Guest</a>
                              </li>";
                    }else{
                        echo "<li class='nav-item'>
                              <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                              </li>";
                    }

                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                              <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                              </li>";
                    }else{
                        echo "<li class='nav-item'>
                              <a class='nav-link' href='./user_area/logout.php'>Logout</a>
                              </li>";
                    }
                ?>

            </ul>
        </nav>

        <!-- Third child -->
        <div class="gb-light">
            <h3 class="text-center">Green Market</h3>
            <p class="text-center">Reduce, Reuse, Recycle, and Shop Green</p>
        </div>

        <!-- Fourth child -->
        <div class="row px-1">
            <div class="col-md-10">          
                <div class="row">

                <!--fetching products and displaying -->
                <?php
                    getAllProducts();
                    getUniqueCategories();
                ?>

                </div>
            </div>
            <!-- Side Navbar -->
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-success">
                        <a href="#" class="nav-link text-light"><h4>All Categories</h4></a>
                    </li>

                    <?php
                    getCategories();
                    ?>

                </ul>
            </div>
        </div>

           <!-- Footer -->
           <?php  include("./includes/footer.php");?>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>