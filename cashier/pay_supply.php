<?php

include_once "../connect.php"; // database connection details stored here

?>
<!DOCTYPE html>
<html  lang="en">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rx Tera | Suppliers</title>
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
  
</head>

  
<?php include_once("header.php"); ?>
  <!-- =============================================== -->

  
<?php include_once("sidebar.php"); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Suppliers
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php">Admin</a></li>
        <li class="active">Pay Suppliers</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      
        <div class="box-body">
         <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">All Fields are required</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
		
			

           <form role="form" method="post"  action="pay.php" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Supplier Name</label>
				  <?php
$sql="SELECT name,id  FROM supplier order by name ASC"; 
echo "<select name='id' class='form-control'>"; 
foreach ($dbo->query($sql) as $row){
echo "<option value=$row[id]>$row[name]</option>"; 
}
echo "</select>";
?>
                  
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Total Bill</label>
                  <input type="text"  name="total_bill" class="form-control" id="skills" >
				  </div>
				
				<div class="form-group">
				<label for="exampleInputEmail1">Amount Paid</label>
                  <input type="text"  name="amount_paid" class="form-control" id="skills"  >
				  <input type="hidden"  name="date"  class="form-control" value="<?php echo date("m/d/y"); ?>" >
				  <?Php
					if(isset($_SESSION['userid'])){
									}
						?>
                  <input type="hidden"  name="entrant"  class="form-control" value="<?php echo "$_SESSION[userid]"; ?>"  readonly>
              
                </div>
                
                <button type="submit" name="register" class="btn btn-primary">Pay</button>
                </div>
			
         </br>
		 
         </br>
		   
            </form>		   
 

					
			
</div>
  </div>
<script src="js/angular.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="app/app.js"></script>   
<script src="js/jquery.min.js"></script>  

 <?php include_once("footer.php"); ?>    
    </body>
</html>