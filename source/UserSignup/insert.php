<?php
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$Gender = $_POST['Gender'];

if (!empty($FirstName) || !empty($LastName) || !empty($Email) || !empty($Password)  || !empty($Gender)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "train";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT Email From AdminDetails Where Email = ? Limit 1";
     $INSERT = "INSERT Into AdminDetails (FirstName, LastName, Email, Password,  Gender) values(?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $FirstName, $LastName, $Email, $Password,$Gender);
      $stmt->execute();
      echo "Congratulation New User Added";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}

?>