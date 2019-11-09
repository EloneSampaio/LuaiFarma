<?php

include_once "../connect.php"; // database connection details stored here

?>

<!DOCTYPE html>
<html  lang="en">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rx Tera | Expenses</title>
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
  
  
  <script type='text/javascript'>
	function validateForm() {
    var x = document.forms["form1"]["name"].value || document.forms["form1"]["description"].value|| document.forms["form1"]["amount"].value || document.forms["form1"]["date"].value;
	
    if (x == null || x == "") {
        alert("Field must be filled out");
        return false;
    }
}
</script>


 <script type="text/javascript">
function confirmDelete() 
{
	var msg = "Are you sure you want to delete?";       
    return confirm(msg);
}
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
        Add Expenses
        <small>Add new pharmacy expenses</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php">Admin</a></li>
        <li class="active">Add Expenses</li>
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

           <form role="form" method="post"  action="expenses.php" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Expense</label>
                   <select name="name" class="form-control">
                              <option>Select</option>
                              <option>Salary</option>
							  <option>Allowances</option>
							  <option>Rent</option>
							  <option>Utilities</option>
							   <option>Asset</option>
							  <option>Others</option>
                              </select>
                   </div>
 
             
                <div class="form-group">
                  <label for="exampleInputEmail1">Payment Type</label>
				  <select name="type" class="form-control">
                              <option>Select</option>
                              <option>Cash</option>
							  <option>Credit</option>
                              <option>Cheque</option>
                              </select>
                   </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea name="description" cols="40" rows="5" required class="form-control" ></textarea>
                </div>
				
				
				 <div class="form-group">
                  <label for="exampleInputEmail1">Total Bill</label>
                  <input type="text"  name="total_amount"  class="form-control" id="exampleInputEmail1" required>
                </div>
				
				
				 <div class="form-group">
                  <label for="exampleInputEmail1">Amount Paid</label>
                  <input type="text"  name="amount"  class="form-control" id="exampleInputEmail1" required>
                </div>

                  <input type="hidden"  name="date"  class="form-control" value="<?php echo date("m/d/y"); ?>" required>
                
				  
				  <?Php
					if(isset($_SESSION['userid'])){
									}
						?>
                  <input type="hidden"  name="entrant"  class="form-control" value="<?php echo "$_SESSION[userid]"; ?>"  readonly>
              
				
				
                <div>
                <button type="submit" name="register" class="btn btn-primary">Register</button>
				
              </div>
           </div>
			   
            </form>
			
			<?php
				if (isset($_POST['register'])){
				$name=$_POST['name'];
				$type=$_POST['type'];
				$description=$_POST['description'];
				$total_amount=$_POST['total_amount'];
				$amount=$_POST['amount'];
				$date=$_POST['date'];
				
				$entrant=$_POST['entrant'];
				
				
				mysqli_query($con,"INSERT INTO bills (name, type, description, total_amount, amount, date, entrant)
					VALUES ('$name', '$type', '$description', '$total_amount', '$amount', '$date', '$entrant')")or die(mysqli_error());
				
				}
				?>
       
	
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Recent expenses</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
                        <th>No</th>
						<th>Expense</th>
						<th>Description</th>
						<th>Payment Type</th>
						<th>Total Bill</th>
						<th>Amount paid</th>
                        <th>Date</th>
                     
						<th>Entrant</th>
					
						
						</tr>
					</thead>
				
					<tbody>
						<?php 
						
						$query=mysqli_query($con, "SELECT id, name, description, type, total_amount, amount, date, entrant  FROM `bills`  ORDER BY id DESC  LIMIT 5")or die(mysqli_error());
						while($row=mysqli_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><?php echo $row[5]; ?></td>
						<td><?php echo $row[6]; ?></td>
						<td><?php echo $row[7]; ?></td>
						
					    
						
						</tr>
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
<script src="js/jquery.min.js"></script>   

<script type="text/javascript">
function confirmDelete() 
{
	var msg = "Are you sure you want to delete?";       
    return confirm(msg);
}
</script>  

 <?php include_once("footer.php"); ?>    
    </body>
</html>