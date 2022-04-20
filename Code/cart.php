
<?php

// Check if quntity cookies isset
// pull it out
$quantity = 0;
if(isset($_COOKIE['quantity'])) {
    // Pull quantity out of cookies
    $quantity = $_COOKIE['quantity'];
}
session_start();

?>
<?php include('navbar.php'); ?>
<link rel="stylesheet" href="products.css">
</body>
        <body> 
        <table class='table_border' align='center'>
            <tr>
                <td align='center'>Item</td>
                <td align='center'>Quantity</td>
                <td align='center'>Price</td>
            </tr>
            <tr align='center'>
                <td align='center'>
                    <?php
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        $userid = $_SESSION['id'];
                        require_once "database_login.php";

                        $conn = new mysqli($hn, $un, $pw, $db);
                        if ($conn->connect_error) die($conn->connect_error);
                    
                        $query = "SELECT * FROM cart WHERE userid = '$userid'";
                        $result = $conn->query($query);
                        if(!$result) die ("Couldn't Fetch the Details For That Product");

                        $sum = 0;
                        $numRows = $result->num_rows;

                        for ($j = 0; $j < $numRows; $j++){
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                            $productid = $row['productid'];
                            $itemQuantity = $row['quantity'];
                            $productName = $row['product_name'];
                            $product_price = $row['price'];
                            $sum += $product_price;
                            echo <<<_END
                            <tr >
                                <td align='center'>$productName</td>
                                <td align='center'>$itemQuantity</td>
                                <td align='center'>$product_price$</td>
                            </tr>
                            _END;
                        }
                        echo <<<_END
                            <div >
                                <div align='center'>TOTAL: $sum$</div>
                            </div>
                        _END;
                    }

                    ?>
                </td>
            </tr>
                <td colspan='5' align='right' valign='center'>
                    <form>
                        <input type='submit' value='Checkout'>
                    </form>
                </td>
            </tr>
            </tr>
                <td colspan='5' align='right' valign='center'>
                <?php
        $start_date = date('m/d/y');
        echo "If you order now, your estimated delivery will be on: ", date('m/d/y', strtotime('+1 week', strtotime($start_date)));
        ?>
                </td>
            </tr>
        </table>
    </body>
    <?php
if (isset($_GET['search'])) {
    $searchValue = $_GET['search'];

    require_once "database_login.php";
    
    $conn = new mysqli ($hn, $un, $pw, $db); 
    if ($conn->connect_error) die($conn->connect_error);
    $query = "SELECT * FROM ProductDetails WHERE ProductName LIKE '%$searchValue%'";
    
    $result = $conn->query($query);
    if(!$result) die ("No result");

    $numRows = $result->num_rows;
    for($j = 0; $j < $numRows; ++$j) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $FilePath = $row['FilePath'];

    echo <<<_END

    <pre>
        <a href="product_detail.php?ProductID=$row[ProductID]"><img src='$FilePath' width='215' height ='275'></a>
        $row[ProductName]
        <br>   
    </pre>
    
_END;
    }
}
?>
