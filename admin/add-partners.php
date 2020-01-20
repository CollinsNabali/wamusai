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
               <i class="fas fa-upload"></i>
                Add Partner
            </div>
            <div class="card-body">
                    <?php 
                         if (isset($_POST['add'])) {
                             include_once 'partials/connection.php';
                             if (getimagesize($_FILES['pic']['tmp_name'])==TRUE)
                                    {
                                      $pic = addslashes(($_FILES['pic']['tmp_name']));
                                      $pic=file_get_contents($pic);
                                      $pic=base64_encode($pic);
                                    }


                                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                                    $link = mysqli_real_escape_string($conn, $_POST['link']);
                                    $message = '';

                                    //checking for errors
                                    //start by checking for empty fields
                                    if (empty($name) || empty($link)) {
                                        $message = 'You have submitted an empty field!';
                                    } 
                                    else {
                                        $fleet = "INSERT INTO partners (name, image, link)
                                        VALUES ('$name', '$pic', '$link') ";

                                             if (mysqli_query($conn, $fleet)) {
                                                     $message = 'The partner has been added successfully';
                                                    } 
                                                    else {
                                                        $message = 'System error; Data not sent , Kindly contact the developer  to sort!';
                                                    }
                                        }
                                    
                                   

                         }
                        ?>

                <form method="POST" enctype="multipart/form-data">
                    <?php if(!empty($message)): ?>
                        <div class="alert-danger" style="border-radius: 5px; text-align:center;">
                            <?php echo $message; ?> 
                        </div>
                    <?php endif ;?>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-group">
                            <label>Partner's Name</label>
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="pic" style="text-align:center;" />
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" name="link" />
                        </div>
                        <div class="form-group" style="text-align:center;">
                            <button class="btn btn-success" type="submit"   name="add" style="color:#fff;"> <i class="fas fa-upload"></i> Add</button>  
                        </div> 
                    </div>                        
                                    
                </div>
                </form>
            </div>          
        </div>
            </div>
        </div>
    </div>
<!-- the footer begins here -->
<?php include 'partials/footer.php'; ?>