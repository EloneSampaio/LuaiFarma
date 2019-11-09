<?php
// configuration
include_once('../connect.php');


				if (isset($_POST['register'])){
				$id=$_POST['id'];
				$amount_paid=$_POST['amount_paid'];
				$date=$_POST['date'];
				$entrant=$_POST['entrant'];
				
				
				mysqli_query($con, "insert into supplier_payment (id,amount_paid,date,entrant) values('$id','$amount_paid','$date','$entrant')")or die(mysqli_error());
				
				}
	
header("location: supplier_list.php");

?>