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
            Car Details
          </div>
         
          <?php 
    include '../partials/connection.php';
    $id = $_GET['id'];
    $car = "SELECT * FROM  bookings WHERE id = '$id' ";
    $result = mysqli_query($conn,$car) or die (mysqli_connect_error());
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		$selected = $row['car'];
	
		
		{
		 
    
?>
	<div class="single_product" style="margin-top:50px;">
		<div class="container">
			<div class="row">
				
				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1" style="margin-top:10px;">
					<div class="image_selected">
					
					<?php 
						$fleetsql = "SELECT * FROM fleet WHERE fleet_id ='$selected' ";
						$fleetresult = mysqli_query($conn, $fleetsql) or die (mysqli_connect_error());
						while ($row = mysqli_fetch_array($fleetresult, MYSQLI_ASSOC)) {
							echo '<image src="data:image;base64,'.$row['image'].' " height="300" width="350" >';
						}
						?>
					
					 
					</div>
				</div>
		

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">						
										<table class="table table-bordered" style="color: #000; margin-top: 10%;">
										<?php 
										$buysql = "SELECT * FROM bookings WHERE id = '$id'";
										$buyresults = mysqli_query($conn,$buysql) or die (mysqli_connect_error());
											 while ($row = mysqli_fetch_array($buyresults, MYSQLI_ASSOC))
											
											  {?>
												 <tbody>
				                    <tr class="techSpecRow"><th colspan="2" style="color: #"><?php echo $row['name'] ;?> </th></tr>
				                    <tr class="techSpecRow">
				                    	<td class="techSpecTD1">Phone Number: </td>
				                    	<td class="techSpecTD2"><?php echo $row['phone'];?> </td>
				                    </tr>
				                    <tr class="techSpecRow">
				                    	<td class="techSpecTD1">Email Address:</td>
				                    	<td class="techSpecTD2"><?php echo $row['email'];?> </td>
				                    </tr>
				                    <tr class="techSpecRow">
				                    	<td class="techSpecTD1">Self Drive?:</td>
				                    	<td class="techSpecTD2"><?php echo $row['drive'];?> </td>
														</tr>
														<tr class="techSpecRow">
				                    	<td class="techSpecTD1">Picking Date:</td>
				                    	<td class="techSpecTD2"><?php echo $row['pick_date'];?> </td>
														</tr>
														<tr class="techSpecRow">
				                    	<td class="techSpecTD1">Returning Date:</td>
				                    	<td class="techSpecTD2"><?php echo $row['return_date'];?> </td>
														</tr>
														<tr class="techSpecRow">
				                    	<td class="techSpecTD1">Duration:</td>
				                    	<td class="techSpecTD2"> </td>
				                    </tr>
				                  </tbody>
											 
										
											 <?php }?>
				                  
				                </table>
						        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }?>



        </div>

      </div>
      <!-- /.container-fluid -->
            </div>
        </div>
    </div>
<!-- the footer begins here -->
<?php include 'partials/footer.php'; ?>

