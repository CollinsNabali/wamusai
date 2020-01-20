<?php 
include 'partials/head.php';
if (!isset($_SESSION['s_email'])) {
  echo "<script>location.href='login.php'</script>";
} 

include 'partials/connection.php';
   
   //generating session details to be used in the rest of the page
   $user = $_SESSION['s_email'];

   $get_user = "SELECT * FROM  users WHERE email='$user' ";
   $right_user = mysqli_query($conn,$get_user) or die (mysqli_connect_error());
        while ($row = mysqli_fetch_array($right_user, MYSQLI_ASSOC)) {

            include 'partials/header.php';
            include 'partials/sidebar.php';

?>
        <body class="hold-transition skin-blue sidebar-mini">
            <div class="wrapper">
                <div class="content-wrapper">
	                <?php include 'partials/breadcrumb.php';?>
	                

	                <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Client Profile</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-5">
                                        <?php
                                            include 'partials/connection.php';
                                             //get the id selected in the previous page
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM insurees WHERE nat_id = $id";
                                            $members = mysqli_query($conn, $sql) or die(mysqli_connect_error());
                        
                                            while ($row = mysqli_fetch_array($members, MYSQLI_ASSOC)) {
                                               //fetch based on id
                                            $id = $row['nat_id'];
                          
                                        ?>
                                        <div class="box-header">
                                            <h3 class="box-title">
                                                <strong>National ID Number;</strong> <?php echo $row['nat_id'];?> 
                                            </h3>
                                            <p><strong>Name ;</strong>  <?php echo $row['name']; ?>  </p>
                                            <p><strong>Phone Number ;</strong>  <?php echo $row['phone']; ?>  </p>
                                            <p><strong>Email Address ;</strong>  <?php echo $row['email']; ?>  </p>
                                            <p><strong>Estate of Residence ;</strong>  <?php echo $row['estate']; ?>  </p>
                                            <p><strong>Place of Work ;</strong>  <?php echo $row['work']; ?></p>
                                            <p><strong>Occupation ;</strong>  <?php echo $row['occupation']; ?>  </p>
                                            <p><strong>Insurance class ;</strong>  <?php echo $row['class']; ?>  </p>
                                        </div>
                                        <?php }?>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="box-header">
                                                <h3 class="box-title">
                                                    <strong>Insuree's Profile</strong> 
                                                </h3>
                                            </div>
                                            <h3 class="label label-info" >Total premium</h3>
                                            <?php 
                                               $id = $_GET['id'];
                                               $premium = "SELECT SUM(amount) from premiums WHERE nat_id = $id";
                                               $tpremium = mysqli_query($conn,$premium)  or die (mysqli_connect_error());
                                                    while ($row = mysqli_fetch_array($tpremium))
                                                         $paid = $row['SUM(amount)'];
                                                    
                                                {?>
                                                 
                                               <h4>Ksh. <?php echo $paid ?> </h4>

                                            <?php }?>
                        
                                            <h3 class="label label-success" >Total Spent to insure</h3>
                                            <?php 
                                               $id = $_GET['id'];
                                               $spent = "SELECT SUM(amount) from spent_on_insuree WHERE nat_id = $id";
                                               $tspent = mysqli_query($conn,$spent)  or die (mysqli_connect_error());
                                               while ($row = mysqli_fetch_array($tspent))
                                                $samount = $row['SUM(amount)'];
                                                $active = $paid - $samount;
                                                {?>
                                                 
                                               <h4>Ksh. <?php echo $samount ?> </h4>

                                            <?php }?>
                                            <h3 class="label label-danger" >Active Amount</h3>
                                            
                                            
                                             <h4>Ksh. <?php  echo $active ?> </h4> 
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <?php 
                                                $id = $_GET['id'];
                                                $date = "SELECT * FROM premiums WHERE nat_id ='$id' ORDER BY dis_no DESC LIMIT 1 "; 
                                                $due_date = mysqli_query($conn,$date) or die (mysqli_connect_error());
                                                    while ($row = mysqli_fetch_array($due_date))
                                                      
                                                     {?>

                                                        <h3 class="label label-warning">Due Date </h3>
                                                        <h4><?php echo $row['due_date']; ?></h4>

                                                <?php }?>    
                                        </div>
                                    </div>
                                <!-- /.box-body -->
                                </div>
                               <!-- /.box -->
                            </div>
                        </div>
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Premiums payment history</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Amount</th>
                                                    <th>Date paid</th>
                                                    <th>Due Date</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                        <?php
                                            include 'partials/connection.php';
                                            //get the id selected in the previous page
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM premiums WHERE  nat_id = $id";
                                            $client = mysqli_query($conn, $sql) or die(mysqli_connect_error());
                                           
                                            
                                            while ($row = mysqli_fetch_array($client, MYSQLI_ASSOC)) {
                                               //fetch based on id
                                              
                                                 
                                        ?>

                                        <tr>
                                            <td><?php echo $row['amount'];?></td>
                                            <td><?php echo $row['pay_date'];?></td>
                                            <td><?php echo $row['due_date'];?></td>
                                        </tr>
                                        <?php }?>
                                        </tbody>
                                        </table>

                                        

                                        
                                    </div>
                                <!-- /.box-body -->
                                </div>
                               <!-- /.box -->
                            </div>
                        </div>
                    </section>

                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Spent records</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Amount</th>
                                                    <th>Date paid</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                        <?php
                                            include 'partials/connection.php';
                                            //get the id selected in the previous page
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM spent_on_insuree WHERE nat_id = $id";
                                            $client = mysqli_query($conn, $sql) or die(mysqli_connect_error());
                        
                                            while ($row = mysqli_fetch_array($client, MYSQLI_ASSOC)) {
                                                //fetch based on id
                                                $id = $row['nat_id'];
                                        ?>             
                                        <tr>
                                            <td><?php echo $row['amount'];?></td>
                                            <td><?php echo $row['pay_date'];?></td>
                                        </tr>
                                        <?php }?>
                                        </tbody>
                                        </table>
                                    </div>
                                <!-- /.box-body -->
                                </div>
                               <!-- /.box -->
                            </div>
                        </div>
                    </section>



<?php }?>
<?php 
include 'partials/scripts.php';
include 'partials/footer.php'; 
?>