<?php


$quantity = 0;
session_start();
require_once "database_login.php";

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);


if($_POST['quantity'] > 0) {
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $userid = $_SESSION['id'];
        $productid = $_POST['id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $quantity = $_POST['quantity'];
        $total_price = $product_price * $quantity;

        $query = "SELECT DISTINCT * FROM cart WHERE userid = '$userid' AND productid = '$productid'";
        
        $result = $conn->query($query);
        $numRows = $result->num_rows;
        $row = mysqli_fetch_assoc($conn->query($query) );

        if($numRows === 0) { //if product does not exist in DB
            $sql = "INSERT INTO cart (userid, productid, quantity, price, product_name) VALUES ($userid, $productid, $quantity, $total_price, '$product_name')";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    // if($quantity < 5) {
    
                    //     $quantity++;
                    // }
                    $days = 60 * 60 * 24 * 7;
                    setcookie('quantity', $quantity, time() + $days, '/');
                       header("Location: cart.php");
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                // Close statement
                mysqli_stmt_close($stmt);
            }
        } else if ($numRows > 0) {
            $sql = "UPDATE cart SET quantity = '$quantity', price = '$total_price'  WHERE userid = '$userid' AND productid = '$productid' ";
            if($stmt = mysqli_prepare($conn, $sql)) {
                if(mysqli_stmt_execute($stmt)){

                    $days = 60 * 60 * 24 * 7;
                    setcookie('quantity', $quantity, time() + $days, '/');
                       header("Location: cart.php");
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
        }
    }
}



?>