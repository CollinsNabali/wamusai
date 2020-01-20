<!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="#"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <?php
        				    include 'connection.php';
        				        //Collecting all clients' details from the clients' table
        				        $pagesql = "SELECT * FROM pages ORDER BY id DESC";
        				        $pageresult = mysqli_query($conn, $pagesql) or die(mysqli_connect_error());       				
                          while ($row = mysqli_fetch_array($pageresult, MYSQLI_ASSOC))
                                             {        					                 
                 ?>
                <a class="dropdown-item" href="edit-page.php<?php echo '?id='.$row['id'];?>"><?php echo $row['title'];?></a>               
                <?php }?> 
          <a class="dropdown-item" href="add-page.php">Add Page</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="#"></i>
          <span>Programs</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="add-program.php">Add Program</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="#"></i>
          <span>Objectives</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="add-objective.php">Add Objective</a>
        </div>
      </li>
    </ul>