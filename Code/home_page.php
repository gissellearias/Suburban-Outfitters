<!-- Nav Bar + Header -->
<?php include('navbar.php'); ?>

<!-- Nav Bar + Header -->
    <title> Suburban Outfitters </title>
    <style>
        .suburban{
    width: 600px;
    height: 300px;
    margin: 20% 30%;
    text-align: center;
}
.suburban h1{
    text-align: center;
    color:rgb(10, 173, 173);
    text-transform:uppercase;
    font-size: 60px;
}


.suburban a{
    border: 2px solid #fff;
    padding: 10px 25px;
    text-decoration: uppercase;
    font-size: 14px;
    margin: 20px;
    display: inline-block;
    color: rgb(7, 2, 2);
}

.suburban a:hover{
    background: rgb(64,224,208);
    color:rgb(0, 0, 0);
}
    </style>
</head> 
<div class="suburban">
    <h1>Suburban Outfitters</h1>
    <a href="product_list.php">Shop Now</a>
    </div>
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

