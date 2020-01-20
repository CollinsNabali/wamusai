<?php 
include 'partials/head.php';
if (!isset($_SESSION['s_email'])) {
  echo "<script>location.href='login.php'</script>";
} 
?>


<?php 
   //This is to get session details and use them in the rest of the index page
   include 'partials/connection.php';
   $user = $_SESSION['s_email'];

   $get_user = "SELECT * FROM  users WHERE email='$user' ";
   $right_user = mysqli_query($conn,$get_user) or die (mysqli_connect_error());
        while ($row = mysqli_fetch_array($right_user, MYSQLI_ASSOC)) {


            
            include 'partials/header.php';
            include 'partials/sidebar.php';
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
            <div class="wrapper">
                <div class="content-wrapper">
	               
	                <div class="content">
		                <section class="content">
      <div class="row">
        <!-- left column -->

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enter clients' premium payments</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


                           <?php 
//email,phone,categories,subcat,lost_date,location,details
                             if(isset($_POST['submit'])) {
    include 'partials/connection.php';
     $message = '';
    
    
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $pay_date = mysqli_real_escape_string($conn, $_POST['pay_date']);
    $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
   
    
    //Error handlers
    //check for any empty fields
    
    if( empty($id)||
        empty($amount)||
        empty($pay_date)||
        empty($due_date)
        ) 
        {
            $message ='You have submitted an empty field!';
        } 
 else {

        $premium = "SELECT * FROM insurees WHERE nat_id = $id ";
        $result = mysqli_query($conn,$premium);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            $message ='Unknown client!';
        } else {

            $sql= "INSERT INTO premiums (nat_id, amount, pay_date, due_date)  
                         VALUES ('$id', '$amount', '$pay_date', '$due_date')";
                          if (mysqli_query($conn, $sql))
                                {
                                    $message = 'The premium details added successfully!';
                                }
     
                }     
 }
    
    
} 

?>
                          <form  method="POST" enctype="multipart/form-data">
                                <?php if (!empty($message)): ?>        
                                  <div class="callout callout-success">
                                      <h4>Alert!</h4>
                                      <p><?php echo $message ?> .</p>
                                  </div>       
                                <?php endif ;?>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">National ID</label>
                                    <input type="text" class="form-control"  name="id" required="require" >
                                </div>
                                <div class="form-group">
                                    <label for="vol">Amount</label>
                                    <input type="number" class="form-control"  name="amount" required="require">
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group" id='datetimepicker2'>
                                        <label>Date </label>
                                        <input name="pay_date" type="date" class="form-control" required="require">
                                </div>
                                <div class="form-group" id='datetimepicker2'>
                                        <label>Due Date </label>
                                        <input name="due_date" type="date" class="form-control" required="require">
                                </div>
                                </div>
                                <div class="form-group tm-yellow-gradient-bg text-center">
                                    <button type="submit" name="submit" value="send" class="btn btn-primary">Submit </button>
                                </div> 
                          </form>
            
          </div>
          <!-- /.box -->
	                </div>
                </div>
            </div>
       <?php }?>

 <?php 
include 'partials/scripts.php';
  ?>           
 
 