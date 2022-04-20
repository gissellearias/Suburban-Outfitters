<!-- Nav Bar + Header -->

<?php include('navbar.php'); ?>
<link rel="stylesheet" href="products.css">
</body>
<?php



if (isset($_GET['search'])) {
    $searchValue = $_GET['search'];

    require_once "database_login.php";

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $query = "SELECT * FROM ProductDetails WHERE ProductName LIKE '%$searchValue%'";

    $result = $conn->query($query);
    if (!$result) die("No result");

    $numRows = $result->num_rows;
    echo '<div class="products">';

    for ($j = 0; $j < $numRows; ++$j) {
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
    echo '</div>';
} else {
    require_once "database_login.php";
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    session_start();
    require_once "sanitize.php";
    $query = "SELECT * FROM ProductDetails";
    $result = $conn->query($query);
    if (!$result) die("Couldn't Retrieve Items");
    $account_type = '';
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $account_type = $_SESSION["type"];
    }
    $numRows = $result->num_rows;
    if($account_type == 'admin') {
    echo <<<_END
    <center>
        <pre>
            <form method="POST" action="add_product.php">
                Product ID<input type="number" name="product_id">
                Product Name<input type='text' name="product_name">
                Product Description<input type="text" name="product_description">
                Product Price<input type="number" name="product_price">
                Category<input type="text" name="category">
                Gender<input type="text" name="gender">
                Availability<input type="number" name="availability">
                File Name<input type="text" name="file_name">
                File Path<input type="text" name="file_path">
                <input type='submit' value='Add Product'> 
                </form>
        </pre> 
    </center>
    _END;
    }
    echo '<div class="products">';
    for ($j = 0; $j < $numRows; ++$j) {

        $row = $result->fetch_array(MYSQLI_ASSOC);
        $FilePath = $row['FilePath'];


        echo  <<<_END
        
        <pre>
            <a href="product_detail.php?ProductID=$row[ProductID]"><img src='$FilePath' width='215' height ='275'></a>
            $row[ProductName]
            <br>  
        </pre>
        
        _END;

        if($account_type == 'admin') {
            echo  <<<_END
            <form method="POST" action="delete_product.php">
                <input type="hidden" name="product_id" value="$row[ProductID]">
                <input type='submit' value='Delete Product'> 
            </form>
            _END;
        }
    }
    echo '</div>';
}

?>