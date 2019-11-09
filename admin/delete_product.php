<?php
	include_once('../connect.php');
	$id=$_GET['id'];
	$result = $dbo->prepare("DELETE FROM inventory WHERE id= :sno");
	$result->bindParam(':sno', $id);
	$result->execute();
	header('location:inventory_edit.php');
?>