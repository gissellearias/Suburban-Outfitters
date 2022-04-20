<!-- Nav Bar + Header -->
<?php include('navbar.php'); ?>
<html>
	<head>
		<link rel="stylesheet" href="theme.css">
	</head>
	
	<body>
		<br>
		<form>
		<table class='table-border' align='center' width='50%'>
			<tr>
				<td colspan='2'><h2>Customer Info</h2></td>
			</tr>
			<tr>
				<td>Name On Card:</td>
				<td><input type='text' name='CardName' size='50'></td>				
			</tr>
			<tr>
				<td>Card Number:</td>
				<td><input type='text' name='CardNumber' size='50'></td>				
			</tr>
			<tr>
				<td>Expiration Date (YYYY-MM-DD):</td>
				<td><input type='text' name='ExpirationDate' size='50'></td>				
			</tr>
			<tr>
				<td>Security Code:</td>
				<td><input type='text' name='SecurityCode' size='50'></td>				
			</tr>	
			<tr>
				<td><input type='submit' value='Submit'></td>
				<br>
				<td></td>				
			</tr>
		</table>
		</form>
		<center>
		<a href= "customer_view.php"><td><input type='submit' value='Go Back'></td>
		<center>
	</body>
</html>	

<?php
    session_start();
    require_once "database_login.php";

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        $account_type = $_SESSION['type'];
        if($account_type == 'customer') {
            $CardName = $_POST['CardName'];
            $CardNumber = $_POST['CardNumber'];
            $ExpirationDate = $_POST['ExpirationDate'];
            $SecurityCode = $_POST['SecurityCode'];
    
            $query = "INSERT INTO payments (CardName, CardNumber, ExpirationDate, SecurityCode) VALUES ('$CardName', '$CardNumber', '$ExpirationDate', '$SecurityCode')";
            $result = $conn->query($query);
            if(!$result){
                print_r(mysqli_error($conn));
				echo "Your Payment Method Could Not Be Added";
            }
			else echo "Your Payment Was Added";
            header("Location: customer_view.php");
        }
    }
?>

	