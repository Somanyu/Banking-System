<?php include 'config.php';

// SQL query to select data from database
$sql = "SELECT * FROM customer_transc";
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Bank of America | Customer</title>
		<link rel="stylesheet" href="./assets/customer.css">
	</head>

	<body>
		<h2 class="customer-heading">Customer Transaction &#129534</h2>
		<!-- <div class="report-button">
        	<a href="#">
          		<button class="customer-report" type="button">
            		View Customer Report
          		</button>
        	</a>
        	<a href="#">
          		<button class="customer-report" type="button">
            		View Customer Report
          		</button>
        	</a>
      	</div> -->
		<div class="table-wrapper">
			<table class="fl-table">
				<thead>
					<tr>
						<th>Identity No</th>
						<th>Name</th>
						<th>E-mail ID</th>
						<th>Balance</th>
						<th>Info</th>
					</tr>
				</thead>
				<?php
         			while($rows=$result->fetch_assoc())
         			{
     			?>
				<tbody>
			    	<tr class="data-row">
        				<td><?php echo $rows['id'];?></td>
         				<td><?php echo $rows['full_name'];?></td>
         				<td><?php echo $rows['email_id'];?></td>
         				<td>₹ <?php echo $rows['balance'];?> /-</td>
         				<td class="transfer">
							<a href="./transfer.php?id=<?php echo $rows['id'];?>">
          						<button class="customer-transfer" type="button">
            						Transfer
          						</button>
        					</a>
						</td>
     				</tr>
				</tbody>
				<?php
				 }
				?>
			</table>
		</div>
	</body>

</html>
