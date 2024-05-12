<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - List All Orders</title>
</head>
<body>
    <h3 class="text-center text-success">All orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-success">

        <?php
        $get_order="SELECT * FROM user_orders";
        $result=mysqli_query($con, $get_order);
        $row_count=mysqli_num_rows($result);


        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
        }else{
             echo " <tr>
                        <th>Sl no</th>
                        <th>Due Amount</th>
                        <th>Invoice number</th>
                        <th>Total products</th>
                        <th>Order date</th>
                        <th>Status</th>
                    </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";
        $number=0;
        while($row_fetch=mysqli_fetch_assoc($result)){
            $order_id=$row_fetch['order_id'];
            $user_id=$row_fetch['user_id'];
            $amount_due=$row_fetch['amount_due'];
            $invoice_number=$row_fetch['invoice_number'];
            $total_products=$row_fetch['total_products'];
            $order_date=$row_fetch['order_date'];
            $order_status=$row_fetch['order_status'];
            $number++;
            echo "<tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                 </tr>";
        }
     }
        ?>
        </tbody>
    </table>
</body>
</html>