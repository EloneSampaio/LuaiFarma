<?php
// configuration
include_once('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['type'];
$c = $_POST['description'];
$d = $_POST['total_amount'];
$e = $_POST['amount'];
$f = $_POST['date'];
$g = $_POST['entrant'];
// query
$sql = "UPDATE bills
        SET name=?, type=?, description=?, total_amount=?, amount=?, date=?, entrant=?
		WHERE id=?";
$q = $dbo->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$id));
header("location: expenses.php");

?>