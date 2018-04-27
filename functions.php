<?php
    
        function pf_validate_number($value, $function, $redirect) 
        {
            if(isset($value) == TRUE)
            {
                if(is_numeric($value) == FALSE)
                {
                    $error = 1;
                }
                if(@$error == 1)
                {
                    header("Location: " . $redirect);
                }
                else
                {
                    $final = $value;
                }
            }
            else
            {
                if($function == 'redirect')
                {
                    header("Location: " . $redirect);
                }
                if($function == "value")
                {
                    $final = 0;
                }
            }
            return $final;
        }

//files required so variables can be reused for showcart function
include_once("db.php");
include_once("config.php");
//include_once("addtobasket.php");

        function showcart() //function to show items in users cart
    
        { 
            //varibales from required files
            global $db;
            global $config_basedir;
            
            if(@$_SESSION['SESS_ORDERNUM']) //checks to see if order number exists
            {
                if(@$_SESSION['SESS_LOGGEDIN']) //checks to see if user is logged in
                {
                    $custsql = "SELECT id from orders WHERE customerID = ". $_SESSION['SESS_USERID']. ";";
                    $custres = mysqli_query($db,$custsql);
                    $custrow = mysqli_fetch_assoc($custres);
                    $itemssql = "SELECT products.*, order_items.*, order_items.id AS itemid FROM products, order_items WHERE order_items.productID = products.id AND orderID = " . $custrow['id'].";";
                    $itemsres = mysqli_query($db,$itemssql);
                    $itemnumrows = mysqli_num_rows($itemsres);
                }
                else
                {
                    $custsql = "SELECT id from orders WHERE session = '" . session_id(). "';";
                    $custres = mysqli_query($db,$custsql);
                    $custrow = mysqli_fetch_assoc($custres);
                    $itemssql = "SELECT products.*,order_items.*, order_items.id AS itemid FROM products, order_items WHERE order_items.productID = products.id AND orderID = " . $custrow['id'].";";
                    $itemsres = mysqli_query($db,$itemssql);
                    $itemnumrows = mysqli_num_rows($itemsres);
                }
            }
            else
            {
                $itemnumrows = 0;
            }
            
            if($itemnumrows == 0)
            {
                echo "You have not added anything to your shopping cart yet.";
            }
            else
            {
                echo "<table cellpadding='10'>";
                echo "<tr>";
                echo "<td></td>";
                echo "<td><strong>Item</strong></td>";
                echo "<td><strong>Quantity</strong></td>";
                echo "<td><strong>Unit Price</strong></td>";
                echo "<td><strong>Total Price</strong></td>";
                echo "<td></td>";
                echo "</tr>";
                
                while($itemsrow = mysqli_fetch_assoc($itemsres))
                {
                    $quantitytotal = $itemsrow['price'] * $itemsrow['quantity'];
                    echo "<tr>";
                    if(empty($itemsrow['image']))
                    {
                    echo "<td><img
                    src='./productimages/dummy.jpg' width='50' alt='"
                    . $itemsrow['name'] . "'></td>";
                    }
                    else
                    {
                    echo "<td><img src='./productimages/" .
                    $itemsrow['image'] . "' width='50' alt='"
                    . $itemsrow['name'] . "'></td>";
                    }
                    echo "<td>" . $itemsrow['name'] . "</td>";
                    echo "<td>" . $itemsrow['quantity'] . "</td>";
                    echo "<td><strong>&pound;". sprintf('%.2f', $itemsrow['price']). "</strong></td>";
                    echo "<td><strong>&pound;". sprintf('%.2f', $quantitytotal) . "</strong></td>";
                    echo "<td>[<a href='". $config_basedir . "delete.php?id=". $itemsrow['itemid'] . "'>X</a>]</td>";
                    echo "</tr>";
                    @$total = $total + $quantitytotal;
                    $totalsql = "UPDATE orders SET total = ". $total . " WHERE id = ". $_SESSION['SESS_ORDERNUM'];
                    $totalres = mysqli_query($db,$totalsql);
                }
                echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>TOTAL</td>";
                echo "<td><strong>&pound;"
                . sprintf('%.2f', $total) . "</strong></td>";
                echo "<td></td>";
                echo "</tr>";
                echo "</table>";
                //echo "<p><a href='checkout-address.php'>Go to the checkout</a></p>";
            }
        }
    ?>