<?php

// Fetching and displaying a set of products in home page
function getProducts(){

    global $con;
    
    if(!isset($_GET['category'])){
    $select_query="SELECT * FROM products ORDER BY rand() LIMIT 0,6"; // limit the number of products AND randomize them 
    $result_query=mysqli_query($con, $select_query);
   
    while( $row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
                 <div class='card'>
                 <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <p class='card-text'>Price: $product_price/-</p>
                       <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart!</a>
                    </div>
                 </div>
             </div> ";    
    }
}
}

// Get all products 
function getAllProducts(){
    global $con;

    if(!isset($_GET['category'])){
    $select_query="SELECT * FROM products ORDER BY rand()";
    $result_query=mysqli_query($con, $select_query);
    while( $row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                     <h5 class='card-title'>$product_title</h5>
                     <p class='card-text'>$product_description</p>
                     <p class='card-text'>Price: $product_price/-</p>
                     <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart!</a>
                   </div>
                </div>
              </div> ";    
    }
}
}

// Fetching and displaying products belonging to a specific category 
function getUniqueCategories(){
    global $con;

    if(isset($_GET['category'])){
    $category_id=$_GET['category'];
    $select_query="SELECT * FROM products WHERE category_id=$category_id";
    $result_query=mysqli_query($con, $select_query);
    $number_of_row=mysqli_num_rows($result_query);
    if($number_of_row==0){
        echo "<h2 class='text-center text-danger'>No products available for this category!</h2>";
    }

    while( $row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                   <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                     <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <p class='card-text'>Price: $product_price/-</p>
                       <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart!</a>
                     </div>
                </div>
              </div> ";    
    }
}
}

// Select and display categories
function getCategories(){
    global $con;
    $select_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
              </li>";
    }
}

// Search Products based on product_keywords 
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="SELECT * FROM products WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query=mysqli_query($con, $search_query);

        $number_of_row=mysqli_num_rows($result_query);
    if($number_of_row==0){
        echo "<h2 class='text-center text-danger'>No results!</h2>";
    }
    while( $row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: $product_price/-</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart!</a>
                   </div>
               </div>
             </div> ";    
    }
    }
}

// Get IP address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
        $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}   

// cart function for adding products to a shopping cart
function cart(){
if(isset($_GET['add_to_cart'])){

    global $con;
    $ip = getIPAddress();  
    $get_product_id=$_GET['add_to_cart'];
    
    $select_query="SELECT * FROM cart_details WHERE ip_address='$ip' AND product_id=$get_product_id";
    $result_query=mysqli_query($con, $select_query);
    $number_of_row=mysqli_num_rows($result_query);
    if($number_of_row>0){
        echo "<script>alert('This item is Already added to cart')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }else{
        $insert_query="INSERT INTO cart_details (product_id,ip_address,quantity) VALUES ($get_product_id, '$ip', 0)";
        $result_query=mysqli_query($con, $insert_query);
        echo "<script>alert('Item is added to cart!')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }
}
}

// Determine and display the number of items in the shopping cart for a specific user
function cartItem(){
    
if(isset($_GET['add_to_cart'])){

    global $con;
    $ip = getIPAddress();  
    $select_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
    $result_query=mysqli_query($con, $select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $con;
        $ip = getIPAddress();  
        $select_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
        $result_query=mysqli_query($con, $select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

// Calculates and display the total price of items in shopping cart for a specific user
function totalPriceCart(){
    global $con; 
    $ip = getIPAddress();
    $total_price=0;
    $cart_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
    $result=mysqli_query($con, $cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="SELECT * FROM products WHERE product_id=' $product_id'";
        $result_product=mysqli_query($con, $select_products);
        while($row_product_price=mysqli_fetch_array($result_product)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        }
    }
    echo $total_price;
}

// Retrieve and display details related to orders (pending orders) for a user 
function get_user_details(){
    global $con;

    $username= $_SESSION['username'];
    $get_details="SELECT * FROM user_table WHERE username='$username'";
    $result_query=mysqli_query($con, $get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_order="SELECT * FROM user_orders WHERE user_id=$user_id AND order_status='pending'";
                    $result_orders_query=mysqli_query($con, $get_order);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> Pending orders</h3>
                              <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    }else{
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero Pending orders</h3>
                              <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
                    }
                }
            }
        }
    }
}
?>