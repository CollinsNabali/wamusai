<?php

session_start(); 

if (isset($_POST['submit'])) {
	include 'connection.php';

	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pwd   = mysqli_real_escape_string($conn,$_POST['password']);
	$message = '';

	//Error handlers
	//Check for empty fields
	if (empty($email) || empty($pwd)) {

		$message = 'You have submitted an empty field!';

	}else{
		$sql = "SELECT * FROM users WHERE email ='$email' ";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			
                $message = 'The email address is not registered!';

		} else{
			if ($row = mysqli_fetch_assoc($result)) {

				//dehashing the password
				$hashedpwdCheck = password_verify($pwd,$row['password']);

				//declaring the entered password to be false
				if ($hashedpwdCheck == false) {
					$message = 'You have entered a wrong password!';

			  //if the entered password is true		      
				}elseif ($hashedpwdCheck == true ) {
					//Logging the user here 
					$_SESSION['s_email'] = $row['email'];
					$_SESSION['s_pwd']   = $row['password'];
					$id = $row['u_id'];
					$name = $row['f_name'];

					echo "<script>
                          location.href='../index.php?server=$id'
					      </script>";
					
				}
				
			}
		}
	}
	
}

?>