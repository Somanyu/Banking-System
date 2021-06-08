<?php
include 'config.php';

if(isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amt = $_POST['amount'];

    $sql = "SELECT * from customer_transc where `id`=$from";
    $query = mysqli_query($mysqli, $sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customer_transc where `id`=$to";
    $query = mysqli_query($mysqli,$sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amt)<0) {
         echo '<script type="text/javascript">';
         echo ' alert("Payment must be at least ₹1.")';
         echo '</script>';
    }
     
     else if($amt > $sql1['balance']) {
         
         echo '<script type="text/javascript">';
         echo ' alert("Your account has insufficient funds. Check that you have enough money.")'; 
         echo '</script>';
    }
         
      else {
          $new_balance = $sql1['balance'] - $amt;
          $sql = "UPDATE customer_transc set Balance=$new_balance where `id`=$from";
          mysqli_query($mysqli, $sql);

          $new_balance = $sql2['balance'] + $amt;
          $sql = "UPDATE customer_transc set Balance=$new_balance where `id`=$to";
          mysqli_query($mysqli,$sql);

          $sender = $sql1['full_name'];
          $receiver = $sql2['full_name'];
          $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amt')";
          $query=mysqli_query($mysqli,$sql);

          if($query){
            echo '<script type="text/javascript">';
            echo ' alert("Your transaction was Successfull!!")'; 
            echo '</script>';
       }

       $new_balance=0;
       $amt=0;
      }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank of America | Transaction</title>
</head>
<body>
    <div class="container">
        <div class="text-center">
        <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM `customer_transc` WHERE `id`=$sid";
                $result=mysqli_query($mysqli, $sql);
                if(!$result)
                {
                    echo "Error : " . $sql . "<br>" . mysqli_error($mysqli);
                }
                $rows=mysqli_fetch_assoc($result);
        ?>
            <form name="tcredit" class="tabletext" method="post"><div>
                <table class="table">
                    <tr>
                        <th class="textcenter">Identity No</th>
                        <th class="textcenter">Name</th>
                        <th class="textcenter">E-mail ID</th>
                        <th class="textcenter">Balance</th>
                    </tr>
                    <tr>
                        <td class="customer-data"><?php echo $rows['id'] ?></td>
                        <td class="customer-data"><?php echo $rows['full_name'] ?></td>
                        <td class="customer-data"><?php echo $rows['email_id'] ?></td>
                        <td class="customer-data"><?php echo $rows['balance'] ?></td>
                    </tr>
                </table>
            </div>
            <label for="" class="transfer-to">Transfer to :</label>
            <select name="to" class="senders" required>
                <option value="" disabled selected>Choose Sender</option>
                <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql="SELECT * FROM customer_transc where `id`!=$sid";
                $result=mysqli_query($mysqli, $sql);
                if(!$result) {
                    echo "Error " . $sql . "<br>" . mysqli_error($mysqli);
                } 
                while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $rows['id']; ?>">
                    <?php echo $rows['full_name']; ?>
                </option>
                <?php
                }
                ?>
    
            </select>
            <label for="" class="amount"></label>
                <input type="number" name="amount" placeholder="enter amount" class="enter-amount" required>
                <div>
            
                    <button type="submit" class="transfer-button" name="submit">Transfer Amount</button>
                    <a href="./customer.php">
          						<button class="home" type="button">
            						Back
          						</button>
        			</a>
                </div>
            
        </form>
        </div>
    </div>
</body>
</html>