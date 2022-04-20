<?php
    session_start();
    require_once "database_login.php";

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
    
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $account_type = $_SESSION["type"];
        if($account_type == 'admin') {
            $productid = $_POST['product_id'];
            if($productid) {
                $query = "DELETE FROM productdetails  WHERE ProductID = '$productid'";
                $result = $conn->query($query);
                if(!$result) die("Unable to delete $isbn");
            
                }
                header("Location: product_list.php");
            }
        }
?>