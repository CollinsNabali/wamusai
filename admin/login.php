<!-- DataTables Example -->
<?php 
include 'partials/head.php';
?>

<div class="container">
    <p> 
    For test purposes kindly use ; <br>
    <b>Username:</b> ariembijames@gmail.com <br>
    <b>Password:</b> 12345
    </p>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST">
        <?php if (!empty($message)):?>
			    <div class="alert-danger" style="margin-bottom: 5px;border-radius: 5px; color: #000;text-align: center;">
			        <?php echo $message ; ?> 
			    </div>
		<?php endif ;?>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
<!-- the footer begins here -->

<?php


if (isset($_POST['submit'])) {
	include 'partials/connection.php';

	  $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd   = mysqli_real_escape_string($conn,$_POST['password']);
    $message='';

	//Error handlers
	//Check for empty fields
	if (empty($email) || empty($pwd)) {
		$message ='you have submitted an empty field!';
	}else{
		$sql = "SELECT * FROM users WHERE email ='$email' ";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			$message ='The email address entered is not registered!';
		} else{
			if ($row = mysqli_fetch_assoc($result)) {

				//dehashing the password
				$hashedpwdCheck = password_verify($pwd,$row['password']);

				//declaring the entered password to be false
				if ($hashedpwdCheck == false) {
					$message ='You have entered a wrong password!';

			  //if the entered password is true		      
				}elseif ($hashedpwdCheck == true ) {
					//Logging the user here 
					$_SESSION['s_email'] = $row['email'];
					$_SESSION['s_pwd']   = $row['password'];
					$id = $row['u_id'];

					echo "<script>
                          location.href='index.php?server=$id'
					      </script>";
					
				}
				
			}
		}
	}
	
}

?>