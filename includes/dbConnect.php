<?php

    // linking to our database 
    
    define('HOSTNAME','localhost');
    define('USERNAME','root');
    define('PASSWORD',NULL);
    define('DB_NAME','donations');
// pass our function result into a variable $conn
  $conn= mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DB_NAME);

//   if $conn successful 
  if($conn==true) {
    echo 'successfull';
  }
// if connection nit successful exit the code. stop execution
  else{
   die( 'not successful' .mysqli_connect_errno()); 

  }
?>