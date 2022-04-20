<?php
    session_start();
    require_once "database_login.php";

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $account_type = $_SESSION["type"];
        if($account_type == 'admin') {
            $productid = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $product_price = $_POST['product_price'];
            $category = $_POST['category'];
            $gender = $_POST['gender'];
            $availability1 = $_POST['availability'];
            $file_name1 = $_POST['file_name'];
            $file_path = $_POST['file_path'];

            $query = "INSERT INTO productdetails (ProductID, ProductName, ProductDescription, ProductPrice, Category, Gender, Availability, FileName, FilePath) VALUES ('$productid', '$product_name', '$product_description', '$product_price', '$category', '$gender', '$availability1', '$file_name1', '$file_path')";
            $result = $conn->query($query);
            if(!$result){
                print_r(mysqli_error($conn));
            }
            header("Location: product_list.php");
        }
    }
?>