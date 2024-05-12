<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - List All Users</title>
</head>
<body>
    <h3 class="text-center text-success">All Users</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-success">

        <?php
        
        $get_payment="SELECT * FROM user_table";
        $result=mysqli_query($con, $get_payment);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
             echo "<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
        }else{
             echo " <tr>
                      <th>Sl No</th>
                      <th>Username</th>
                      <th>User email</th>
                      <th>User Image</th>
                      <th>User Address</th>
                      <th>User Mobile</th>
                      </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";
        $number=0;
         while($row_fetch=mysqli_fetch_assoc($result)){
            $user_id=$row_fetch['user_id'];
            $username=$row_fetch['username'];
            $user_email=$row_fetch['user_email'];
            $user_image=$row_fetch['user_image'];
            $user_address=$row_fetch['user_address'];
            $user_mobile=$row_fetch['user_mobile'];
            $number++;
            echo "<tr>
                      <td>$number</td>
                      <td>$username</td>
                      <td>$user_email</td>
                      <td><img src='../user_area/user_images/$user_image' alt='$username' class='product_img'/></td>
                      <td>$user_address</td>
                      <td>$user_mobile</td>
                  </tr>";
         }
     }
        ?>
        </tbody>
    </table>
</body>
</html>