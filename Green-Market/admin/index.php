<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - Admin Dashboard</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
     crossorigin="anonymous">

     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
     <link rel="stylesheet" href="../style.css">
<style>
.admin-image{
    width: 100px;
    object-fit: contain;
}
.footer{
    position: absolute;
    bottom: 0;
}
body{
    overflow-x:hidden;
}
.product_img{
    width:100px;
    object-fit: contain;
}

</style>
</head>
<body>
    <!-- Nav Bar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container-fluid">
                <img src="../images/Logo.jpeg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome!</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!--second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Admin Dashboard</h3>

        </div>
           
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/fibre-clothes.jpeg" alt="" class="admin-image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                <button><a href="../index.php" class="nav-link text-dark bg-success my-1" target="_blank">Go to Store</a></button>
                <button><a href="insert-products.php" class="nav-link text-dark bg-success my-1 ">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-dark bg-success my-1 ">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-dark bg-success my-1 ">Insert Categories</a></button>
                <button><a href="index.php?view-categories" class="nav-link text-dark bg-success my-1 ">View Categories</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-dark bg-success my-1 ">All Orders</a></button>
                <button><a href="index.php?list_payments" class="nav-link text-dark bg-success my-1 ">All Payments</a></button>
                <button><a href="index.php?list_users" class="nav-link text-dark bg-success my-1 ">List Users</a></button>
                <button><a href="logout.php" class="nav-link text-dark bg-success my-1 ">Logout</a></button>
                </div>
            </div>
        </div>
        <!-- fourth child  -->

        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert-categories.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_products'])){
                include('delete_product.php');
            }
            if(isset($_GET['view-categories'])){
                include('view-categories.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            ?>
        </div>

    </div>


      <!-- footer -->
      <?php  include("../includes/footer.php");?>

    </div>
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
 crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>