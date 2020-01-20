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
            Accomodation Inbox
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Hotel</th>
                    <th>Rooms</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                  </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Hotel</th>
                    <th>Rooms</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
        				    include 'partials/connection.php';
        				        //Collecting all clients' details from the clients' table
        				        $sql = "SELECT * FROM online_accomodation ORDER BY id DESC";
        				        $client = mysqli_query($conn, $sql) or die(mysqli_connect_error());       				
                          while ($row = mysqli_fetch_array($client, MYSQLI_ASSOC))
                                             {
        					                  //fetch based on id
                 ?>
                  <tr>
                    <td> <?php echo $row['email'];?></td>
                    <td> <?php echo $row['phone'];?></td>
                    <td> <?php echo $row['hotel'];?></td>
                    <td> <?php echo $row['rooms'];?></td>
                    <td> <?php echo $row['adults'];?></td>
                    <td> <?php echo $row['children'];?></td>
                    <td> <?php echo $row['check_in'];?></td>
                    <td> <?php echo $row['check_out'];?></td>
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

