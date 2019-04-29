<?php
 
$Email = $_POST['Email'];
$Password = $_POST['Password'];
 

if (  !empty($Email) || !empty($Password)  ) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "train";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {


                  
      
       
      
      $sql = "SELECT Atrain FROM AdminDetails WHERE Email = '$Email' and Password = '$Password'";
      
      // $result = mysqli_query("1");
      
     //  $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      $count =1;
        
      if($count == 1) {
          echo "Succesfully Login";
         header("location: AdminHome.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }





 
    
} else {
 echo "All field are required";
 die();
}

?>