<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - All Payment</title>
</head>
<body>
    <h3 class="text-center text-success">All Payment</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-success">

        <?php
        
        $get_payment="SELECT * FROM user_payments";
        $result=mysqli_query($con, $get_payment);
        $row_count=mysqli_num_rows($result);


        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Payment received yet</h2>";
        }else{
                 echo " <tr>
                            <th>Sl No</th>
                            <th>Invoice number</th>
                            <th>Amount</th>
                            <th>Payment Mode</th>
                            <th>Order date</th>
                        </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";
            $number=0;
            while($row_fetch=mysqli_fetch_assoc($result)){
            $order_id=$row_fetch['order_id'];
            $payment_id=$row_fetch['payment_id'];
            $amount=$row_fetch['amount'];
            $invoice_number=$row_fetch['invoice_number'];
            $payment_mode=$row_fetch['payment_mode'];
            $date=$row_fetch['date'];

            $number++;
            echo "<tr>
                        <td>$number</td>
                        <td>$invoice_number</td>
                        <td>$amount</td>
                        <td>$payment_mode</td>
                        <td>$date</td>
                 </tr>";
            }
        }
        ?>
        
        </tbody>
    </table>
</body>
</html>