<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - Admin Registration</title>

    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
body{
    overflow-x: hidden;
}
</style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_registration.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Username</label>
                        <input type="text" id="admin_name" placeholder="Enter Your Name" 
                        required="required" class="form-control"  name="admin_name">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" placeholder="Enter Your Email" 
                        required="required" class="form-control" name="email">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" placeholder="Enter Your Password" 
                        required="required" class="form-control" name="password">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" placeholder="Confirm Your Password" 
                        required="required" class="form-control" name="confirm_password">
                    </div>
                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password, PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
 

    // select query
    $select_query="SELECT * FROM admin_table WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Username and Email already exists!')</script>";
       
    }elseif($password!=$confirm_password){
        echo "<script>alert('Password Do not Match!')</script>";
    }
    
    else{
   
    $insert_query="INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$hash_password')";

    $sql_execute=mysqli_query($con, $insert_query);
    if($sql_execute){
        echo "<script>alert('Admin registered successfully!')</script>";
        echo "<script>window.open('./admin_login.php','_self')</script>";
    }else{
        die(mysqli_error($con));
    }
    }
}
?>