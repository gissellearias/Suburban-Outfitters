<?php include('navbar.php'); ?>
<?php 

        if(isset($POST['deleted'])) {
            require_once "database_login.php"; 

            $conn = new mysqli($hn, $un, $pw, $db); 
            if($conn->connect_error) die($conn->connect_error);

            $PaymentID = $_POST['PaymentID']; 

            $query = "DELETE FROM payments WHERE PaymentID= 'PaymentID'"; 

            $result = $conn->query($query);
            if(!$result) die("Unable to delete $PaymentID"); 
        } 

        header("Location: customer_view.php"); 
?> 