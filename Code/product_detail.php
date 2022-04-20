<?php include('navbar.php'); ?>
<link rel="stylesheet" href="products.css">
</body>



<?php

//copy of update record

if(isset($_GET['ProductID'])) {
    $ProductID = $_GET['ProductID'];
    
    require_once "database_login.php";

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query = "SELECT * FROM ProductDetails WHERE ProductID = '$ProductID'";
    $result = $conn->query($query);
    if(!$result) die ("Couldn't Fetch the Details For That Product");

    $numRows = $result->num_rows;

    for ($j = 0; $j < $numRows; $j++){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $Availability  = $row['Availability'];
    $FilePath = $row['FilePath'];

    $checked = "";
    if($Availability ==1) {
        $checked = "checked";

    }
    echo <<<_END
    <center>
        <pre>
            <form method="POST" action="addToCart.php">
                <img src='$FilePath' width='215' height ='275'>

                $row[ProductName]
                $row[ProductDescription]
                Price: $row[ProductPrice]
                Category: $row[Category]
                Gender: $row[Gender]
                Availability: <input type="checkbox" name="Availability" 1" $checked>
                <br>
                <label for='quantity'>Quantity:</label>
                <input type='number' id='quantity' name='quantity' min='1' max='99'>
                <input type="hidden" name="id" value="$ProductID">
                <input type="hidden" name="product_name" value="$row[ProductName]">
                <input type="hidden" name="product_price" value="$row[ProductPrice]">
                <a href="product_detail.php"><input type='submit' value='Add To Cart'> 
                </form>
        </pre> 
    </center>
_END;
    }
}

if(isset($_POST['ProductID'])){
 
    $FilePath = $_POST['FilePath'];
    $ProductName = $_POST['ProductName'];
    $ProductDescription = $_POST['ProductDescription'];
    $ProductPrice = $_POST['ProductPrice'];
    $Category = $_POST['Category'];
    $Gender = $_POST['Gender'];
    $Availability = $_POST['Availability'];

    $availability = $availability == 1 ? 1 : 0;

    require_once "database_login.php";
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query = "UPDATE Suburban_Outfitters SET ProductName='$ProductName', ProductDescription='$ProductDescription', ProductPrice='$ProductPrice', availability='$availability', FilePath='$FilePath' WHERE ProductID='$ProductID'";

    $result = $conn->query($query);
    if(!$result) die ("No Result");

    header("Location: product_list.php");
}

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