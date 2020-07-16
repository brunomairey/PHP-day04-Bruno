<?php
ob_start();
session_start();
require_once 'dbconnect.php';

//if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userName']; $userRow['userLastname']; ?></title>
</head>
<body >
	<div style="width: 90%; border: solid blue; text-align: right">
           Hi <?php echo $userRow['userName']. " " .$userRow['userLastname']; ?> where
           
           <a  href="logout.php?logout">Sign Out</a>
 </div>
       
 
</body>
</html>
<?php ob_end_flush(); ?>