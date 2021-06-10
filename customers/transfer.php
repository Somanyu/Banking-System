<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amt = $_POST['amount'];

    $sql = "SELECT * from customer_transc where `id`=$from";
    $query = mysqli_query($mysqli, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from customer_transc where `id`=$to";
    $query = mysqli_query($mysqli, $sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amt) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Payment must be at least ₹1.")';
        echo '</script>';
    } else if ($amt > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Your account has insufficient funds. Check that you have enough money.")';
        echo '</script>';
    } else {
        $new_balance = $sql1['balance'] - $amt;
        $sql = "UPDATE customer_transc set Balance=$new_balance where `id`=$from";
        mysqli_query($mysqli, $sql);

        $new_balance = $sql2['balance'] + $amt;
        $sql = "UPDATE customer_transc set Balance=$new_balance where `id`=$to";
        mysqli_query($mysqli, $sql);

        $sender = $sql1['full_name'];
        $receiver = $sql2['full_name'];
        $sql = "INSERT INTO history_transc(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amt')";
        $query = mysqli_query($mysqli, $sql);

        if ($query) {
            echo '<script type="text/javascript">';
            echo ' alert("Your transaction was Successfull!!")';
            echo '</script>';
        }

        $new_balance = 0;
        $amt = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <script src="https://use.fontawesome.com/81d61c39bf.js"></script> -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bank of America | Transaction</title>
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="./assets/transfer.css">
    <link rel="stylesheet" href="./assets/bootstrap.css">

</head>

<body>
    <div class="float-end">
        <a class="btn active" role="button" href="./history.php" style="background: #cb403b;color: #fff;border-style: none;border-radius: 0px;font-family: 'Open Sans', sans-serif;box-shadow: 2px 2px #ef6666;margin-right: 2px;">Transaction History  <i class="fas fa-long-arrow-alt-right" style="font-size: 18px;font-weight: bold; color:#fff;"></i>
        </a>
    </div>
    <section class="contact-clean">
        <?php
        include 'config.php';
        $sid = $_GET['id'];
        $sql = "SELECT * FROM `customer_transc` WHERE `id`=$sid";
        $result = mysqli_query($mysqli, $sql);
        if (!$result) {
            echo "Error : " . $sql . "<br>" . mysqli_error($mysqli);
        }
        $rows = mysqli_fetch_assoc($result);
        ?>
        <form name="tcredit" method="post">
            <h2 class="text-center" style="font-family: 'Raleway', sans-serif; font-size: 32px; color: #c84f4b;">Transaction</h2>
            <div class="table-responsive" style="margin-bottom: 1rem;">
                <table class="table">
                    <thead style="color: #fff;background: #c84f4b;font-family: Raleway, sans-serif;">
                        <tr>
                            <th>ID No.</th>
                            <th>Name&nbsp;</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody style="font-family: 'Open Sans', sans-serif;font-weight: 500;border-style: none;border-color: rgba(33,37,41,0);">
                        <tr style="border-style: none;">
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo $rows['full_name']; ?></td>
                            <td>₹ <?php echo $rows['balance']; ?> /-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-inline" style="text-align: center;width: 382px;">
                <h2 class="divider-style"><span style="font-size: 27px;color: #c84f4b;font-family: Raleway, sans-serif;font-weight: normal;font-style: italic;">Transfer to</span></h2>
            </div>
            <div class="mb-3">
                <select aria-placeholder="enter value" name="to" class="form-select" style="font-family: 'Open Sans', sans-serif;font-style: normal;" required>
                    <option value="" disabled selected>Send to</option>
                    <?php
                    include 'config.php';
                    $sid = $_GET['id'];
                    $sql = "SELECT * FROM customer_transc where `id`!=$sid";
                    $result = mysqli_query($mysqli, $sql);
                    if (!$result) {
                        echo "Error " . $sql . "<br>" . mysqli_error($mysqli);
                    }
                    while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $rows['id']; ?>">
                            <?php echo $rows['full_name']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" type="number" name="amount" style="font-family: 'Open Sans', sans-serif;" placeholder="Enter Amount" required>
                <small class="form-text text-danger" style="font-family: 'Open Sans', sans-serif;font-size: 13px;"><i class="fa fa-exclamation-circle"></i> &nbsp;Payment&nbsp;must&nbsp;be&nbsp;at&nbsp;least&nbsp;₹1<br></small>
            </div>
            <div class="mb-3">
                <button name="submit" class="btn active" type="submit" style="color: #fff;background: #cb403b;font-family: Raleway, sans-serif;border-style: none;border-radius: 0px;padding-top: 14px;padding-bottom: 14px;box-shadow: 2px 2px #ef6666;">Transfer</button>
            </div>
        </form>
    </section>
</body>

</html>