<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Leo-Car Dashboard</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <div class="input-group">
        <div class="input-group-append">
        <button type="submit" class="btn btn-default btn-flat" style="background-color: transparent; border-color: transparent; color: #fff;" name="out">Sign Out</button>
        </div>
      </div>
    </form>
    </ul>

  </nav>

<?php
if (isset($_POST['out'])) {
   session_unset();
   session_destroy();

   echo "<script>location.href='login.php'</script>";
}

?>