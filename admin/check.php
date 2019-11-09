
<?Php

$user = $_SESSION['userid'] ;

$query=mysqli_query($con, "SELECT *  FROM `users` WHERE `userid` = '$user' ")or die(mysqli_error());		
while($row = mysqli_fetch_assoc($query)) {
$level = $row['level'];
}


if(!isset($_SESSION['userid'])){
	?>
	<script>
		alert('Please Login to use this page');
		window.location.href='../login.php';
	</script>
<?php
}elseif($level  != 1 ){
?>
<script>
		alert('You are not authorised to view this page');
		window.location.href='../login.php';
</script>
	
<?php
}else{

echo "<center><font face='Verdana' size='3' color=white>Welcome $_SESSION[userid] |
 <a href=change-password.php>Change Password</a>
</font></center>";

}


echo '
<script type="text/javascript">
idleMax = 30;// Logout after 30 minutes of IDLE
idleTime = 0;
$(document).ready(function () {
    var idleInterval = setInterval("timerIncrement()", 30000); 
    $(this).mousemove(function (e) {idleTime = 0;});
    $(this).keypress(function (e) {idleTime = 0;});
})
function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > idleMax) { 
        window.location="../login.php";
    }
}
</script>';






?>
