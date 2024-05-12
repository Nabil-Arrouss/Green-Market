<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - User registration</title>

        <!-- Bootstrap CSS link-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    
<style>
body{
    overflow-x:hidden;
}
</style> 
</head>
<body>
    
<div class="container-fluid m-3">
    <h2 class="text-center">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Username field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username"
                     autocomplete="off" required="required" name="user_username">
                </div>

                <!-- User email -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_username" class="form-control" placeholder="Enter Your Email"
                     autocomplete="off" required="required" name="user_email">
                </div>

                <!-- User image -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                </div>

                <!-- User password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password"
                     autocomplete="off" required="required" name="user_password">
                </div>

                <!-- confirm password -->
                <div class="form-outline mb-4">
                    <label for="confirm_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_user_password" class="form-control" placeholder="Confirm Password"
                     autocomplete="off" required="required" name="confirm_user_password">
                </div>
                <!-- User Address -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">User Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address"
                     autocomplete="off" required="required" name="user_address">
                </div>
                <!-- Username contact -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Mobile Phone"
                     autocomplete="off" required="required" name="user_contact">
                </div>

                <div class="text-center mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-success py-2 px-3 border-0" name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<!-- PHP code to register a new user. checking conditions (username,email and password confirm) 
        redirect to checkout if cart is full
-->
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
    $confirm_user_password=$_POST['confirm_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];

    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];

    $user_ip=getIPAddress();

    // select query
    $select_query="SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email'";
    $result=mysqli_query($con, $select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Username Or Email already exists!')</script>";
       
    }elseif($user_password!=$confirm_user_password){
        echo "<script>alert('Password Do not Match!')</script>";
    }
    
    else{
    // insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address,
     user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip',
      '$user_address', '$user_contact')  ";

    $sql_execute=mysqli_query($con, $insert_query);

    if($sql_execute){
        echo "<script>alert('User Registered successfully!')</script>";
        
    }else{
        die(mysqli_error($con));
    }
    }
    // selecting cart items
    $select_cart_items="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $result_cart=mysqli_query($con, $select_cart_items);
    $row_count=mysqli_num_rows($result_cart);

    if($row_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You Have Items in the cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>