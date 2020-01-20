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

<?php
include 'partials/connection.php';

$id = $_GET['id'];
$find = "SELECT * FROM pages WHERE id = '$id' ";
$result = mysqli_query($conn,$find) or die (mysqli_connect_error());
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

?>   
<!-- The form begins here -->
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-edit"></i>
                                 Edit Page
                            </div>
                            <div class="card-body">
                            <?php if(!empty($message)): ?>
                                        <div class="alert-danger" style="border-radius: 5px; text-align:center;">
                                            <?php echo $message; ?> 
                                        </div>
                                    <?php endif ;?>
                                <form method="POST" >
                                    
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input type="char" class="form-control" placeholder="Page title" require="required" name="title" value="<?php echo $row['title']; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <textarea id="compose-textarea" class="form-control" style="height: 300px" name="content" require="required" value="" > 
                                            <?php echo $row['content']; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-envelope-o"></i> Submit</button>
                                        </div>
                                        <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                                    </div>
                                    <!-- /.box-footer --> 
                                </form>
                            </div>           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }?> 
<!-- the footer begins here -->
<?php include 'partials/footer.php'; ?>

<?php 
include 'partials/connection.php';
if (isset($_POST['submit'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $message = '';
    $home = 'pages';

    //check for any empty fields submitted
    if (empty($title) || empty($title)) 
    {
       $message = 'You have submitted an empty field';
    } 
    else 
    {
        $add ="UPDATE  $home  SET title = '$title', content = '$content'  WHERE id = '$id' ";
        if (mysqli_query($conn, $add)) 
        {
            $message = 'Added Successfully';
        }
        else 
        {
            $message = 'System Error: Not Submitted!';
        }
       

    }
    
}

?>
