<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - Payment Page</title>

        <!-- Bootstrap CSS link-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
</head>
<style>
.payment_img{
    width:90%;
    margin:auto;
    display:block;
}
</style>
<body>

<!-- PHP code to access user id-->
<?php
$user_ip=getIPAddress();
$get_user="SELECT * FROM user_table WHERE user_ip='$user_ip'";
$result=mysqli_query($con, $get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
?>

    <div class="container">
        <h2 class="text-center text-success">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.otpbank.hu"><img src="../images/otpbank.png" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline! Choose other methods</h2></a>
            </div>
        </div>
    </div>
</body>
</html>