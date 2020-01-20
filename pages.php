<?php 
include 'partials/head.php';
include 'partials/navbar.php';
?>

<?php
include 'partials/connection.php';

$id = $_GET['id'];
$find = "SELECT * FROM pages WHERE id = '$id' ";
$result = mysqli_query($conn,$find) or die (mysqli_connect_error());
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

?>
<!-- breadcrumb -->
<section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2><?php echo $row['title'];?> </h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>   
            <li><a href="#">About us</a></li>            
            <li class="active"><?php echo $row['title'];?></li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>


 <!-- page content -->

 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">                      
                          <div class="mu-latest-course-single-content">                                                  
                            <p> <?php echo $row['content'];?> </p>
                          </div>                                        
                      </div> 
                    </div>                                   
                  </div>
                </div>
                <!-- end course content container -->
              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <?php include 'partials/sidebar.php'; ?>
                <!-- / end sidebar -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 <?php }?>    

<?php 
include 'partials/footer_scripts.php';
?>

