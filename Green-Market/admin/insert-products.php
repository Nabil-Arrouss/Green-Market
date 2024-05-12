
<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){

    // Variables from the database
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_categories=$_POST['product_categories'];
    $product_price=$_POST['product_price'];
    $product_status='true';


    // Access images "FILES"  not "POST"
    $product_image=$_FILES['product_image']['name'];

    // Access image temp name 
    $tmp_product_image=$_FILES['product_image']['tmp_name'];

    // Checking empty condition 
    if($product_title=='' or $product_description=='' or $product_keywords==''
     or $product_categories=='' or $product_price=='' or $product_image==''){
        echo "<script>alert('Please fill all the available fields!')</script>";
        exit();
     }else{

        // Store inside image inside the folder "product_images"
        move_uploaded_file($tmp_product_image, "./product_images/$product_image");

        // Insert query
        $insert_products="INSERT INTO products (product_title,product_description,product_keywords,category_id,
        	product_image,product_price,date,status) VALUES ('$product_title','$product_description',
            '$product_keywords','$product_categories','$product_image','$product_price',NOW(),'$product_status')";

            $result_query=mysqli_query($con, $insert_products);
            if($result_query){
                echo "<script>alert('Successfully inserted the product')</script>";
            }
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - Insert Products</title>
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
</head>
<body class="bg-success">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                 placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                 placeholder="Enter product description" autocomplete="off" required="required">
            </div>
            <!--keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                 placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select a category</option>

                    <?php
                        $select_query="SELECT * FROM categories ";
                        $result_query=mysqli_query($con, $select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];   
                            echo "<option value='$category_id'>$category_title</option>";     
                        }
                    
                    ?>
                </select>
            </div>
            <!--image upload -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control"
                  required="required">
            </div>
            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                 placeholder="Enter product price" autocomplete="off" required="required">
            </div>
            <!-- Insert! -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-dark mb-3 px-3"
                 value="Insert Products">
            </div>

        </form>
    </div>
</body>
</html>