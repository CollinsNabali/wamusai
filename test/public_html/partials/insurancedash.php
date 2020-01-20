<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php 
                                               
                  $total = "SELECT SUM(amount) from premiums ";
                  $tresults = mysqli_query($conn,$total)  or die (mysqli_connect_error());
                                               
                    while ($row = mysqli_fetch_array($tresults))
                    $awarded = $row['SUM(amount)'];

                    {?>
                      <h3>Ksh. <?php echo $awarded  ?> </h3>

              <?php }?>
              <p>Total Premiums paid</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="premiumpayments.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php 
                                               
                  $total = "SELECT SUM(amount) from spent_on_insuree ";
                  $tresults = mysqli_query($conn,$total)  or die (mysqli_connect_error());
                                               
                    while ($row = mysqli_fetch_array($tresults))
                    $spent = $row['SUM(amount)'];
                    $pactive = $awarded - $spent;

                    {?>
                      <h3>Ksh. <?php echo $spent  ?> </h3>

              <?php }?>
              <p>Amounts Spent to Insure clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="spent.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Ksh. <?php echo $pactive ?> </h3>
              <p>Available Active amount </p>
            </div>
            <div class="icon">              
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php 
                 $sql = "SELECT * FROM insurees";
                 $clients = mysqli_query($conn, $sql) or die(mysqli_connect_error());
                 $clientCheck  = mysqli_num_rows($clients);
                   if ($clientCheck < 1) {?>
                    <h3>.0</h3>
                     
                   <?php } else {?>
                    <h3><?php echo $clientCheck ?> </h3>

                  <?php }?>
              <p>Number of clients</p>
            </div>
            <div class="icon">
               <i class="ion ion-person-add"></i>
            </div>
            <a href="insurees.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->