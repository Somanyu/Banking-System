<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bank of America | Transaction History</title>
    <link rel="stylesheet" href="./assets/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700">

    <style>
        tr:hover {
            background-color: rgb(248, 124, 124);
            color: rgb(255, 255, 255);
        }
    </style>
</head>

<body>
    <div class="d-flex float-none justify-content-lg-end"><a class="btn" role="button" href="https://github.com/Somanyu/Banking-System" style="color: #fff;background: #cb403b;border-style: none;border-radius: 0px;font-family: Raleway, sans-serif;font-weight: 600;padding-right: 23px;padding-left: 25px;box-shadow: 2px 2px #ef6666;margin-right: 2px; ">GitHub Code</a></div>
    <div>
        <h1 style="text-align: center;font-family: Raleway, sans-serif;font-weight: bold;color: #cb403b;margin-bottom: 0px;padding-top: 20px;padding-bottom: 20px;">Transaction History</h1>
    </div>
    <div style="padding-top: 24px;padding-right: 60px;padding-left: 60px;background: #ffecec;margin-right: 30px;margin-left: 30px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
        <div class="table-responsive">
            <table class="table">
                <thead style="font-size: 17px;">
                    <tr style="background: #cb403b;color: #fff;font-family: Raleway, sans-serif;">
                        <th style="padding-left: 15px;">Serial No</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                        <th style="padding-right: 0px;">Time/Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include './config.php';
                    $sql = "SELECT * from history_transc";
                    $query = mysqli_query($mysqli, $sql);
                    while ($rows = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr style="border-style: none;border-color: rgba(33,37,41,0);font-family: 'Open Sans', sans-serif;font-size: 16px;">
                            <td style="padding-left: 15px;"><?php echo $rows['serial_no']; ?></td>
                            <td><?php echo $rows['sender']; ?></td>
                            <td><?php echo $rows['receiver']; ?></td>
                            <td>₹ <?php echo $rows['balance']; ?> /-</td>
                            <td><?php echo $rows['datetime']; ?></td>
                        <?php
                    }
                    mysqli_close($mysqli);
                        ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>