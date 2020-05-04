<?php include('db_connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Khang Do - Assignment 7</title>
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

    <h2 id="formHeader">MEDIA STORE</h2>
    <form name="myform" method="POST" onsubmit="return formSubmit();" action="process.php" id="form">
        <label for="name">Name*</label>
        <input id="name" placeholder="First Last" type="text" name="name" autofocus><br/>

        <label for="email">Email*</label>
        <input id="email" placeholder="email@domain.com" type="text" name="email"><br/>

        <label for="phone">Phone*</label>
        <input id="phone" placeholder="123-123-1234" type="text" name="phone"><br/>

        <label for="address">Address*</label>
        <input id="address" placeholder="123 Trafalgar Street" type="text" name="address"><br/>

        <label for="city">City*</label>
        <input id="city" placeholder="Toronto" type="text" name="city"><br/>

        <label for="postcode">Post Code*</label>
        <input id="postcode" placeholder="X9X 9X9" type="text" name="postcode"><br/>

        <label>Province*</label>
        <select name="province" id="province">
        <option value="">----- Select -----</option>
        <option value="alberta">Alberta</option>
        <option value="BC">British Columbia</option>
        <option value="manitoba">Manitoba</option>
        <option value="newBrunswick">New-Brunswick</option>
        <option value="newfoundland">Newfoundland and Labrador</option>
        <option value="novaScotia">Nova Scotia</option>
        <option value="ontario">Ontario</option>
        <option value="quebec">Québec</option>
        <option value="saskatchewan">Saskatchewan</option>
        </select>
        <br><br>

        <label for="product1">Laptop</label>
        <input type="text" name="product1" id="product1" >

        <label for="product2">Smartphone</label>
        <input type="text" name="product2" id="product2">

        <label for="product3">Desktop</label>
        <input type="text" name="product3" id="product3">

        <label>Delivery Time</label>
        <select name="delivery" id="delivery">
        <option value="">----- Select -----</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </select>
        <br><br>

        <input type="submit" value="Place Order">
        
    </form>    

    
</body>

</html>