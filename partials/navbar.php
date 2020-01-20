
<?php include 'top.php';?>
<section id="mu-menu" >
    <nav class="navbar navbar-default" role="navigation" >  
      <div class="container" >
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand" href="index.php"><img src="assets/img/logo.jpg" alt="wamusai logo" style="max-width:17%;margin-top:-3%;" /> 
          </a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="index.php">Home</a></li>            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">About us <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <?php
        				    include 'connection.php';
        				        //Collecting all clients' details from the clients' table
        				        $pagesql = "SELECT * FROM pages ORDER BY id DESC";
        				        $pageresult = mysqli_query($conn, $pagesql) or die(mysqli_connect_error());       				
                          while ($row = mysqli_fetch_array($pageresult, MYSQLI_ASSOC))
                                             {        					                 
                 ?>
                <li><a href="pages.php<?php echo '?id='.$row['id'];?>"><?php echo $row['title'];?></a></li>
                  <?php }?>

              </ul>
            </li>   
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Programs <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
              <?php
        				    include 'connection.php';
        				        //Collecting all clients' details from the clients' table
        				        $programsql = "SELECT * FROM programs ORDER BY id DESC";
        				        $programresult = mysqli_query($conn, $programsql) or die(mysqli_connect_error());       				
                          while ($row = mysqli_fetch_array($programresult, MYSQLI_ASSOC))
                                             {        					                 
                 ?>
                <li><a href="programs.php<?php echo '?id='.$row['id'];?>/<?php echo $row['title'];?>/"><?php echo $row['title'];?></a></li>                
                <?php }?>  
              </ul>
            </li>  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Objectives <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php
        				    include 'connection.php';
        				        //Collecting all clients' details from the clients' table
        				        $objectivesql = "SELECT * FROM objectives ORDER BY id DESC";
        				        $objectiveresult = mysqli_query($conn, $objectivesql) or die(mysqli_connect_error());       				
                          while ($row = mysqli_fetch_array($objectiveresult, MYSQLI_ASSOC))
                                             {        					                 
                 ?>
                <li><a href="objectives.php<?php echo '?id='.$row['id'];?>"><?php echo $row['title'];?></a></li>                
                <?php }?>  
              </ul>
            </li>
            <li><a href="team.php">Strategic Leadership</a> </li>
            <li><a href="partners.php">Partners</a> </li>      
            <li><a href="contact.php">Contacts</a></li>       
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->

