<?php include 'config.php';

// SQL query to select data from database
$sql = "SELECT * FROM customer_transc";
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bank of America | Customers</title>
    <link rel="stylesheet" href="./assets/customer.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700,800">
</head>

<body>
    <div style="margin-top: 26px;">
        <h1 class="text-center justify-content-lg-center">Customer Transaction</h1>
    </div>
    <div class="div-two">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="padding-left: 21px;text-align: left;">Identity No</th>
                        <th style="text-align: left;">Full Name</th>
                        <th style="width: 325.2px;text-align: left;">E-mail ID</th>
                        <th style="text-align: left;">Balance</th>
                        <th>Info</th>
                    </tr>
                </thead>
				<?php
         			while($rows=$result->fetch_assoc())
         			{
     			?>                
                <tbody>
                    <tr>
                        <td style="padding-left: 21px;text-align: left;"><?php echo $rows['id'];?></td>
                        <td style="text-align: left;"><?php echo $rows['full_name'];?></td>
                        <td style="text-align: left;"><?php echo $rows['email_id'];?></td>
                        <td style="text-align: left;">₹ <?php echo $rows['balance'];?> /-</td>
                        <td><a class="btn" role="button" href="./transfer.php?id=<?php echo $rows['id'];?>" style="border-style: none;padding-top: 1px;padding-bottom: 1px;background: #c84f4b;color: #fff;border-radius: 0px;">Transfer</a></td>
                    </tr>
                </tbody>
				<?php
				 }
				?>                
            </table>
        </div>
    </div>
</body>

</html>