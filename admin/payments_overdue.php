<?php

include_once "../connect.php"; // database connection details stored here

?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rx Tera | Payments</title>
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

<script type="text/javascript">

$(document).ready(function() {
    $('#example').dataTable( {
        "sPaginationType": "bootstrap",
        "oLanguage": {},
        "aaSorting": [],
        "bDestroy": true
    });
});
</script>

</head>

<?php include_once("header.php"); ?>

  <!-- =============================================== -->


<?php include_once("sidebar.php"); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Payments Overdue
        
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
              <h3 class="box-title">Type Invoice No to search</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

<div class="box">
 <div class="box-body">
<div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">

                            <thead>
                                <tr>
                  <th style="text-align:left;">No</th>
                  <th style="text-align:center;">Date</th>
                  <th style="text-align:center;">Supplier</th>
                  <th style="text-align:center;">Invoice No.</th>
                  <th style="text-align:center;">Total Invoice</th>
                  <th style="text-align:center;">Amount Paid</th>
                  <th style="text-align:center;">Amount Due</th>
									<th style="text-align:center;">Due Date</th>
                  <th style="text-align:center;">Notes</th>
                  <th style="text-align:center;">View</th>
                  <th style="text-align:center;">Pay</th>


                                </tr>
                            </thead>
                            <tbody>
								<?php
                $n = 0;
								$result= mysqli_query($con, "select * FROM purchases WHERE date_format(`due_date`, '%Y-%m-%d') < curdate() AND `invoice_total` > `amount_paid` ORDER BY id ASC" ) or die (mysql_error());
								while ($row= mysqli_fetch_array ($result) ){
								$id=$row['id'];
								?>
								<tr>
                <td><?php echo ++$n ;  ?> </td>
								<td style="width:100px;"> <?php echo $row ['invoiceDate']; ?></td>
                <td style="width:200px;"> <?php echo $row ['supplier']; ?></td>
								<td style="width:100px;"> <?php echo $row ['invoiceNo']; ?></td>
								<td style="width:150px;"> <?php echo number_format ($row ['invoice_total']) ; ?></td>
								<td style="width:150px;"> <?php echo number_format ($row ['amount_paid']) ; ?></td>
								<td style="width:150px;"> <?php echo number_format ($row ['amount_due']) ; ?></td>
								<td style="width:100px;"> <?php echo $row ['due_date']; ?></td>
                <td style="width:200px;"> <?php echo $row ['notes']; ?></td>
								<td><form  method="post" action="view_product.php<?php echo '?id='.$row['id']; ?>"><input type='submit'  class="btn btn-success addmore" value='View'>	</form></td>
                <td><form  method="post" action="pay_supply.php<?php echo '?id='.$row['id']; ?>"><input type='submit'  class="btn btn-primary" value='Pay'>	</form></td>




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
