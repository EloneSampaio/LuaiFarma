<?php

include_once "../connect.php"; // database connection details stored here

?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rx Tera | Preview</title>
	<!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../plugins/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  
	<style type="text/css">
  #printable { display: none; }

    @media print
    {
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
    </style>
    
    <script language="javascript">
    function printDiv(divName) 
    { 
    var printContents = document.getElementById(divName).innerHTML; 
    var originalContents = document.body.innerHTML; 
    document.body.innerHTML = printContents; window.print(); 
    document.body.innerHTML = originalContents; 
    }
    </script>
	
  
</head>
<?php
$invoice=$_GET['invoice'];
$result = $dbo->prepare("SELECT * FROM sales_list WHERE invoice= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){

$invoice=$row['invoice'];
$date=$row['date'];
$am=$row['amount'];

}
?>


<?php include_once("header.php"); ?>

  <!-- =============================================== -->

  
<?php include_once("sidebar.php"); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receipt Preview
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php">Admin</a></li>
        <li class="active">Preveiw</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      
        <div class="box-body">
       
<div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">

<div class="col-xs-12">
<div ng-controller="customersCrtl">
<div class="container">


	<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><button class="btn btn-success addmore"> Back to Sales</button></a>



<div id="printableArea">
	
	<div style="font:bold 30px 'Arial'; align: 'center'"><?php echo $name ?><br></div>
	<div style="font: bold 14px 'Arial'; padding: 0 0 0 60px;">Sales Receipt </div>
	<div style="font: 14px 'Arial';">
		<?php echo $address ?><br>
		<?php echo $address2 ?><br>
    Contacts: <?php echo $phone ?>, <?php echo $email ?>
    <div>

	<div>
	
	<?php
	$resulta = $dbo->prepare("SELECT * FROM customer WHERE name= :a");
	$resulta->bindParam(':a', $cname);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
	$address=$rowa['address'];
	$contact=$rowa['phone'];
	}
	?>
	</div>
	</div>
	
	<div >
	<table>

		<tr>
			<td>Reciept No. </td>
            <td><?php echo $invoice ?> </td>
			
		</tr>
		<tr>
			<td>Date :</td>
			<td><?php echo date("F j, Y, g:i a"); ?> </td>
		</tr>
		<tr>
			<td>Served By :</td>
			<?Php
				if(isset($_SESSION['userid'])){
				}
				?>
                    <td><?php echo "$_SESSION[userid]"; ?></td>
                  
		</tr>
		
	</table>
	 <table border="1" width="25%">
		<thead>
			<tr>
				<th> Name </th>
				<th> Qty </th>
				<th> Price </th>
				<th> Amount </th>
				
				
			</tr>
		</thead>
		<tbody>
			
				<?php
					$id=$_GET['invoice'];
					$result = $dbo->prepare("select  c.trade_name,  s.amount, s. price, s.quantity FROM `medicine_list` AS c INNER JOIN `sales_list` AS s ON c.sno = s.sno  WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo $row['trade_name']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo number_format($ppp, true);
				?>
				</td>
				
				<td>
				<?php
				$dfdf=$row['amount'];
				echo number_format($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td colspan="3" style=" text-align:right;">Total: &nbsp;<?php echo $currency  ?></strong></td>
					<td colspan="3">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $dbo->prepare("SELECT sum(amount) FROM sales_list WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo number_format($fgfg, true);
					}
					?>
					</td>
				</tr>
				
				
			
		</tbody>
	</table>
	
	
	
		
    </div>
    </div>
    
</div>
</div>
<input type="button" class="btn btn-default" onclick="printDiv('printableArea')" value="Print" />
<script src="js/angular.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="app/app.js"></script>   
<script src="js/jquery.min.js"></script>  
        

 <?php include_once("footer.php"); ?>    
    </body>
</html>