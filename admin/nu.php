<?php
// ../documentation/index.html
include_once('../connect.php');


$user = $_SESSION['userid'] ;

$query=mysqli_query($con, "SELECT *  FROM `users` WHERE `userid` = '$user' ")or die(mysqli_error());		
while($row = mysqli_fetch_assoc($query)) {
$level = $row['level'];
}
echo $level;
?>




