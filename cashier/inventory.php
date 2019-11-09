<?php

include_once "../connect.php"; // database connection details stored here

?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rx Tera | History</title>
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
  
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
     
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script> 
  
</head>

<?php include_once("header.php"); ?>

  <!-- =============================================== -->

  
<?php include_once("sidebar.php"); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Medicine Purchase History
        <small>All Medicines</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php">Admin</a></li>
        <li class="active">Inventory</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      
        <div class="box-body">
         <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Type medicine name to search</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
<div class="box">		 
 <div class="box-body">   
<div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
                           
                            <thead>
                                <tr>
                                    <th style="text-align:center;" >Trade name</th>
                                    <th style="text-align:center;">Generic name</th>
                                    <th style="text-align:center;">Batch</th>
                                    <th style="text-align:center;">Cost</th>
                                    <th style="text-align:center;">Sell price</th>
									<th style="text-align:center;">Qty Available</th>
									<th style="text-align:center;">Qty Stocked</th>
									<th style="text-align:center;">Arrival</th>
									<th style="text-align:center;">Expiry</th>
									<th style="text-align:center;">Supplier</th>
									
                                </tr>
                            </thead>
                            <tbody>
								<?php
								
								$result= mysqli_query($con, "select c.trade_name, c.generic_name, i.id, i.batch, i.cost_price, i.sell_price, i.supplier, i.quantity, i.qty_sold, date_format(i.datetime, '%d/%m/%y') AS DATE, i.expiry_date FROM `medicine_list` AS c INNER JOIN `inventory` AS i ON c.sno = i.sno  ORDER BY i.id Desc" ) or die (mysql_error());
								while ($row= mysqli_fetch_array ($result) ){
								$id=$row['id'];
								?>
								<tr>
								
								<td style="width:300px;"> <?php echo $row ['trade_name']; ?></td>
								<td style="width:300px;"> <?php echo $row ['generic_name']; ?></td>
								<td style="width:100px;"> <?php echo $row ['batch']; ?></td>
								<td style="width:150px;"> <?php echo $row ['cost_price']; ?></td>
								<td style="width:150px;"> <?php echo $row ['sell_price']; ?></td>
								<td style="width:100px;"> <?php echo $row ['quantity']; ?></td>
								<td style="width:100px;"> <?php echo $row ['qty_sold']; ?></td>
								<td style="width:120px;"> <?php echo $row ['DATE']; ?></td>
								<td style="width:200px;"> <?php echo $row ['expiry_date']; ?></td>
								<td style="width:120px;"> <?php echo $row ['supplier']; ?></td>
								
							


							<!-- Modal -->
								
								</div>
								</div>
								</tr>

								<!-- Modal Bigger Image -->
								

								<?php } ?>
                            </tbody>
                        </table>


          
        </div>
        </div>
        </div>
    </div> 
		
		

    

<script src="js/angular.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="app/app.js"></script>     

 <?php include_once("footer.php"); ?>    
    </body>
</html>