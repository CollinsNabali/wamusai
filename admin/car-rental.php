<!-- DataTables Example -->
<?php 
include 'partials/head.php';
if (!isset($_SESSION['s_email'])) {
  echo "<script>location.href='login.php'</script>";
} 
include 'partials/navbar.php';
?>

   <div id="wrapper">       
        <!-- the sidebar begins here -->
        <?php include 'partials/sidebar.php';?>
        <div id="content-wrapper">
            <div class="container-fluid">
             <!-- The inbox table is here -->
             <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Car Rental Inbox
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
        				    include 'partials/connection.php';
        				        //Collecting all clients' details from the clients' table
        				        $sql = "SELECT * FROM bookings ORDER BY id DESC";
        				        $client = mysqli_query($conn, $sql) or die(mysqli_connect_error());       				
                          while ($row = mysqli_fetch_array($client, MYSQLI_ASSOC))
                                             {
        					                  //fetch based on id
                 ?>
                  <tr>
                    <td><a href="car.php<?php echo '?id='.$row['id'];?>"> <?php echo $row['name'];?></td>
                    <td><a href="car.php<?php echo '?id='.$row['id'];?>"> <?php echo $row['phone'];?></td>
                    <td><a href="car.php<?php echo '?id='.$row['id'];?>"> <?php echo $row['email'];?></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
            </div>
        </div>
    </div>
<!-- the footer begins here -->
<?php include 'partials/footer.php'; ?>

