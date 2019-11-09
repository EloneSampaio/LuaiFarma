<!DOCTYPE html>

<?php include('../connect.php');
$level = $row[4];

?>
<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rx Tera | Sales records</title>
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
  
  <script>
		(function (w, doc,co) {
			
			var u = {},
				e,
				a = /\+/g,  // Regex for replacing addition symbol with a space
				r = /([^&=]+)=?([^&]*)/g,
				d = function (s) { return decodeURIComponent(s.replace(a, " ")); },
				q = w.location.search.substring(1),
				v = '2.0.3';

			while (e = r.exec(q)) {
				u[d(e[1])] = d(e[2]);
			}
			
			if (!!u.jquery) {
				v = u.jquery;
			}	

			doc.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/'+v+'/jquery.min.js">' + "<" + '/' + 'script>');
			co.log('\nLoading jQuery v' + v + '\n');
		})(window, document, console);
		</script>
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.quicksearch.js"></script>
		<script>
			$(function () {
				/*
				Example 1
				*/
				$('input#id_search').quicksearch('table#table_example tbody tr');
				
				/*
				Example 2 
				*/
				$('input#id_search2').quicksearch('table#table_example2 tbody tr', {
					'delay': 300,
					'selector': 'th',
					'stripeRows': ['odd', 'even'],
					'loader': 'span.loading',
					'bind': 'keyup click input',
					'show': function () {
						this.style.color = '';
					},
					'hide': function () {
						this.style.color = '#ccc';
					},
					'prepareQuery': function (val) {
						return new RegExp(val, "i");
					},
					'testQuery': function (query, txt, _row) {
						return query.test(txt);
					}
				});
				
				/*
				Example 3
				*/
				var qs = $('input#id_search_list').quicksearch('ul#list_example li');
				
				$.ajax({
					'url': 'js/example.json',
					'type': 'GET',
					'dataType': 'json',
					'success': function (data) {
						for (i in data['list_items']) {
							$('ul#list_example').append('<li>' + data['list_items'][i] + '</li>');
						}
						qs.cache();
					}
				});
				
				$('input#add_to_list').click(function () {
					$('ul#list_example').append('<li>Added on click</li>');
					qs.cache();
				});

				/*
				Example 4
				*/

				
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
        Sales records
        <small>All sales</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php">Admin</a></li>
        <li class="active">Sales records</li>
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

          
		
		<form action="#">
		<div class="box-body">
                <div class="form-group">
				<input type="text" name="search" value="" id="id_search" placeholder="Search" autofocus />
			</div>
		</form>

    
	
<table class="table table-bordered table-striped" id="table_example" data-responsive="table" >
	<thead>
		<tr>	
			<th> Invoice </th>
			<th> Date-Time </th>
			<th> Brand Name </th>
			<th> Generic Name </th>
			<th> Price </th>
			<th> QTY </th>
			<th> Total Amount </th>
			<th> Profit </th>
			
			
		</tr>
	</thead>
	<tbody>
		
			<?php
			function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				
				$result = $dbo->prepare("select c.trade_name, c.generic_name, s.date, s.time,s.profit,s.transaction_id, s.invoice, s.product, s.price, s.quantity, s.amount, s.entrant FROM `medicine_list` AS c INNER JOIN `sales_list` AS s ON c.sno = s.sno ORDER by transaction_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['invoice']; ?></td>
			<td><?php echo $row['date']; ?> - <?php echo $row['time']; ?></td>
			<td><?php echo $row['trade_name']; ?></td>
			<td><?php echo $row['generic_name']; ?></td>
			<td><?php
			$price=$row['price'];
			echo formatMoney($price, true);
			?></td>
						<td><?php echo $row['quantity']; ?></td>
			<td><?php
			$oprice=$row['amount'];
			echo formatMoney($oprice, true);
			?></td>
				<td><?php
			$pprice=$row['profit'];
			echo formatMoney($pprice, true);
			?></td>
						
		</tr>
			<?php
				}
			?>
		
				
			
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				
				<th></th>
				<th>Total Amount</th>
				<th>Total Profit</th>
				<th></th>
			<tr>
				
			<tr>
				<th colspan="6"><strong style="font-size: 20px; color: #000;">Total:</strong></th>
				<th colspan="1"><strong style="font-size: 13px; color: #000;">
				<?php
				$resultas = $dbo->prepare("SELECT sum(amount) from sales_list");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(amount)'];
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></th>
				<th colspan="1"><strong style="font-size: 13px; color: #000;">
				<?php
				$resultas = $dbo->prepare("SELECT sum(profit) from sales_list");
				$resultas->bindParam(':b', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(profit)'];
				echo formatMoney($fgfg, true);
				}
				?>
				
					</th>
					
					<th></th>
			</tr>
	
		
	</tbody>
</table>

			
			
          </div>
		  
        </div>

</div>
<script src="js/angular.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="app/app.js"></script> 

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