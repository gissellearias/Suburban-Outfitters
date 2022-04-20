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

    $query = "SELECT * FROM ProductDetails WHERE Gender='M'";
    $result = $conn->query($query);
    if (!$result) die("Couldn't Retrieve Items");

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
}

?>