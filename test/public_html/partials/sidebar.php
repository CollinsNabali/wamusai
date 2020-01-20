<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-color: #000;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/logo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $row['f_name']; ?>  <?php echo $row['l_name']; ?></p>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-envelope"></i> <span style="color: #fff;">Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Loans</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_client.php"><i class="fa fa-circle-o"></i> Add Client</a></li>
            <li><a href="disburse.php"><i class="fa fa-circle-o"></i> Give Loan</a></li>
            <li><a href="loans.php"><i class="fa fa-circle-o"></i>All Loans</a></li>
            <li><a href="clients.php"><i class="fa fa-circle-o"></i> Clients</a></li>
            <li><a href="pay.php"><i class="fa fa-circle-o"></i> Add Payments</a></li>
            <li><a href="payments.php"><i class="fa fa-circle-o"></i> Loan Payments</a></li>
            <li><a href="clients.php"><i class="fa fa-circle-o"></i> Clients</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Insurance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addinsuree.php"><i class="fa fa-circle-o"></i> Add client</a></li>
            <li><a href="addpremium.php"><i class="fa fa-circle-o"></i> Add premium Payments</a></li>
            <li><a href="spenttoinsure.php"><i class="fa fa-circle-o"></i> Record Insurance Expenditure</a></li>
            <li><a href="insurees.php"><i class="fa fa-circle-o"></i> insurance Clients</a></li>
            <li><a href="premiumpayments.php"><i class="fa fa-circle-o"></i> Premium payments</a></li>
            
          </ul>
        </li>
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>
