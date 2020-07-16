<?php 
session_start();
require_once 'dbconnect.php';

echo $_SESSION['user'] . " whatever ". $_GET['id'] ;

if(isset($_POST["submit"])){
$carid = $_GET['id'];
$userID = $_SESSION['user'];
$rental_begin = $_POST['rental_begin'];
$rental_end = $_POST['rental_end'];

$sql2 = "UPDATE `cars` SET `availability`='no' where `id` = $carid"; 

$sql = "INSERT INTO `cars`(rental_begin, rental_end, brand, model) VALUES ('$rental_begin', '$rental_end', '$userID', '$carid')";

if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
echo "booking success <br> <a href='home.php'>Home</a><hr>";

}
else {echo"this is the shit";}
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
<input type="date" name="rental_begin">
<input type="date" name="rental_end">
<input type="submit" name="submit">
</form>
</body>
</html>