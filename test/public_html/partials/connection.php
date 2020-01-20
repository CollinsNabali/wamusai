<?php

  $servername = "localhost";
  $username   ="eliteway_lblaze";
  $password   ="BBIT/7949/1/1694";
  $dbname     ="eliteway_system";


  //connect to the database
 $conn =  mysqli_connect($servername,$username,$password,$dbname);


//checking the connecion
 if (!$conn) { 
 	"connection failed" . mysqli_connect_error();
 	
 }


?>