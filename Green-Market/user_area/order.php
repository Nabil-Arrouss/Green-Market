<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

// getting total items and total price of all items

$get_ip=getIPAddress();
$total_price=0;

$cart_query_price="SELECT * FROM cart_details WHERE ip_address='$get_ip'";
$result_cart_price=mysqli_query($con, $cart_query_price);
$invoice_number=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart_price);

while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];

    // select products
    $select_product="SELECT * FROM products WHERE product_id=$product_id";
    $run_price=mysqli_query($con, $select_product);
        while($row_products_price=mysqli_fetch_array($run_price)){
            $products_price=array($row_products_price['product_price']);
            $products_value=array_sum($products_price);
            $total_price+=$products_value;
    }
}

// Getting quantity from cart
$get_cart="SELECT * FROM cart_details";
$run_cart=mysqli_query($con, $get_cart);

$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];

if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}
// Insert queery 
$insert_orders="INSERT INTO user_orders (user_id, amount_due ,invoice_number, total_products, order_date, order_status) 
                            VALUES ($user_id, $subtotal, $invoice_number,$count_products,NOW(),'$status')";

$results_query=mysqli_query($con, $insert_orders);
if($results_query){
    echo " <script>alert('Orders submitted successfully. Please Check Your Orders!')</script> ";
    echo " <script>window.open('profile.php','_self')</script> ";

}
//Order Pending
$insert_pending_orders="INSERT INTO orders_pending (user_id, invoice_number, product_id , quantity, order_status) 
                            VALUES ($user_id, $invoice_number,$product_id, $quantity,'$status')";

$result_pending_order=mysqli_query($con, $insert_pending_orders);

// delete items from cart
$empty_cart="DELETE FROM cart_details WHERE ip_address='$get_ip'";
$result_delete=mysqli_query($con, $empty_cart);
?>