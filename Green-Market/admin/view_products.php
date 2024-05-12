<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - View products</title>
</head>
<body>
    <h2 class="text-center text-success">All Products</h2>

    <table class="table table-bordered mt-5">
        <thead class="bg-success">
            <tr>
                <th>Product ID</th>
                <th>Products Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light ">
            
            <?php
            $get_products="SELECT * FROM products";
            $result=mysqli_query($con, $get_products);
            $number=0;
            while($row=mysqli_fetch_array($result)){
                    $product_id=$row['product_id'];
                    $products_title=$row['product_title'];
                    $product_image=$row['product_image'];
                    $product_price=$row['product_price'];
                    $status=$row['status'];
                    $number++;
                    ?>


                    <tr class='text-center'>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $products_title; ?></td>
                    <td> <img src='./product_images/<?php echo $product_image; ?>' class='product_img'/></td>
                    <td><?php echo $product_price; ?>/ HUF</td>
                    <td><?php
                    $get_count="SELECT * FROM orders_pending WHERE product_id=$product_id";
                    $result_count=mysqli_query($con, $get_count);
                    $rows_count=mysqli_num_rows($result_count);
                    echo  $rows_count;
                    ?></td>
                    <td><?php echo $status; ?></td>
                    <td><a href='index.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
            }
            ?>

        </tbody>
    </table>
</body>
</html>