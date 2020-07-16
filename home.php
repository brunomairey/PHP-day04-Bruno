<?php
ob_start();
session_start();
require_once 'dbconnect.php';

//if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
</head>
<body >
           Hi <?php echo $userRow['userName' ]; ?>
           
           <a  href="logout.php?logout">Sign Out</a>
<?php
           $sql = "SELECT * FROM cars where availability='yes'";
           $result = $conn->query($sql);

            if($result->num_rows == 0) {
              echo "No result";
            }
            else if ($result->num_rows == 1){
                $row = $result->fetch_assoc();?>
 <div class ="m-5 manageUser">
 
   <table  border="1" cellspacing= "0" cellpadding="0">
       <thead>
           <tr>
               <th>Car</th>
               <th >Option</th>
           </tr>
       </thead>
       <tbody>
                    <tr>
                       <td> <?= $row['brand']." ".$row['model' ]." ".$row['id'] ?></td>
                       <td>
                           <a href="booking.php?id=<?= $row['id']?>"><button type='button'>Booking</button></a>
                     <!--       <a href="delete.php?id=<?= $row['id']?>"><button type='button'>Delete</button></a> --> 
                       </td>
                   </tr>
                </tbody>
                  </table>
                </div>
 -->
                <?php ;} 
             
            else {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                    ?>
<div class ="m-5 manageUser">
 
   <table  border="1" cellspacing= "0" cellpadding="0">
       <thead>
           <tr>
               <th>Car</th>
               <th >Option</th>
           </tr>
       </thead>
       <tbody>
        <?php 
             
                             foreach ($rows as $key => $value){ ?>
                    <tr>
                       <td> <?= $value['brand']." ".$value['model' ] ." ".$value['id' ] ?></td>
                       <td>
                           <a href="booking.php?id=<?= $value['id']?>"><button type='button'>Booking</button></a>
                         <!--   <a href="delete.php?id=<?= $value['id']?>"><button type='button'>Delete</button></a> -->
                       </td>
                   </tr>
                   <?php ;} ?>
                </tbody>
                  </table>
                </div>
                                 
<!-- end of bootstrap -->
                <?php
              
             }
             ?>
   
</div>
       
 
</body>
</html>
<?php ob_end_flush(); ?>