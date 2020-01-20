<?php

  $servername = "localhost";
  $username   ="root";
  $password   ="";
  $dbname     ="wamusai";


  //connect to the database
 $conn =  mysqli_connect($servername,$username,$password,$dbname);


//checking the connecion
 if (!$conn) { 
 	"connection failed" . mysqli_connect_error();
 	
 }


?>