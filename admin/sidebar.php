<?php
// ../documentation/index.html
include_once('../connect.php');


				$result = $dbo->prepare("SELECT * FROM users ");
				$result->execute();
				$rowcount = $result->rowcount();


				$result = $dbo->prepare("SELECT * FROM supplier");
				$result->execute();
				$rowcount123 = $result->rowcount();


				$result = $dbo->prepare("SELECT * FROM customer");
				$result->execute();
				$rowcount1234 = $result->rowcount();


				$result = $dbo->prepare("select c.trade_name, c.generic_name, i.quantity, i.expiry_date , i.batch  FROM `medicine_list` AS c INNER JOIN `inventory` AS i ON c.sno = i.sno WHERE date_format(`expiry_date`, '%Y-%m-%d') < NOW() + INTERVAL 3 MONTH  AND  `quantity` > 0 AND date_format(`expiry_date`, '%Y-%m-%d') > curdate() ORDER BY expiry_date ASC")or die(mysql_error());
				$result->execute();
				$rowcount12345 = $result->rowcount();


				$result = $dbo->prepare("SELECT * FROM bank");
				$result->execute();
				$rowcount123456 = $result->rowcount();


?>





<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-center image">
          <img src="../uploads/<?php echo $logo; ?>" class="img-rounded" width="150px" height="150px" />
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>

        <li>
         <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">
            <i class="fa fa-money"></i> <span>POS</span>
          </a>
        </li>

		<li class="treeview">
          <a href="invoice_view.php">
            <i class="fa fa-credit-card"></i>
            <span>Invoices</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		    <li class="active"><a href="invoice.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="fa fa-circle-o"></i> Create new Invoices</a></li>
            <li><a href="invoice_view.php"><i class="fa fa-circle-o text-yellow"></i>View invoices</a></li>

          </ul>
        </li>


        <li>
          <a href="signup.php">
            <i class="fa fa-users"></i> <span>System users</span>
            <span class="pull-right-container">

              <small class="label pull-right bg-blue"><?php echo $rowcount;?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="supplier.php">
            <i class="fa fa-area-chart"></i> <span>Suppliers</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php echo $rowcount123;?></small>
            </span>
          </a>
        </li>

		<li>
          <a href="customer.php">
            <i class="fa fa-smile-o"></i> <span>Customers</span>
            <span class="pull-right-container">

              <small class="label pull-right bg-green"><?php echo $rowcount1234;?></small>

            </span>
          </a>
        </li>

			<li>
          <a href="bank.php">
            <i class="fa fa-bank"></i> <span>Accounts</span>
            <span class="pull-right-container">

              <small class="label pull-right bg-orange"><?php echo $rowcount123456;?></small>

            </span>
          </a>
        </li>

		<li>
          <a href="expiry.php">
            <i class="fa fa-warning"></i> <span>Soon Expiring</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $rowcount12345;?></small>
            </span>
          </a>
        </li>


        <li class="treeview active">
          <a href="products.php">
            <i class="fa fa-cubes"></i> <span>Medicine Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="products.php"><i class="fa fa-circle-o"></i>Inventory</a></li>
            <li><a href="medicine_list.php"><i class="fa fa-circle-o"></i>Medicine List</a></li>
			<li><a href="medicine_edit.php"><i class="fa fa-circle-o"></i>Edit Medicine List</a></li>
			<li><a href="add_medicine.php"><i class="fa fa-circle-o"></i>Add Stock</a></li>
            <li><a href="inventory.php"><i class="fa fa-circle-o text-aqua"></i>Purchase History</a></li>
			<li><a href="out_of_stock.php"><i class="fa fa-circle-o text-aqua"></i>Out of Stock</a></li>
            <li><a href="expiry.php"><i class="fa fa-circle-o text-yellow"></i>Soon Expiring</a></li>
			 <li><a href="expired.php"><i class="fa fa-circle-o text-red"></i>Expired Medicine</a></li>
          </ul>
        </li>


		<li>
          <a href="expenses.php">
            <i class="fa fa-pie-chart"></i>
            <span>Expenditures</span>
          </a>
        </li>

		<li class="treeview">
          <a href="sales_report.php?d1=0&d2=0">
            <i class="fa fa-folder"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		    <li class="active"><a href="sales_report.php?d1=0&d2=0"><i class="fa fa-circle-o"></i> Sales Report</a></li>
            <li><a href="expenses_report.php?d1=0&d2=0"><i class="fa fa-circle-o"></i>Expenses Report</a></li>
            <li><a href="daily_report.php?d1=0&d2=0"><i class="fa fa-circle-o"></i> Income Vs Expenses</a></li>
			<li><a href="tpl.php?d1=0&d2=0"><i class="fa fa-circle-o"></i> Trading Profit and Loss Account</a></li>
            <li><a href="sales_records.php"><i class="fa fa-circle-o text-red"></i> Sales History</a></li>
						  <li><a href="payments_overdue.php"><i class="fa fa-circle-o text-yellow"></i> Payments Overdue</a></li>
          </ul>
        </li>


		<li><a href="settings.php"><i class="fa fa-cog fa-fw"></i> <span>Settings</span></a></li>

        <li><a href="../documentation/index.html" target= "blank"><i class="fa fa-book"></i> <span>Documentation</span></a></li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
