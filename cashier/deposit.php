<?php

include_once "../connect.php"; // database connection details stored here

?>

<!DOCTYPE html>
<html  lang="en">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rx Tera | Deposit</title>
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
    var x = document.forms["form1"]["name"].value || document.forms["form1"]["userid"].value|| document.forms["form1"]["level"].value;
	
    if (x == null || x == "") {
        alert("Field must be filled out");
        return false;
    }
}
</script>

 <script type='text/javascript'>
	function validate(){
    var checkleng = document.getElementById("checkleng");
    if(checkleng.value.length <= 15 && checkleng.value.length >= 6){
    }
    else{
        alert("Make sure the system username is between 6-15 characters long");
		this.focus();
        return false;
    }
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
       Deposit
        <small>Make Bank Deposit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php">Admin</a></li>
        <li class="active">Deposit</li>
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

           <form role="form" method="post"  name='form1'  action="deposit.php"  onsubmit="return validate()">
              <div class="box-body">
			  
			   <div class="form-group">
                  <label>Select Bank</label>
				  <?php
$sql="SELECT name,id, ac_no FROM bank order by name"; 
echo "<select name='name' class='form-control'>"; 
foreach ($dbo->query($sql) as $row){
echo "<option value=$row[id]>$row[name] - $row[ac_no]</option>"; 
}
echo "</select>";
?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Bank Deposit</label>
                  <input type="text"  name="deposit" class="form-control" id="skills"  required>
                </div>
                
				 <input type="hidden"  name="date"  class="form-control" value="<?php echo date("m/d/y"); ?>" required>
                
				  
				  <?Php
					if(isset($_SESSION['userid'])){
									}
						?>
                  <input type="hidden"  name="entrant"  class="form-control" value="<?php echo "$_SESSION[userid]"; ?>"  readonly>
              
                 
                <div>
                <button type="submit" name="register" class="btn btn-primary">Deposit</button>
				
              </div>
           </div>
			   
            </form>
			
			<?php
				if (isset($_POST['register'])){
				$name=$_POST['name'];
				$deposit=$_POST['deposit'];
				$date=$_POST['date'];
				$entrant=$_POST['entrant'];

				mysqli_query($con, "insert into bank_deposit (name,deposit,date,entrant) values('$name','$deposit','$date','$entrant')")or die(mysqli_error());
				
				}
				?>
       
	
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Bank Deposits</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
                        <th>Bank Name</th>
						<th>Deposit</th>
						<th>Date</th>
						<th>Entrant</th>
						<th> Edit</th>
						<th> Delete</th>	
						</tr>
					</thead>
				
					<tbody>
						<?php 
						
						$query=mysqli_query($con, "SELECT b.name, d.id, d.deposit, d.date, d.entrant FROM `bank` AS b INNER JOIN `bank_deposit` AS d ON b.id=d.name ORDER BY d.id DESC LIMIT 10")or die(mysqli_error());
						while($row=mysqli_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['deposit']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['entrant']; ?></td>
						<td><form  method="post" action="edit_deposit.php<?php echo '?id='.$row['id']; ?>"><input type='submit'  class="btn btn-success addmore" value='Edit'>	</form></td>
			
						<td><form  method="post" action="delete_deposit.php<?php echo '?id='.$row['id']; ?>"><input type='submit' onClick="return confirm('Are you sure you want to Delete?');" class="btn btn-danger delete"  value='Delete'>	</form></td>
						
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