<?php
if (empty($_POST)) {
    //Return to index.php if users haven't submitted a form.
    header('Location: index.php');
}
include('db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Receipt</title>
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
    <h2 id="invoiceHeader">MEDIA STORE'S INVOICE</h2>
    <div class="formData" id="formData">

        <?php
        //Store errors
        $errors = '';

        //fetch all the input values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $postcode = $_POST['postcode'];
        $province = $_POST['province'];
        $product1 = $_POST['product1'];
        $product2 = $_POST['product2'];
        $product3 = $_POST['product3'];
        $delivery = $_POST['delivery'];

        //Sanitize values
        $name = trim($name);
        $email = trim($email);
        $phone = trim($phone);
        $address = trim($address);
        $city = trim($city);
        $postcode = trim($postcode);
        $province = trim($province);
        $product1 = trim($product1);
        $product2 = trim($product2);
        $product3 = trim($product3);
        $delivery = trim($delivery);

        //Regular Expression            
        $postcodeRegex = '/^[A-Z][0-9][A-Z]\s?[0-9][A-Z][0-9]$/'; //Postcode regular expression
        $phoneRegex = '/^[0-9]{3}[\-\.\s]?[0-9]{3}[\-\.\s]?[0-9]{4}$/'; //Phone number Regular Expression
        $addressRegex = '/^\d+\s[A-Za-z0-9\s]+$/'; //Address Regular Expression            
        $numberRegex = '/^[1-9][0-9]*$/'; //Required at least 1 product.

        //Validation
        //Check Regex function
        function checkRegex($reg, $userInput, $message)
        {
            if (!preg_match($reg, $userInput)) {
                return $message . '<br>';
            } else {
                return '';
            }
        }

        //Name is not an empty string
        if ($name == '') {
            $errors .= 'Name is required.<br>';
        }

        //Check the email format email@domain.com
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors .= 'Email is not in a correct format.<br>';

        //Check the phone format 123-123-1234
        $errors .= checkRegex($phoneRegex, $phone, 'Phone number is not in a correct format.<br>');

        //Check the address format
        $errors .= checkRegex($addressRegex, $address, 'Address is not in a correct format.<br>');

        //Check the city format
        if ($city == '') {
            $errors .= 'City is required.<br>';
        }        

        //Check the postcode format            
        $errors .= checkRegex($postcodeRegex, $postcode, 'Postcode is not in a correct format.<br>');

        //Check the province selected
        if ($province == '') {
            $errors .= 'Please select your province.<br>';
        }

        //Please pick 1 product
        if ((!preg_match($numberRegex, $product1) && (!preg_match($numberRegex, $product2)) && (!preg_match($numberRegex, $product3)))) {
            $errors .= 'Please select 1 product. <br>';
        }

        //Check the delivery time selected
        if ($delivery == "") {
            $errors .= 'Please select your delivery time.<br>';
        }

        //Checking for errors
        if ($errors != '') {
            echo $errors; //display errors
        } else {
            //Calculate the fare
            //Price of products
            $product1Price = 1200;
            $product2Price = 600;
            $product3Price = 800;

            //Parsing the value
            if ($product1 == "") {
                $product1 = 0;
            } else $product1 = (int) ($product1);
            if ($product2 == "") {
                $product2 = 0;
            } else $product2 = (int) ($product2);
            if ($product3 == "") {
                $product3 = 0;
            } else $product3 = (int) ($product3);
            $delivery = (int) ($delivery);

            //Calculate the value of each product.
            $product1Value = $product1 * $product1Price;
            $product2Value = $product2 * $product2Price;
            $product3Value = $product3 * $product3Price;

            //Calculates the delivery value and displays it
            $deliveryPrice;
            switch ($delivery) {
                case 1:
                    $deliveryPrice = 30;
                    break;
                case 2:
                    $deliveryPrice = 25;
                    break;
                case 3:
                    $deliveryPrice = 20;
                    break;
                case 4:
                    $deliveryPrice = 15;
                    break;
                default:
                    $deliveryPrice = 0;
            }

            //Calculates the rate of taxes and displays it
            /*
                alberta 5
                BC 12
                manitoba 12
                newBrunswick 15
                newfoundland 15
                novaScotia 15
                ontario 13
                quebec 14.975
                saskatchewan 11
                */

            $taxRate = 0;
            switch ($province) {
                case 'alberta':
                    $taxRate = 5;
                    break;
                case 'BC':
                    $taxRate = 12;
                    break;
                case 'manitoba':
                    $taxRate = 12;
                    break;
                case 'newBrunswick':
                    $taxRate = 15;
                    break;
                case 'newfoundland':
                    $taxRate = 15;
                    break;
                case 'novaScotia':
                    $taxRate = 15;
                    break;
                case 'ontario':
                    $taxRate = 13;
                    break;
                case 'quebec':
                    $taxRate = 14.975;
                    break;
                case 'saskatchewan':
                    $taxRate = 11;
                    break;
                default:
                    $taxRate = 0;
            }
            $taxRate = number_format($taxRate, 2);
            //Calculates total value and Taxes
            $subTotal = $product1Value + $product2Value + $product3Value + $deliveryPrice;
            $taxes = number_format($subTotal * $taxRate / 100, 2);
            $total = number_format($subTotal + $taxes, 2, ".", "");
            $product1Price = number_format($product1Price, 2);
            $product2Price = number_format($product2Price, 2);
            $product3Price = number_format($product3Price, 2);
            $myoutput = "
                <table>            
                    <tr>
                        <td class='leftColumn'>NAME</td>
                        <td>:</td>
                        <td id='nameInvoice' class='rightColumn'>$name</td>
                    </tr>
                    <tr>
                        <td class='leftColumn'>EMAIL</td>
                        <td>:</td>
                        <td id='emailInvoice' class='rightColumn'>$email</td>
                    </tr>
                    <tr>
                        <td class='leftColumn'>PHONE</td>
                        <td>:</td>
                        <td id='phoneInvoice' class='rightColumn'>$phone</td>
                    </tr>
                    <tr>
                        <td class='leftColumn'>DELIVERY ADDRESS</td>
                        <td>:</td>
                        <td id='addressInvoice' class='rightColumn'>$address, $city, $province, $postcode</td>
                    </tr>
                    <tr>
                        <td class='leftColumn' id='product1Invoice'>$product1 LAPTOP @ \$$product1Price</td>
                        <td>:</td>
                        <td id='product1Total' class='rightColumn'>\$$product1Value</td>
                    </tr>
                    <tr>
                        <td class='leftColumn' id='product2Invoice'>$product2 SMARTPHONE @ \$$product2Price</td>
                        <td>:</td>
                        <td id='product2Total' class='rightColumn'>\$$product2Value</td>
                    </tr>
                    <tr>
                        <td class='leftColumn' id='product3Invoice'>$product3 DESKTOP @ \$$product3Price</td>
                        <td>:</td>
                        <td id='product3Total' class='rightColumn'>\$$product3Value</td>
                    </tr>
                    <tr>
                        <td class='leftColumn'>SHIPPING CHARGES</td>
                        <td>:</td>
                        <td id='shippingInvoice' class='rightColumn'>\$$deliveryPrice</td>
                    </tr>
                    <tr>
                        <td class='leftColumn'>SUB TOTAL</td>
                        <td>:</td>
                        <td id='subTotalInvoice' class='rightColumn'>\$$subTotal</td>
                    </tr>
                    <tr>
                        <td class='leftColumn' id='taxesInvoice'>TAXES @ $taxRate%</td>
                        <td>:</td>
                        <td id='taxesTotal' class='rightColumn'>\$$taxes</td>
                    </tr>
                    <tr>
                        <td class='leftColumn'>TOTAL</td>
                        <td>:</td>
                        <td id='totalInvoice' class='rightColumn'>\$$total</td>
                    </tr>   
                </table>
                ";

            //SQL query to store the order into database
            $sqlquery = "
                INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `city`, `postcode`, `province`, `product1`, `product2`, `product3`, `totalCost`) VALUES (NULL, '$name', '$email', '$phone', '$address', '$city', '$postcode', '$province', '$product1', '$product2', '$product3', '$total');
                ";

            //Execute the SQL query
            $sqlResult = $db->query($sqlquery);

            //Check the SQL query execution status
            if (!$sqlResult) {
                exit('Some error occurred');
            }

            //Display the receipt
            echo $myoutput;
        }
        ?>


    </div>
</body>

</html>