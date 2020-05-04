<?php include('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <script type="text/javascript" src="js/formA4.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=PT+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/formA7.css">
</head>

<body>
    <nav class="top_menu">
        <ul>
            <li><a href="index.php">Order Form</a></li>
            <li><a href="allorders.php">Orders</a></li>
        </ul>
    </nav>
    <h2 id="invoiceHeader">MEDIA STORE'S ALL ORDERS</h2>
    <div class="myTable">
        <table class="table">
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>City</th>
                <th>Postcode</th>
                <th>Province</th>
                <th>Laptop order</th>
                <th>Smartphone order</th>
                <th>Desktop order</th>
                <th>Total Cost</th>
            </tr>
            <?php
            $sqlquery = 'SELECT * FROM orders';
            $sqlResult = $db->query($sqlquery);

            //Check if there is any result
            if ($sqlResult->num_rows > 0) {
                while ($row = $sqlResult->fetch_assoc()) { ?>
                    <tr>
                        <th><?php echo $row['id']?></th>
                        <th><?php echo $row['name']?></th>
                        <th><?php echo $row['email']?></th>
                        <th><?php echo $row['phone']?></th>
                        <th><?php echo $row['address']?></th>
                        <th><?php echo $row['city']?></th>
                        <th><?php echo $row['postcode']?></th>
                        <th><?php echo $row['province']?></th>
                        <th><?php echo $row['product1']?></th>
                        <th><?php echo $row['product2']?></th>
                        <th><?php echo $row['product3']?></th>
                        <th><?php echo $row['totalCost']?></th>
                    </tr>
            <?php
                }
            }
            ?>

        </table>
    </div>
</body>

</html>