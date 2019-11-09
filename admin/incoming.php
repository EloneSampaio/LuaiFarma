<?php
session_start();
include_once('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['quantity'];
$w = $_POST['pt'];
$date = $_POST['date'];
$time = $_POST['time'];
$discount = $_POST['discount'];
$userid = $_POST['userid'];


$result = $dbo->prepare("SELECT sno, sell_price, (sell_price - cost_price) AS profit FROM inventory WHERE id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['sell_price'];
$code=$row['sno'];
$p=$row['profit'];
}



//edit qty
$sql = "UPDATE inventory 
        SET quantity=quantity-?
		WHERE id=?";
$q = $dbo->prepare($sql);
$q->execute(array($c,$b));
$fffffff=$asasa-$discount;
$d=$fffffff*$c;
$profit=$p*$c;
// query
$sql = "INSERT INTO sales_list (invoice,product,quantity,amount,price,profit,sno,date,time,entrant) VALUES (:a,:b,:c,:d,:f,:h,:i,:k,:l,:m) ";
$q = $dbo->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$asasa,':h'=>$profit,':i'=>$code,':k'=>$date,':l'=>$time,':m'=>$userid));


header("location: ../admin/sales.php?id=$w&invoice=$a");


?>