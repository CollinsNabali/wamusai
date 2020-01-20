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
                Add a car to the fleet
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


                                    $make = mysqli_real_escape_string($conn, $_POST['make']);
                                    $model = mysqli_real_escape_string($conn, $_POST['model']);
                                    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
                                    $class = mysqli_real_escape_string($conn, $_POST['class']);
                                    $message = '';

                                    //checking for errors
                                    //start by checking for empty fields
                                    if (empty($make) || empty($model) || empty($brand) || empty($pic) || empty($class) ) {
                                        $message = 'You have submitted an empty field!';
                                    } 
                                    else {
                                        $fleet = "INSERT INTO fleet (make, model, brand, image, class)
                                        VALUES ('$make','$model','$brand','$pic','$class') ";

                                             if (mysqli_query($conn, $fleet)) {
                                                     $message = 'The car has been added successfully';
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
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Car Make</label>
                            <input type="text" class="form-control" name="make" />
                        </div>
                        <div class="form-group">
                            <label>Car Model</label>
                            <input type="text" class="form-control" name="model" />
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            <input type="text" class="form-control" name="brand" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="pic" style="text-align:center;" />
                        </div>
                        <div class="form-group"> 
                            <label>Class</label>                    
                            <select id="basic" class="selectpicker2 show-tick form-control" name="class">
                                <option> -Select- </option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                                <option>F</option>                                        
                            </select>
                        </div>
                        <div class="form-group" style="text-align:center;">
                            <button class="btn btn-success form-control" type="submit"   name="add" style="color:#fff;"> <i class="fas fa-upload"></i> Add</button>  
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