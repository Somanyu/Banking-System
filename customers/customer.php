<?php include 'config.php';?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Bank of America | Transaction</title>
		<!-- CSS FOR STYLING THE PAGE -->
		<!-- <link rel="stylesheet" href="./customers/assets/customer.css"> -->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap');			
			@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
			@import url("https://fonts.googleapis.com/css2?family=Open+Sans&display=swap");

			*{
				box-sizing: border-box;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
			}
			body{
				font-family: Helvetica;
				-webkit-font-smoothing: antialiased;
				background: #000;
			}
			h2{
				text-align: center;
				font-size: 30px;
				text-transform: capitalize;
				font-weight: 800;
				letter-spacing: 1px;
				color: #c84f4b;
				font-family: "Raleway", sans-serif;
				padding: 30px 0;
			}

			/* Table Styles */

			.table-wrapper{
				margin: 10px 70px 30px;
				box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;				
			}

			.fl-table {
				font-size: 12px;
				font-weight: normal;
				border: none;
				border-collapse: collapse;
				width: 100%;
				max-width: 100%;
				white-space: nowrap;
				background-color: #000;
			}

			.fl-table td, .fl-table th {
				text-align: left;
				padding: 10px;
				font-family: "Open Sans", sans-serif;
				font-size: 15px;
				
			}

			.fl-table td {
				border-right: 0px solid #f8f8f8;
				font-size: 14px;
				color: #fff;
				padding-right: 50pt;
				display: table-cell;
				padding-left: 34px;
			}

			.data-row:hover {
				background-color: rgb(59, 60, 61);
			}

			.fl-table thead th {
				color: #ffffff;
				background: #c84f4b;
				text-align:center;
			}


			.fl-table thead th:nth-child(odd) {
				color: #fff;
				background: #c84f4b;
				text-align: center;
			}

			.fl-table tr:nth-child(even) {
				background: #F8F8F8;
			}

			/* .report-button {
				margin-top: -20pt;
				margin-bottom: 20pt;
				display: flex;
				justify-content: space-around;
			} */

			table .transfer {
    left: 4%;
    position: relative;
}


			/* Responsive */

			@media (max-width: 767px) {
				.fl-table {
					display: block;
					width: 100%;
				}
				.table-wrapper:before{
					content: "Scroll horizontally >";
					display: block;
					text-align: right;
					font-size: 11px;
					color: white;
					padding: 0 0 10px;
				}
				.fl-table thead, .fl-table tbody, .fl-table thead th {
					display: block;
				}
				.fl-table thead th:last-child{
					border-bottom: none;
				}
				.fl-table thead {
					float: left;
				}
				.fl-table tbody {
					width: auto;
					position: relative;
					overflow-x: auto;
				}
				.fl-table td, .fl-table th {
					padding: 20px .625em .625em .625em;
					height: 60px;
					vertical-align: middle;
					box-sizing: border-box;
					overflow-x: hidden;
					overflow-y: auto;
					width: 120px;
					font-size: 13px;
					text-overflow: ellipsis;
				}
				.fl-table thead th {
					text-align: left;
					border-bottom: 1px solid #f7f7f9;
				}
				.fl-table tbody tr {
					display: table-cell;
				}
				.fl-table tbody tr:nth-child(odd) {
					background: none;
				}
				.fl-table tr:nth-child(even) {
					background: transparent;
				}
				.fl-table tr td:nth-child(odd) {
					background: #F8F8F8;
					border-right: 1px solid #E6E4E4;
				}
				.fl-table tr td:nth-child(even) {
					border-right: 1px solid #E6E4E4;
				}
				.fl-table tbody td {
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

<body>
		<h2 class="customer-heading">Customer Transaction</h2>
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
        				<td><?php echo $rows['Identity No'];?></td>
         				<td><?php echo $rows['First Name'];?></td>
         				<td><?php echo $rows['E-mail ID'];?></td>
         				<td>₹ <?php echo $rows['Balance'];?> /-</td>
         				<td class="transfer">
							<a href="./exam.php?id=<?php echo $rows['Identity No'];?>">
          						<button class="customer-report" type="button">
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
