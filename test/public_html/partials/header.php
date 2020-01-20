  <?php 
if (!isset($_SESSION['s_email'])) {
   echo "<script>
   location.href='login.php';
   </script>";
}

?>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
  <header class="main-header" style="background-color:#49a600;">
    <!-- Logo -->
    <a href="index.php" class="logo" style="background-color: #0c3e03; color:  #fff; height: 100%; margin-bottom: -1px;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>WV</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Elite</b> Ways</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #49a600;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <div class="pull-right">
            <button type="submit" class="btn btn-default btn-flat" style="background-color: transparent; border-color: transparent; color: #fff;" name="out">Sign Out</button>
          </div>
      
        </ul>
      </div>
    </nav>
  </header>
</form>

<?php
if (isset($_POST['out'])) {
   session_unset();
   session_destroy();

   echo "<script>location.href='login.php'</script>";
}

?>