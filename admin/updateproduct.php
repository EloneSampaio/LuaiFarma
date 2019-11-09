<?php
// configuration
include_once('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['batch'];
$b = $_POST['cost_price'];
$c = $_POST['sell_price'];
$e = $_POST['supplier'];
$f = $_POST['quantity'];
$g = $_POST['expiry_date'];



// query
$sql = "UPDATE inventory
        SET batch=?, cost_price=?, sell_price=?, supplier=?, quantity=?, expiry_date=?
		WHERE id=?";
$q = $dbo->prepare($sql);
$q->execute(array($a,$b,$c,$e,$f,$g,$id));
header("location: inventory_edit.php");

?>
