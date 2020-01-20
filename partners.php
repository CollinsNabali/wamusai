<?php 
include 'partials/head.php';
include 'partials/navbar.php';
?>

<!-- breadcrumb -->
<section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Our Partners</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>   
            <li><a href="#">About us</a></li>            
            <li class="active">Partners</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>


 <section id="mu-gallery">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-gallery-area">
        
          <!-- start gallery content -->
          <div class="mu-gallery-content">
            <!-- Start gallery menu -->
           
            <!-- End gallery menu -->
            <div class="mu-gallery-body">
              <ul id="mixit-container" class="row">
                <!-- start single gallery image -->
                <?php
                    include 'partials/connection.php';
                        //Collecting all clients' details from the clients' table
                        $sql = "SELECT * FROM partners ORDER BY id DESC";
                        $result = mysqli_query($conn, $sql) or die(mysqli_connect_error());               
                          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                             {                                   
                 ?>
                <li class="col-md-4 col-sm-6 col-xs-12 mix lab">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="#"><?php echo '<image src="data:image;base64,'.$row['image'].' " height="160" width="220" >';?></a>
                      </div>
                      <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4><?php echo $row['name'];?> </h4>
                          <a href="<?php echo $row['link']; ?> " class="aa-link"><span class="fa fa-link"></span></a>
                        </div>
                      </div>                  
                    </div>
                  </div>
                </li>
                <?php }?>
               
              </ul>            
            </div>
          </div>
          <!-- end gallery content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End gallery  -->
 



<?php 
include 'partials/footer_scripts.php';
?>

